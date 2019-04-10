
@extends('frontend.index')
@section('conten')
    <!-- ##### Breadcumb Area Start ##### -->
        <div class="breadcumb_area bg-img" style="background-image: url({{asset('fe/img/bg-img/breadcumb.jpg')}}">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Sports</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                       <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30"></h6>

                            <!--  Catagories  -->
                             <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Kategori</a>

                                        <ul class="sub-menu collapse show" id="clothing">
                                         @foreach($kategori as $datas)
                                            <li><a href="/barang/kategori/{{$datas->slug}}">{{$datas->nama_kategori}} (<span>{{ $datas->barang->count() }}</span>)</a></li>
                                        @endforeach
                                        </ul>
                                    </li>

                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">Jenis</a>
                                        
                                        <ul class="sub-menu collapse" id="shoes">
                                        @foreach($jenis as $dat)
                                        <li><a href="/barang/jenis/{{$dat->slug}}">{{$dat->nama_olahraga}} (<span>{{ $dat->barang->count() }}</span>)</a></li>
                                        @endforeach    
                                        </ul>
                                       
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="#">Merk/Brand</a>
                                        
                                        <ul class="sub-menu collapse" id="accessories">
                                        @foreach($merk as $data)
                                        <li><a href="/barang/merk/{{$data->nama}}">{{$data->nama_merk}} (<span>{{ $data->barang->count() }}</span>)</a></li>
                                        @endforeach     
                                        </ul>
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                       
                        <!-- ##### Single Widget ##### -->
                     

                        <!-- ##### Single Widget ##### -->
                     
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span></span></p>
                                    </div>
                                    <!-- Sorting -->
                                    <!-- <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    @foreach($barang as $datas)

                        <div class="single-product-wrapper">
                                          @foreach($datas->foto_barang()->get() as $data_foto)

                            <!-- Product Image -->
                            <div class="product-img">
                                @if($loop->first)
                                <img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" alt="">
                                <!-- Hover Thumb -->
                                @endif

                                <!-- Favourite -->
                                  <!-- Favourte -->
                               
                            </div>
                            @endforeach
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>Something</span>
                                <a href="/singleproduk/{{$datas->slug}}">
                                    <h6>{{$datas->nama_barang}}</h6>
                                </a>
                                <span class="current_price">Rp. {{ number_format($datas->harga) }},-</span>

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
                    <!-- Pagination -->
                
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

@endsection