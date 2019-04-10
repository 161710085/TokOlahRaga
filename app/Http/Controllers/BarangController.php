<?php

namespace App\Http\Controllers;

use App\barang;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use App\kategori;
use App\merk;
use App\jenis;
use Session;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $barang = barang::with('jenis','kategori','merk');
             return Datatables::of($barang)
                     ->addColumn('action', function ($barang) {  
                         return view('datatable._action', [
                         'model'=> $barang,
                         'form_url'=> route('barang.destroy', $barang->id),
                         'edit_url' => route('barang.edit',$barang->id),
                         'confirm_message' => 'Yakin mau menghapus ' .$barang->nama . '?'
         
                     ]);
                     })->make(true);
         }
         $html = $builder
         ->addColumn(['data' => 'nama_barang', 'name'=>'nama_barang', 'title'=>'Nama Barang'])
          // ->addColumn(['data' => 'deskripsi', 'name'=>'deskripsi', 'title'=>'Deskripsi'])        
         ->addColumn(['data' => 'harga', 'name'=>'harga', 'title'=>'Harga'])
         ->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'Stock'])
         ->addColumn(['data' => 'jenis.nama_olahraga', 'name'=>'jenis.nama_olahraga', 'title'=>'Cabang Olahraga'])
        ->addColumn(['data' => 'merk.nama_merk', 'name'=>'merk.nama_merk', 'title'=>'Merk'])
        ->addColumn(['data' => 'kategori.nama_kategori', 'name'=>'kategori.nama_kategori', 'title'=>'Kategori'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
         return view('barang.index')->with(compact('html'));
         }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        $merk = merk::all();
        $jenis = jenis::all();
        $kategori = kategori::all();        
        return view('barang.create', compact('barang','merk','jenis','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required|unique:barangs',
            'deskripsi' => 'required',
            'harga' => 'required|min:4|numeric',
            'stock' => 'required|numeric',
            'id_jenis' => 'required',
            'id_merk' => 'required',
            'id_kategori' => 'required']);
        $barang = new barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->stock = $request->stock;
        $barang->id_jenis = $request->id_jenis;
        $barang->id_merk = $request->id_merk;
        $barang->id_kategori = $request->id_kategori;
        $barang->slug = str_slug($request->nama_barang,'-');
        $barang->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $barang->nama_barang"
            ]);
        return redirect()->route('foto_barang.create', $barang->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $barang = barang::findOrFail($id);
           return view('barang.show',compact('barang'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        $jenis = jenis::all();
        $jenisselect = barang::findOrFail($barang->id)->id_jenis;
        $merk = merk::all();
        $merkselect = barang::findOrFail($barang->id)->id_merk;
        $kategori = kategori::all();
        $kategoriselect = barang::findOrFail($barang->id)->id_kategori;
        return view('barang.edit',compact('barang','jenis','jenisselect','merk','merkselect','kategori','kategoriselect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|min:4|numeric',
            'stock' => 'required|numeric',
            'id_jenis' => 'required',
            'id_merk' => 'required',
            'id_kategori' => 'required']);
        $barang = barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->stock = $request->stock;
        $barang->id_jenis = $request->id_jenis;
        $barang->id_merk = $request->id_merk;
        $barang->id_kategori = $request->id_kategori;
        $barang->slug = str_slug($request->nama_barang,'-');
        $barang->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $barang->nama_barang"
            ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Barang berhasil dihapus"
        ]);
        return redirect()->route('barang.index');
    }
}
