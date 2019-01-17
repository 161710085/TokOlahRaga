<?php

namespace App\Http\Controllers;

use App\foto_barang;
use App\barang;
use Illuminate\Http\Request;
use File;
class FotoBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto_barang = foto_barang::all();
        // dd($foto_barang);
        return view('foto_barang.index',compact('foto_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('foto_barang.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            foreach($request->foto as $foto) {
                $filename = $foto->getClientOriginalName();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/';
                $foto->move($destinationPath, $filename);
                $foto_barang = foto_barang::create($request->except('foto')); 
                $foto_barang->foto = $filename;
                $foto_barang->save();
            }
            }
        return redirect()->route('fotbar.index');
    }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\foto_barang  $foto_barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\foto_barang  $foto_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto_barang = foto_barang::findOrFail($id);
        $barang = barang::all();
        return view('foto_barang.edit',compact('foto_barang','barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\foto_barang  $foto_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foto_barang = foto_barang::findOrFail($id);
        $foto_barang->id_barang = $request->id_barang;
        // edit upload foto       
        if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $destinationPath = public_path().'/assets/img/';
                    $filename = str_random(6).'_'.$file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
            
                // hapus foto lama, jika ada
                if ($foto_barang->foto) {
                $old_foto = $foto_barang->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/'
                . DIRECTORY_SEPARATOR . $foto_barang->foto;
                    try {
                    File::delete($filepath);
                    } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    } 
                   
                }
                $foto_barang->foto = $filename;

            }

        $foto_barang->save();
        return redirect()->route('fotbar.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\foto_barang  $foto_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto_barang = foto_barang::findOrFail($id);
        if ($foto_barang->foto) {
            $old_foto = $foto_barang->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/img/'
            . DIRECTORY_SEPARATOR . $foto_barang->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        
        $foto_barang->delete();
        return redirect()->route('fotbar.index');
    }
}