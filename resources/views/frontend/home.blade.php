@extends('frontend.index')
@section('conten')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url({{asset('fe/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Selamat Datang Di</h6>
                        <h2>Kopo Sport</h2>
                        <a href="{{route('shop')}}" class="btn essence-btn">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
   
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Produk Terbaru</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    @foreach($barang as $datas)

                        <div class="single-product-wrapper">
                               @foreach($datas->foto_barang as $data_foto)
                                @if ($loop->first)
                                <div class="product_thumb">
                                    <a href="{{ url('barang', $datas->slug) }}"><img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" style="height:250px;width:250px" alt=""></a>
                                </div>
                                @endif                                
                                @endforeach
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$datas->merk->nama_merk}}</span>
                                <a href="/singleproduk/{{$datas->slug}} ">
                                    <h6>{{$datas->nama_barang}}</h6>
                                </a>
                                <p class="current_price">Rp.{{ number_format($datas->harga) }},-</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="{{url('add-cart',$datas->id)}}" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand1.png')}}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand2.png')}}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand3.png')}}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand4.png')}}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand5.png')}}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{asset('fe/img/core-img/brand6.png')}}" alt="">
        </div>
    </div>
@endsection