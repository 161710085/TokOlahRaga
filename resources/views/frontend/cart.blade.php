@extends('frontend.index')
@section('conten')
<!--breadcrumbs area start-->
<div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

            <div class="col-12 col-md-12 col-lg-12 ml-lg-auto">
                    <div class="order-details-confirmation">


                        <div class="cart-page-heading">
                            <center>
                            <h2>Keranjang</h2></center> 
                        </div>
                    <ul>
                        <li><a href="{{ route('front') }}" style="color: blue;">Halaman Awal</a></li>
                    </ul>
                
       
<!--breadcrumbs area end-->

 <!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">  
        <form method="post" action="{{url('cart/edit/'.Auth::user()->id)}}">
                {{csrf_field()}}        
            <div class="row">
                    <div class="col-10">                    
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product_remove">Hapus</th>
                                    {{-- <th class="product_thumb">Foto</th> --}}
                                    <th class="product_name">Produk</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product_quantity">Jumlah</th>
                                    <th class="product_total">Total</th>


                                </tr>
                            </thead>
                            @php
                            	$total_all = 0;
                            	$cart = \App\Cart::where('id_user', \Auth::user()->id)->get();
                            @endphp
                            @foreach($cart as $data)
                            @php 
                                $t_s = $data->quantity * $data->barang->harga;
                                $total_all = $total_all + $t_s;
                            @endphp
                            <tbody>
                                <input type="hidden" name="id[]" value="{{$data->id}}">
                                <input type="hidden" name="barang[]" value="{{ $data->id }}"> 
                                <tr>
                                    <td class="product_remove"><a href="{{url('cart/delete', $data->id)}}"><h1><i class="fa fa-trash-o"></i></h1></a></td>
                                    {{-- <td class="product_thumb"><a href="#"><img src="assets/img/cart/cart6.jpg" alt=""></a></td> --}}
                                    <td class="product_name"><a href="{{ url('product', $data->barang->slug) }}">{{ $data->barang->nama_barang }}</a></td>
                                    <td class="product-price">Rp. {{number_format($data->barang->harga,2,',','.')}}</td>
                                    <td class="product_quantity">
                                        <input class="mtext-104 cl3 txt-center num-product" min="1" max="{{ $data->barang->stock }}" type="number" name="quantity[]" value="{{$data->quantity}}">
                                    </td>
                                    <td class="product_total">Rp. {{number_format($data->quantity * $data->barang->harga,2,',','.')}}</td>                                
                                </tr>                            
                            </tbody>

                            @endforeach
                        </table>   
                            </div>  

                            <div class="row"> 
                            <div class="cart_submit">
                                
                                <button type="submit"class="btn essence-btn">Perbaharui Keranjang</button>
                            </div>
                            
                               
                               </div>
                                <div class="coupon_code right" style="float: right;">
                            <h3 style="float: right;">Total Keranjang</h3><br><br>
                            <div class="coupon_inner">                        
                               <div class="cart_subtotal"><br>
                                  
                                   <p class="cart_amount" style="float: right;"> <h4>Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Rp. {{number_format($total_all,2,',','.')}}</p></h4>
                               </div>
                               <div class="checkout_btn">
                                   <a href="{{url('check', Auth::user()->id)}}" class="btn essence-btn">Lanjutkan Ke Pembayaran</a>
                               </div>
                            </div>
                        </div>
                              
                        </div>    
                        </div>                
                 </div>
             </div>
             <!--coupon code area start-->
           
            <!--coupon code area end-->
        </form> 
    </div>     
</div>

 <!--shopping cart area end -->
 <br><br>
@endsection

@section('scripts')


    <script type="text/javascript">
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        // window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection