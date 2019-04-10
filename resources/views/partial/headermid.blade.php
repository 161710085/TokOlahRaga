<div class="header_middel">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="logo">
                    <a href="{{ route('front') }}"><img src="{{ asset('assets/Frontend/assets/img/logo/logos.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7 col-md-5">
                <div class="search_bar">
                    <form action="{{ route('search') }}" method="GET">
                        {{ csrf_field() }}
                        <input placeholder="Cari Barang Disini..." type="text" name="search">
                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
            </div>
            @php
        	if(\Auth::check()){
        		$cart = \App\Cart::where('id_user', \Auth::user()->id)->get();
        	}
            @endphp
            <div class="col-lg-2 col-md-3">
                <div class="cart_area">
                    <div class="cart_link">
                        @if(Auth::check())
                        <a href="#"><i class="ion-ios-cart-outline"></i>Keranjang</a>
                        @endif
                        @if(Auth::check() && $cart->count() > 0)
                        <span class="cart_count">{{$cart->count()}}</span>
                        @endif
                        <!--mini cart-->
                         <div class="mini_cart">
                            <div class="items_nunber">
                                @if(Auth::check() && $cart->count() > 0)
                                <span>{{$cart->count()}} Barang dalam keranjang</span>
                                @endif
                            </div>                            
                            @if(Auth::check())
                            @php
                            $total_all = 0;
                            @endphp
                            @foreach($cart as $data)
                            <div class="cart_item">
                               {{-- <div class="cart_img">
                                   <a href="#"><img src="{{ asset('assets/Frontend/assets/img/cart/cart1.jpg') }}" alt=""></a>
                               </div> --}}
                               {{-- <div class="cart_info"> --}}
                                    <a href="{{ url('product', $data->barang->slug) }}">{{ $data->barang->nama_barang }}</a>
                                    <br>                                    
                                        <b>{{$data->quantity}} X<span>&nbsp;Rp. {{ number_format($data->barang->harga,2,',','.')}}</span></b>
                                        @php 
                                            $t_s = $data->quantity * $data->barang->harga;
                                            $total_all = $total_all + $t_s;
                                        @endphp                                    
                                {{-- </div> --}}
                            </div>
                            @endforeach
                            <div class="cart_button view_cart">
                                <a href="{{url('cart', Auth::user()->id)}}">Lihat dan Rubah Cart</a>
                            </div>
                            @endif
                        </div>
                        <!--mini cart end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>