<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@front')->name('front');
Route::post('/produk','cartController@store');
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('jenis','JenisController');
    Route::resource('merk','MerkController');
    Route::resource('kategori','KategoriController');
    Route::resource('berita','BeritaController');
    Route::resource('barang', 'BarangController');
    Route::get('foto_barang/{id}', 'FotoBarangController@create')->name('foto_barang.create');
    Route::post('foto_barang/{id}/create', 'FotoBarangController@store')->name('foto_barang.store');
        Route::post('foto_barang', 'FotoBarangController@store')->name('foto_barang');
        Route::get('search', 'FrontendController@search')->name('search');
    Route::resource('berita', 'BeritaController');
});
Route::group(['prefix'=>'member', 'middleware'=>['auth', 'role:member|admin']], function () {
Route::get('shop','FrontEndController@shop')->name('shop');
Route::get('/singleproduk/{barang}','FrontendController@singleproduk')->name('singleproduk');
Route::get('/barang/kategori/{kategori}','FrontendController@kategoribarang');
Route::get('blog','FrontEndController@blog')->name('blog');
Route::get('kontak','FrontEndController@kontak')->name('kontak');
Route::get('search', 'FrontendController@search')->name('search');
Route::get('singleblog/{berita}','FrontEndController@singleblog')->name('singleblog');
});

Route::get('shop','FrontEndController@shop')->name('shop');
Route::get('/singleproduk/{barang}','FrontendController@singleproduk')->name('singleproduk');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barang/kategori/{kategori}','FrontendController@kategoribarang');
Route::get('/barang/jenis/{jenis}','FrontendController@jenisbarang');
Route::get('/barang/merk/{merk}','FrontendController@merkbarang');
Route::get('search', 'FrontendController@search')->name('search');
Route::get('blog','FrontEndController@blog')->name('blog');
Route::get('kontak','FrontEndController@kontak')->name('kontak');
Route::get('/singleblog/{berita}','FrontEndController@singleblog')->name('singleblog');
Route::post('/barang', 'CartController@store');


Route::group(['middleware'=>['auth','role:member|admin']],function(){

 Route::get('/add-cart/{id_barang}', function($id_barang){
        $exist = \App\Cart::where('id_user', \Auth::user()->id)->where('id_barang',$id_barang)->first();
        if($exist){
            $quantity = 1;
            $exist->quantity = $exist->quantity + 1;
            // $barang = \App\Barang::find($id_barang);
            // $barang->stock = $barang->stock - $quantity;
            // $barang->save();
            $exist->save(); 
        }else{    
            $data = new \App\Cart;
            $data->id_barang = $id_barang;
            $data->quantity = 1;
            $data->id_user = \Auth::user()->id;
            // $barang = \App\Barang::find($id_barang);
            // $barang->stock = $barang->stock - $data->quantity;
            // $barang->save();
            $data->save();
       
        }
        return redirect()->back();
    });
    Route::get('cart', function () {
        $cart = \App\cart::all();
        $barang = \App\barang::orderBy('created_at','desc')->paginate(5);
        $kategori = \App\kategori::all();
        $merk = \App\merk::all();
        $jenis = \App\jenis::all();
        $berita = \App\berita::all();
        $foto_barang = \App\foto_barang::all();
        return view('frontend.cart', compact('barang','kategori','merk','jenis','berita','foto_barang','cart'));
    });
    Route::get('cart/delete/{id}', function ($id) {
        $cart = \App\Cart::find($id)->delete();
        return redirect()->back();
    });
    Route::post('cart/edit/{id_user}', function ( \Illuminate\Http\Request $request, $id_user) {
        for($i = 0; $i < count($request->id); $i++){
            $cart = \App\cart::find($request->id[$i]);
            $cart->quantity = $request->quantity[$i];
            // $barang = \App\Barang::find($request->barang[$i]);
            // $barang->stock = $barang->stock - $cart->quantity;
            // $barang->save();
            $cart->save();
        }

        return redirect()->back();
    });
    Route::get('check/{id_user}', function ($id_user) {
        $cart = \App\cart::all();
        $barang = \App\barang::orderBy('created_at','desc')->paginate(5);
        $kategori = \App\kategori::all();
        $merk = \App\merk::all();
        $jenis = \App\jenis::all();
        $berita = \App\berita::all();
        $foto_barang = \App\foto_barang::all();
        return view('Frontend.checkout', compact('barang','kategori','merk','jenis','berita','foto_barang','cart'));
    });
    Route::post('checkout/{id_user}',function( \Illuminate\Http\Request $request, $id_user){
        $request->validate([
            'alamat' => 'required|',
            'nomer_telepon' => 'required|',
            'nama_lengkap' => 'required|',
            'provinsi' => 'required|',
            'kab_kot' => 'required|',
            'kecamatan' => 'required|',
        ]);
        // dd(json_decode($request->chart));
        foreach(json_decode($request->chart) as $data){

            $checkout = new \App\checkout;
            $checkout->nama_lengkap = $request->nama_lengkap;
            $checkout->nomer_telepon = $request->nomer_telepon;
            $checkout->email = $request->email;
            $checkout->provinsi = $request->provinsi;
            $checkout->kab_kot = $request->kab_kot;
            $checkout->kecamatan = $request->kecamatan;
            $checkout->alamat = $request->alamat;
            $checkout->id_barang = $data->id_barang;
            $checkout->id_user = \Auth::user()->id;
            
            $checkout->save();
        }

        $del = \App\cart::where('id_user', $id_user)->delete();

         return redirect()->back();
     
    });
});
Auth::routes();
