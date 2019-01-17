<?php

namespace App\Http\Controllers;

use App\kategori;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\DataTables;
use Illuminate\Http\Request;

use Session;
class KategoriController extends Controller
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
      $kategori = kategori::all();
        return Datatables::of($kategori)
                ->addColumn('action', function ($kategori) {  
                    return view('datatable._action', [
                    'model'=> $kategori,
                    'form_url'=> route('kategori.destroy', $kategori->id),
                    'edit_url' => route('kategori.edit',$kategori->id),
                    'confirm_message' => 'Yakin mau menghapus ' .$kategori->name . '?'
    
                ]);
                })->make(true);
    }
    $html = $builder
        ->addColumn(['data' => 'nama', 'name'=>'nama','title'=>'Kategori Barang'])

        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                     'searchable'=>false]);
    return view('kategori.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // $jenis =  jenis::all();
        return view('kategori.create');
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
                // 'id_jenis'=>'required|'
            ]);
        $kategori = new kategori;
        $kategori->nama = $request->nama;
         $kategori->slug =str_slug($request->nama,'-');

            // $kategori->id_jenis = $request->id_jenis;
          $kategori->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$kategori->kategori</b>"
        ]);
        return redirect()->route('kategori.index');
    }

     

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.show',compact('kategori'));
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        // $jenis = jenis::all();
        $selectjenis = jenis::findOrFail($id)->id_jenis;

        return view('kategori.edit',compact('kategori','jenis','selectjenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'nama' => 'required|',
            // 'id_jenis' => 'required|',
        
             ]);
        $kategori = kategori::findOrFail($id);
        $kategori->nama = $request->nama;
          $kategori->slug =str_slug($request->nama,'-');
          // $kategori->id_jenis = $request->id_jenis;
    $kategori->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$kategori->kategori</b>"
        ]);
        return redirect()->route('kategori.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = kategori::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kategori.index');

    }
}
