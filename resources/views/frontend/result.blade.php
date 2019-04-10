@extends('frontend.index')
@section('content')
<br>
<div class="shop_wrapper">
    <div class="container">
        <div class="row">
            <center>
            <div class="col-lg-9 col-md-12">
                <!--shop tab product-->
                <div class="shop_tab_product">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="large" role="tabpanel">
                            <div class="row">
                                @if (count($barang) > 0)
                                @foreach ($barang as $item)                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_product">
                                        @foreach($item->foto_barang as $data_foto)
                                        @if ($loop->first)
                                        <div class="product_thumb">
                                            <a href="{{ url('product', $item->slug) }}"><img src="{{ asset('/img/foto_barang/'.$data_foto->foto) }}" style="height:250px;width:250px" alt=""></a>
                                        </div>
                                        @endif                                
                                        @endforeach 
                                        <div class="product_content">
                                            <h3><a href="{{ url('product', $item->slug) }}">{{ $item->nama_barang }}</a></h3>
                                            <div class="product_price">
                                                <span class="current_price">Rp. {{ number_format($item->harga) }},-</span>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach                            
                                @else 
                                <h3>
                                    <b>
                                        <i>
                                            <center>Mohon Maaf barang Tidak Ada.</center>
                                        </i>
                                    </b>
                                </h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>                
                <!--shop tab product end-->
                <!--pagination style start--> 
                <div class="panel pull-right">
                    {{ $barang->links() }}
                </div>
                <!--pagination style end--> 
            </div>            
            </center>
        </div>
    </div>
</div>
@endsection