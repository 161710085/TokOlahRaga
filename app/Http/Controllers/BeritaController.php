<?php

namespace App\Http\Controllers;

use App\berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use Session;
use File;
class BeritaController extends Controller
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
            $berita = berita::all();
             return Datatables::of($berita)
                     ->addColumn('action', function ($berita) {  
                         return view('datatable._action', [
                         'model'=> $berita,
                         'form_url'=> route('berita.destroy', $berita->id),
                         'edit_url' => route('berita.edit',$berita->id),
                         'confirm_message' => 'Yakin mau menghapus ' .$berita->nama . '?'
         
                     ]);
                     })->make(true);
         }
         $html = $builder
         ->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Nama berita'])
        ->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Dibuat pada'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        return view('Berita.index')->with(compact('html'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'image|max:20048']);
            $berita = new berita;
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
        $berita->slug = str_slug($request->judul,'-');
        // isi field foto jika ada foto yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_foto = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan foto ke folder public/img/berita
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/berita';
        $uploaded_foto->move($destinationPath, $filename);        
        // mengisi field foto di berita dengan filename yang baru dibuat
        $berita->foto = $filename;
        $berita->save();
        }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $berita->judul"
            ]);  
            return redirect()->route('berita.index');              
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = berita::findOrFail($id);
        return view('berita.show',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = berita::findOrFail($id);

        return view('berita.edit',compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, ['judul' => 'required',
                                'isi' => 'required',
                                'foto' => 'image|max:20048']);
        $berita = berita::find($id);
        $berita -> update($request->all());
        // $berita->slug = str_slug($request->judul,'-');
        // isi field logo jika ada logo yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_foto = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan foto ke folder public/img/berita
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/berita';
        $uploaded_foto->move($destinationPath, $filename);
        // mengisi field foto di berita dengan filename yang baru dibuat
        $berita->foto = $filename;
        $berita->save();
        }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $berita->judul"
            ]);  
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = berita::findOrFail($id);
        if ($berita->foto) {
            $old_foto = $berita->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/berita'
            . DIRECTORY_SEPARATOR . $berita->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $berita->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('berita.index');
    }
}
