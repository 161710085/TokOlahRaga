@extends('frontend.index')
@section('conten')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('fe/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    
</head>

<body>
    <!-- ##### Header Area Start ##### -->

    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
   
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product     Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                 @foreach($barang->foto_barang()->get() as $data_foto)
                                        @if($loop->first)
                <img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" style="height: 600px;width: 600px" alt="">
                 @endif
                 @if($loop->last)
                <img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" alt="">
                @endif
                                        @endforeach
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>{{$barang->merk->nama_merk}}</span>
            <a href="cart.html">    
                <h2>{{$barang->nama_barang}}</h2>
            </a>
            <p class="product-price">Rp. {{ number_format($barang->harga) }}</p>
            <p class="product-desc">{!! $barang->deskripsi !!}</p>

            <!-- Form -->   
            <form id="formCart" class="cart-form clearfix" method="post" enctype="multipart/form-data">
                {{csrf_field()}}    {{method_field('POST')}}
                <!-- Select Box -->
                <input type="hidden" name="id_user" value="{{ Auth::user()->id}}">
                <input type="hidden" name="id_barang" value="{{$barang->id}}">
                <h3>Stok Tersedia :{{$barang->stock}}</h3>
                @if ($barang->stock >= 1)
                <!-- <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Ukuran {{$barang->size}}</option>
                        
                    </select>
                   
                </div> -->
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                      <div class="add-to-cart-btn">
                                        <a href="{{url('add-cart',$barang->id)}}" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                    @else
                                    <div class="product_action_link">
                            <ul>
                                <li class="product_cart"><h3>Mohon Maaf, Stock Barang Habis</h3></li>
                            </ul>
                        </div>
                        @endif
                    <!-- Favourite -->
                    {{-- @role('member')
                        <form id="formCart" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="id_barang" value="{{ $barang->id }}">
                        <div class="product_stock">
                            <label>Jumlah Barang</label>
                            <input min="1" name="quantity" max="{{ $barang->stock }}" type="number" required>
                        </div>
                        <div class="product_action_link">
                            <ul>
                                <li class="product_cart"><button class="btn btn-primary rounded" type="submit" name="submit" id="aksi">Tambah Ke Keranjang</button></li>
                            </ul>
                        </div>
                        </form>
                        @endrole
                        @if (Auth::guest())
                            <h6>*Jika Ingin Memesan Login Terlebih Dahulu</h6>
                        @endif                     --}}
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->

</body>


</html>
@endsection