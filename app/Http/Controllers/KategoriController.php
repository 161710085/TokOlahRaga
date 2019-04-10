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
                         'confirm_message' => 'Yakin mau menghapus ' .$kategori->nama . '?'
         
                     ]);
                     })->make(true);
         }
         $html = $builder
         ->addColumn(['data' => 'nama_kategori', 'name'=>'nama_kategori', 'title'=>'Nama Kategori'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
         return view('kategori.index')->with(compact('html'));
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // $kategori =  kategori::all();
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
    
        $this->validate($request, ['nama_kategori' => 'required|unique:kategoris']);
        $kategori = new kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        $kategori->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kategori->nama_kategori"
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
        $kategori = kategori::find($kategori->id);
        return view('kategori.edit')->with(compact('kategori'));
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
        
        $this->validate($request, ['nama_kategori' => 'required|unique:kategoris']);
        $kategori = kategori::findOrFail($kategori->id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        $kategori->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kategori->nama_kategori"
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
        kategori::destroy($kategori->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Kategori berhasil dihapus"
        ]);
        return redirect()->route('kategori.index');
    }
}
