@extends('frontend.index')
@section('conten')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url({{asset('fe/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('fe/img/bg-img/bg-2.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Clothing</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('fe/img/bg-img/bg-3.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Shoes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('fe/img/bg-img/bg-4.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Accessories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url({{asset('fe/img/bg-img/bg-5.jpg')}});">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
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
                                          @foreach($datas->foto_barang()->get() as $d)

                            <!-- Product Image -->
                            <div class="product-img">
                                @if($loop->first)
                                <img src="{{ asset('assets/img/'.$d->foto)  }}" alt="">
                                <!-- Hover Thumb -->
                                @endif


                                                  @foreach($datas->foto_barang()->get() as $da)
                                @if($loop->last)
                                <img class="hover-img" src="{{ asset('assets/img/'.$da->foto)  }}" alt="">
                                @endif
                                                    @endforeach
                                <!-- Favourite -->
                                  <!-- Favourte -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            @endforeach
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$datas->merk->nama }}</span>
                                <a href="/single/{{$datas->slug}}">
                                    <h6>{{$datas->nama}}</h6>
                                </a>
                                <p class="product-price">{{$datas->harga}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
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