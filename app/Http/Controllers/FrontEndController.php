<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto_barang;
use App\kategori;
use App\jenis;
use App\merk;
use App\barang;
use App\berita;
class FrontEndController extends Controller
{
    public function foto_barang() 
    
    {
        $jenis =jenis::all();
        $kategori=kategori::all();
        $barang = barang::all();
         $kabar=kategori::paginate(3);
        return view('frontend.home',compact('barang','jenis','kategori','kabar'));
    }
    public function shop() 
    
    {
        $jenis=jenis::all();
        $kategori=kategori::all();
                $merk=merk::all();
        $barang = barang::all();
        return view('frontend.shop',compact('jenis','kategori','barang','merk'));
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
       
        $kategori=kategori::all();
         $jenis=jenis::all();
          $merk=merk::all();
                   $kabar=kategori::paginate(3);
        return view('frontend.shop',compact('barang','kategori','jenis','merk','kabar'));
    }

    public function jenisbarang(jenis $jenis)
{
        $kategori=kategori::all();
                $merk=merk::all();
        $barang = $jenis->barang()->latest()->paginate(5);
 $jenis=jenis::all();
          $kabar=kategori::paginate(3);
        return view('frontend.shop',compact('barang','kategori','merk','jenis','kabar'));
    }

    public function merkbarang(merk $merk)
{
        $barang = $merk->barang()->latest()->paginate(5);
        $merk=merk::all();
         $kategori=kategori::all();
        $jenis=jenis::all();
                 $kabar=kategori::paginate(3);
        return view('frontend.shop',compact('barang','merk','kategori','jenis','kabar'));
    }
    public function blog (berita $berita)
    {
        $barang = barang::orderBy('created_at','desc')->paginate();
        $kategori = kategori::all();
        $merk = merk::all();
        $jenis = jenis::all();
        $berita=berita::all();
        $foto_barang = foto_barang::all();
        return view('frontend.blog',compact('barang','kategori','merk','jenis','berita','foto_barang'));
  
}
public function singleblog ($slug)
    {
        $barang = barang::orderBy('created_at','desc')->paginate();
        $kategori = kategori::all();
        $merk = merk::all();
        $jenis = jenis::all();
        $foto_barang = foto_barang::all();
        $berita = berita::whereSlug($slug)->first();
        return view('frontend.singleblog',compact('barang','kategori','merk','jenis','berita','foto_barang','berita'));

}
public function front()
{
    // $mycart = Cart::all();
    // $mycart = Auth::user()->Cart()->get();
    $barang = barang::orderBy('created_at','desc')->paginate();
    $kategori = kategori::all();
    $merk = merk::all();
    $jenis = jenis::all();
    $berita = Berita::orderBy('created_at','desc')->paginate();
    $foto_barang = foto_barang::all();
    return view('frontend.home',compact('barang','kategori','merk','jenis','berita','foto_barang'));
}
public function search( Request $req){
    if($req->search == ""){
        // $cart = Cart::all();
        // $mycart = Auth::user()->Cart()->get();
        $barang = search::paginate(9);
        return view ('frontend.result',compact('barang','cart','mycart'));
    }else{
        // $cart = Cart::all();
        // $mycart = Auth::user()->Cart()->get();
        $barang = barang::where('nama_barang', 'LIKE', '%' . $req->search . '%')->paginate(9);
        $barang->appends($req->only('search'));
        $jenis = jenis::all();
        $merk = merk::all();
        $kategori = kategori::all();
        return view('frontend.result',compact('barang','jenis','merk','kategori'));
    }
}
public function kontak()
{
    // $mycart = Cart::all();
    // $mycart = Auth::user()->Cart()->get();
    $barang = barang::orderBy('created_at','desc')->paginate();
    $kategori = kategori::all();
    $merk = merk::all();
    $jenis = jenis::all();
    $berita = Berita::orderBy('created_at','desc')->paginate();
    $foto_barang = foto_barang::all();
    return view('frontend.kontak',compact('barang','kategori','merk','jenis','berita','foto_barang'));
}
}
