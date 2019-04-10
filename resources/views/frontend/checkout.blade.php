@extends('frontend.index')
@section('conten')
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">


                        <div class="cart-page-heading">
                            <h5>Alamat Pengiriman</h5>
                        </div>

                        <form action="{{ url('checkout/'.Auth()->user()->id) }}" method="post" enctype="multipart/form-data" >
                              {{ csrf_field() }}
                              	<input type="hidden" name="chart" value="{{$cart}}">
                          <div class="row">
                                <div class="col-12 mb-20 form-group {{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
						  			<label class="control-label">Nama Lengkap <span>*</span></label>	
						  			<input type="text" name="nama_lengkap" class="form-control"  required>
						  			@if ($errors->has('nama_lengkap'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('nama_lengkap') }}</strong>
			                            </span>
			                        @endif
						  		</div>                                
                                <div class="col-6 mb-20 form-group {{ $errors->has('nomer_telepon') ? ' has-error' : '' }}">
						  			<label class="control-label">Nomor Telepon <span>*</span></label>	
						  			<input type="text" name="nomer_telepon" class="form-control"  required>
						  			@if ($errors->has('nomer_telepon'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('nomer_telepon') }}</strong>
			                            </span>
			                        @endif
						  		</div> 
                                <div class="col-6 mb-20 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						  			<label class="control-label">Alamat Email <span>*</span></label>	
						  			<input type="email" name="email" class="form-control"  required>
						  			@if ($errors->has('email'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('email') }}</strong>
			                            </span>
			                        @endif
						  		</div>                                
                                <div class="col-12 mb-20 form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
						  			<label class="control-label">Alamat Lengkap<span>*</span></label>	
						  			<input type="text" name="alamat" class="form-control"  required>
						  			@if ($errors->has('alamat'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('alamat') }}</strong>
			                            </span>
			                        @endif
						  		</div>
                                <div class="col-12 mb-20 form-group {{ $errors->has('provinsi') ? ' has-error' : '' }}">
						  			<label class="control-label">Provinsi <span>*</span></label>	
						  			<input type="text" name="provinsi" class="form-control"  required>
						  			@if ($errors->has('provinsi'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('provinsi') }}</strong>
			                            </span>
			                        @endif
						  		</div>
                                <div class="col-12 mb-20 form-group {{ $errors->has('kab_kot') ? ' has-error' : '' }}">
						  			<label class="control-label">Kabupaten / Kota <span>*</span></label>	
						  			<input type="text" name="kab_kot" class="form-control"  required>
						  			@if ($errors->has('kab_kot'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('kab_kot') }}</strong>
			                            </span>
			                        @endif
						  		</div>
                                <div class="col-12 mb-20 form-group {{ $errors->has('kecamatan') ? ' has-error' : '' }}">
						  			<label class="control-label">Kecamatan <span>*</span></label>	
						  			<input type="text" name="kecamatan" class="form-control"  required>
						  			@if ($errors->has('kecamatan'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('kecamatan') }}</strong>
			                            </span>
			                        @endif
						  		</div>                                     
                            </div>
                            <div class="payment_method">          
                            @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif                     
                                <div class="order_button">
                                
                                    <button  type="submit" class="btn essence-btn">Selesai</button> 
                                </div>    
                            </div>
                        </form>    
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Pesanan Anda</h5>
                            <p>The Details</p>
                        </div>

                        <div class="order_table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Total</th>
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
                                        <tr>
                                            <td> {{ $data->barang->nama_barang }} <strong> × {{ $data->quantity }}</strong></td>
                                            <td> Rp. {{number_format($data->quantity * $data->barang->harga,2,',','.')}}</td>
                                        </tr>                                        
                                    </tbody>
                                    @endforeach
                                    <tfoot>                                        
                                        <tr class="order_total">
                                            <th>Total Pemesanan</th>
                                            <td><strong>Rp. {{ number_format($total_all,2,',','.') }}</strong></td>
                                        </tr>
                                    </tfoot>                                    
                                </table>     
                            </div>
                            <div class="payment_method">                                
                                <div class="panel-default">                                     
                                    <div class="card-body1">
                                        <center><h3>PEMBAYARAN</h3></center>
                                        <center><marquee behavior="alternate">
                                            <img src="{{ asset('fe/img/payment.png') }}" style="wdith:100px ; height:100px">
                                            <img src="{{ asset('fe/img/payment.png') }}" style="wdith:100px ; height:100px">
                                            <img src="{{ asset('fe/img/payment.png') }}" style="wdith:100px ; height:100px">
                                            <img src="{{ asset('fe/img/payment.png') }}" style="wdith:100px ; height:100px">                                            
                                        </marquee></center>
                                        <p>Untuk Melakukan Pembayaran, Silahkan Transfer Pada Rekening <br><b>BNI:12345678910 a/n Kopo Sport</b> <br> Dengan Jumlah <b>Rp. {{ number_format($total_all,2,',','.') }}</b>
                                            <br>Jika Sudah Melakukan Pembayaran Mohon Photo Bukti Transfer Lalu Masukan Pada Form yang telah di sediakan pada <b>{{ Auth::user()->name }} > Bukti Transfer</b>
                                            <br><br><center>Terima Kasih.</center>
                                        </p> 
                                    </div>                                     
                                </div>                                     
                            </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
 
    <!-- ##### Footer Area End ##### -->

   @endsection