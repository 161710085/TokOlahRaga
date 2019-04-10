<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\berita;
use App\bukti;
use App\cart;
use App\checkout;
use App\foto_barang;
use App\kategori;
use App\jenis;
use App\merk;
use Auth;
use Laratrust\LaratrustFacade as Laratrust;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if (Laratrust::hasRole('admin')) return $this->adminDashboard();
     if (Laratrust::hasRole('member')) return $this->memberDashboard();
    }

    protected function adminDashboard(){
        return view('dashboard.admin');
    }

    protected function memberDashboard(){
        $barang=barang::all();
        $bukti=bukti::all();
        $berita=berita::all();
        $cart=cart::all();
        $checkout=checkout::all();
        $foto_barang=foto_barang::all();
        $jenis=jenis::all();
        $kategori=kategori::all();
        $merk=merk::all();
                 $kabar=kategori::paginate(3);
        // $mycart=Auth::user()->cart()->get();
        return view('frontend.home',compact('barang','bukti','berita','cart','checkout','foto_barang','jenis','kategori','merk','kabar'));
    }
}
