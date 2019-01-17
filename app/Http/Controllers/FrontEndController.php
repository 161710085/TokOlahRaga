<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto_barang;
use App\kategori;
use App\jenis;
use App\merk;
use App\barang;
class FrontEndController extends Controller
{
    public function foto_barang() 
    
    {
        $jenis =jenis::all();
        $kategori=kategori::all();
        $barang = barang::all();
        return view('frontend.home',compact('barang','jenis','kategori'));
    }
    public function shop() 
    
    {
        $jenis=jenis::all();
        $kategori=kategori::all();
        $barang = barang::all();
        return view('frontend.shop',compact('jenis','kategori','barang'));
    }
    public function singleproduk($slug)
        {
            $barang = barang::whereSlug($slug)->first();
            $kategori = kategori::all();
            // $foto = foto_barang::all();
            return view('frontend.single',compact('barang','kategori'))->with('barang',$barang);
        }
public function kategoribarang(kategori $kategori)
{
        $barang = $kategori->barang()->latest()->paginate(5);
        return view('frontend.shop',compact('barang','kategori'));
    }
}
