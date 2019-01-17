<?php

namespace App\Http\Controllers;

use App\berita;
use Illuminate\Http\Request;
use Session;
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
            public function index()
    {
        $berita = berita::all();
        return view('berita.index',compact('berita'));
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
        $this->validate($request,[
           'judul' => 'required',
        'artikel' => 'required'
        ]);
            $berita = new berita;
            $berita->judul = $request->judul;
                        $berita->artikel = $request->artikel;
            $berita->slug =str_slug($request->nama,'-');
            $berita->save();
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan <b>$berita->nama</b>"
            ]);
            return redirect()->route('berita.index');
            
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
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
    public function edit(berita $berita)
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
    public function update(Request $request, berita $berita)
    {
        
        $this->validate($request,[
               'judul' => 'required',
            'artikel' => 'required'
        ]); 
        $berita = berita::find($id);
        $berita -> update($request->all());
        // isi field gambar jika ada gambar yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_logo = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_logo->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan gambar ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/';
        $uploaded_logo->move($destinationPath, $filename);
        // mengisi field gambar di Galeri dengan filename yang baru dibuat
        $berita->foto = $filename;
        $berita->save();
    }
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita)
    {
        $berita = berita::findOrFail($berita->id);
        if ($berita->foto) {
            $old_foto = $berita->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/img/berita/'
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
