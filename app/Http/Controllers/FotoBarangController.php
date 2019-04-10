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
        if ($request->ajax()) {            
            $foto_barang = foto_barang::with(['barang']);
            return Datatables::of($foto_barang)
            ->addColumn('action', function($foto_barang){
                return view('datatable._action', [
                    'model'=> $foto_barang,
                    'form_url'=> route('foto_barang.destroy', $foto_barang->id),
                    'edit_url' => route('foto_barang.edit', $foto_barang->id),
                    ]);
                })->make(true);
        }
        $html = $htmlBuilder        
        ->addColumn(['data' => 'barang.nama_barang', 'name'=>'barang.nama_barang', 'title'=>'Barang'])        
        ->addColumn(['data' => 'foto', 'name'=>'foto', 'title'=>'Foto']) 
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);
        return view('foto_barang.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $foto_barang = foto_barang::with('barang')->get();
        $barang = barang::findOrFail($id);        
        return view('foto_barang.create', compact('barang','foto_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request, [
        //     'foto' => 'image|max:20048',
        //     'id_barang' => 'required'
        // ]);
        // $foto_barang = Foto_barang::create($request->except('foto'));
        // isi field foto jika ada foto yang diupload
        if ($request->hasFile('foto')) {
            foreach ($request->foto as $foto){
                $filename = $foto->getClientOriginalName();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/foto_barang';
                $foto->move($destinationPath, $filename);
                $foto_barang = foto_barang::create($request->except('foto'));
                $foto_barang->foto = $filename;
                $foto_barang->save();
            }
        }

        // return redirect()->route('foto_barang.index');
        return redirect()->route('barang.index');
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
        $foto_barang = foto_barang::findOrFail($foto_barang->id);
        $barang = barang::all();
        $barangselect= barang::findOrFail($foto_barang->id)->id_barang;
        return view('foto_barang.edit',compact('foto_barang','barang','barangselect'));
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
        $this->validate($request, [
            'foto' => 'image|max:20048',
            'id_barang' => 'required'
        ]);
        $foto_barang = Foto_barang::find($foto_barang->id);
        $foto_barang -> update($request->all());
        // isi field foto jika ada foto yang diupload
        if ($request->hasFile('foto')) {
        // Mengambil file yang diupload
        $uploaded_foto = $request->file('foto');
        // mengambil extension file
        $extension = $uploaded_foto->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan foto ke folder public/img/foto_barang
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/foto_barang';
        $uploaded_foto->move($destinationPath, $filename);
        // mengisi field foto di foto_barang dengan filename yang baru dibuat
        $foto_barang->foto = $filename;
        $foto_barang->save();
        }
        
        return redirect()->route('foto_barang.index');
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
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/foto_barang'
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