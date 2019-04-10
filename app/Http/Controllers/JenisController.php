<?php

namespace App\Http\Controllers;

use App\jenis;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\DataTables;
use Illuminate\Http\Request;
use Session;
class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, Builder $builder)
    { 
        if ($request->ajax()) {
       $jenis = jenis::all();
        return Datatables::of($jenis)
                ->addColumn('action', function ($jenis) {  
                    return view('datatable._action', [
                    'model'=> $jenis,
                    'form_url'=> route('jenis.destroy', $jenis->id),
                    'edit_url' => route('jenis.edit',$jenis->id),
                    'confirm_message' => 'Yakin mau menghapus ' .$jenis->nama . '?'
    
                ]);
                })->make(true);
    }
    $html = $builder
    ->addColumn(['data' => 'nama_olahraga', 'name'=>'nama_olahraga', 'title'=>'Nama Olahraga'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
    return view('jenis.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama_olahraga' => 'required|unique:jenis']);
        $olahraga = new jenis;
        $olahraga->nama_olahraga = $request->nama_olahraga;
        $olahraga->slug = str_slug($request->nama_olahraga,'-');
        $olahraga->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $olahraga->nama_olahraga"
            ]);
        return redirect()->route('jenis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = jenis::findOrFail($id);
        return view('jenis.show',compact('jenis'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $jenis = jenis::findOrFail($id);

        return view('jenis.edit',compact('jenis'));
  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
        {
            $this->validate($request, ['nama_olahraga' => 'required|unique:jenis']);
            $olahraga = jenis::findOrFail($id);
            $olahraga->nama_olahraga = $request->nama_olahraga;
            $olahraga->slug = str_slug($request->nama_olahraga,'-');
            $olahraga->save();
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan $olahraga->nama_olahraga"
                ]);
            return redirect()->route('jenis.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        jenis::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Olahraga berhasil dihapus"
        ]);
        return redirect()->route('jenis.index');
    }
}