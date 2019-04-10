<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#header<?php echo $i;?>').on('change keyup', function(){
  var newquantity = $('#header<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();
   if(newquantity <=0){ alert('enter only valid quantity') }
  else {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/cart/update');?>/'+proId,
        data: "quantity=" + newquantity + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }
  });
  <?php } ?>
});
</script>

<header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{route('front')}}"><img src="{{asset('fe/img/core-img/logos.png')}}" style="width: 150px" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Semua Kategori</a>
                                <div class="megamenu">
                                          @foreach($kategori as $datas)
                                
                                    <ul class="single-mega cn-col-4">
<!--                                         <li class="title">{{$datas->nama}}</li> -->
                                        <li><a href="/barang/kategori/{{$datas->slug}}">
                                      {{$datas->nama_kategori}} (<span>{{ $datas->barang->count() }}</span>)</a>
                                           
                                        </li>
                                    </ul>
                                           @endforeach      
                                <!--     <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul> -->
                                   
                                </div>
                            </li>
                            <li><a href="#">Halaman</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('front')}}">Home</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>
                                    <li><a href="{{route('blog')}}">Blog</a></li>

                                </ul>
                            </li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <!-- <li><a href="{{route('kontak')}}">Contact</a></li> -->
                            <li><a href="{{route('blog')}}">Blog</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="{{ route('search') }}" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Cari Barang Disini...">

                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    
                </div>
                <!-- Favourite Area -->

                <!-- User Login Info -->
                @guest
                <div class="user-login-info">
                    <a href="{{route('login')}}"><img src="{{asset('fe/img/core-img/user.svg')}}" alt="">LOGIN</a>
                </div>
                @else
                <div class="user-login-info">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <img src="{{asset('fe/img/core-img/user.svg')}}">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
                @endguest
                <!-- Cart Area -->
                @php
                    if(\Auth::check()){
                        $cart = \App\cart::where('id_user', \Auth::user()->id)->get();
                    }
                @endphp
                @if(Auth::check() && $cart->count() > 0)
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="{{asset('fe/img/core-img/bag.svg')}}" alt=""><span>{{ $cart->count() }}</span></a>
                </div>
                @endif
            </div>

        </div>
    </header>
    <div class="cart-bg-overlay"></div>
    <div class="right-side-cart-area">

            <!-- Cart Button -->
                 

        
        @if(Auth::check() && $cart->count() > 0)
        <div class="cart-button">
            <a href="{{ url('/cart') }}"  id="rightSideCart"><img src="{{asset('fe/img/core-img/bag.svg')}}" alt=""><span>{{$cart->count()}}</span></a>
        </div>
        @endif
        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                @guest
                
                @else

                            {{csrf_field()}}
                   @php
                        $total_all = 0;
                        $cart = \App\cart::where('id_user', \Auth::user()->id)->get();
                    @endphp
                        @foreach($cart as $data)
                        @php 
                        $t_s = $data->quantity * $data->barang->harga;
                        $total_all = $total_all + $t_s;
                        @endphp
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                     
                        @foreach($data->barang()->get() as $s)
                          @foreach($s->foto_barang()->get() as $data_foto)
                           @if($loop->first)
                        <img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" style="height: 250px; " class="cart-thumb" alt="">
                        @endif

                        <!-- Cart Item Desc -->
                        @endforeach
                        @endforeach
                        <input type="hidden" name="id[]" value="{{$data->id}}">
   
                        <div class="cart-item-desc">
                       
                            <span class="badge">{{$s->merk->nama_merk}}</span>
                            
                            <h6>{{$s->nama_barang}}</h6>
                            <!-- <td class="product_quantity">
                                        <input class="mtext-104 cl3 txt-center num-product" min="1" max="{{ $data->barang->stock }}" type="number" name="quantity[]" value="{{$data->quantity}}">
                                    </td> -->
                            <h6 class="product-price">Rp. {{number_format($data->barang->harga,2,',','.')}}  X {{$data->quantity}} </h6>
                           
                            
                        </div>
         
                 
                </div>
                        @endforeach
                <!-- Single Cart Item -->
              
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Ringkasan</h2>
                <ul class="summary-table">
                    <li><span>total:</span> <span>Rp. {{number_format($total_all,2,',','.')}}</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="{{url('cart')}}" class="btn essence-btn">Lihat Keranjang</a>
                </div>
                </div>
            </div>
                @endguest
            </div>
        </div>
    </div>