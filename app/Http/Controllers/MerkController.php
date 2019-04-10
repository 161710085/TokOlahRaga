<?php

namespace App\Http\Controllers;

use App\merk;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\DataTables;
use Session;
class MerkController extends Controller
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
            $merk = merk::all();
             return Datatables::of($merk)
                     ->addColumn('action', function ($merk) {  
                         return view('datatable._action', [
                         'model'=> $merk,
                         'form_url'=> route('merk.destroy', $merk->id),
                         'edit_url' => route('merk.edit',$merk->id),
                         'confirm_message' => 'Yakin mau menghapus ' .$merk->nama . '?'
         
                     ]);
                     })->make(true);
         }
         $html = $builder
         ->addColumn(['data' => 'nama_merk', 'name'=>'nama_merk', 'title'=>'Nama Merk'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
         return view('merk.index')->with(compact('html'));
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, ['nama_merk' => 'required|unique:merks']);
        $merk = new merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->slug = str_slug($request->nama_merk,'-');
        $merk->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $merk->nama_merk"
            ]);
        return redirect()->route('merk.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show(merk $merk)
    {
        $merk = merk::findOrFail($id);
        return view('merk.show',compact('merk'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = merk::find($id);
        return view('merk.edit')->with(compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, ['nama_merk' => 'required|unique:merks']);
        $merk = merk::findOrFail($id);
        $merk->nama_merk = $request->nama_merk;
        $merk->slug = str_slug($request->nama_merk,'-');
        $merk->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $merk->nama_merk"
            ]);
        return redirect()->route('merk.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $a = merk::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('merk.index');

        //
    }
}
