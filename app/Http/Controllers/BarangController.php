<?php

namespace App\Http\Controllers;

use App\barang;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\DataTables;
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
    public function index(Request $request, Builder $htmlBuilder)
    {
    if ($request->ajax()) {
    $barang = barang::with('kategori','jenis','merk');
    return Datatables::of($barang)
    ->addColumn('action', function($barang){
    return view('datatable._action', [
    'model' => $barang,
    'form_url' => route('barang.destroy', $barang->id),
    'edit_url' => route('barang.edit', $barang->id),
    'confirm_message' => 'Yakin mau menghapus ' . $barang->nama . '?'
    ]);
    })->make(true);
    }
    $html = $htmlBuilder
    ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama Barang'])
    ->addColumn(['data' => 'kategori.nama', 'name'=>'kategori.nama', 'title'=>'Kategori Barang'])
    ->addColumn(['data' => 'merk.nama', 'name'=>'merk.nama', 'title'=>'merk Barang'])
    ->addColumn(['data' => 'jenis.nama', 'name'=>'jenis.nama', 'title'=>'Jenis Barang'])
    ->addColumn(['data' => 'deskripsi', 'name'=>'deskripsi', 'title'=>'deskripsi Barang'])
    ->addColumn(['data' => 'size', 'name'=>'size', 'title'=>'size Barang'])
    ->addColumn(['data' => 'harga', 'name'=>'harga', 'title'=>'harga Barang'])
    ->addColumn(['data' => 'stok', 'name'=>'stok', 'title'=>'stok Barang'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
    return view('barang.index')->with(compact('html'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $merk = merk::all();
        $jenis = jenis::all();
        return view('barang.create',compact('kategori','merk','jenis'));
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'id_kategori' => 'required|',
            'id_merk' => 'required|',
            'id_jenis' => 'required|',
             'deskripsi' => 'required|',
             'size' => 'required|',
            'harga' => 'required|',
            'stok' => 'required|',

            ]);

            $barang = new barang;
            $barang->nama = $request->nama;
            $barang->id_kategori = $request->id_kategori;
            $barang->id_merk = $request->id_merk;
            $barang->id_jenis = $request->id_jenis;
                 $barang->deskripsi = $request->deskripsi;
                 $barang->size = $request->size;
            $barang->harga = $request->harga;
            $barang->stok = $request->stok;
            $barang->slug =str_slug($request->nama,'-');
            $barang->save();
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan <b>$barang->nama</b>"
            ]);
            return redirect()->route('barang.index');
            
            
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
        $kategori = barang::all();
        $selectedkategori = kategori::findOrFail($id)->id_kategori;
        $merk = merk::all();
        $selectedmerk = barang::findOrFail($id)->id_merk;
        $selectedjenis = $barang->jenis->pluck('id')->toArray();
        $jenis = jenis::all();
        // dd($selected);
        return view('barang.edit',compact('barang','kategori','selectedkategori','merk','selectedmerk','selectedjenis','jenis'));
    
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
        $this->validate($request,[
            'nama' => 'required|',
            'id_kategori' => 'required|',
            'id_merk' => 'required|',
            'id_jenis' => 'required|',
            'deskripsi' => 'required|',
            'size' => 'required|',
            'harga' => 'required|',
            'stok' => 'required|',

        ]);
        $barang = barang::findOrFail($id);
        $barang->nama = $request->nama;
        $barang->id_kategori = $request->id_kategori;
        $barang->id_merk = $request->id_merk;
        $barang->id_jenis = $request->id_jenis;
         $barang->deskripsi = $request->deskripsi;
         $barang->size = $request->size;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->slug =str_slug($request->nama,'-');
        $barang->save();
        Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"Berhasil mengedit <b>$barang->nama</b>"
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
        $a = barang::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('barang.index');
    }
}
