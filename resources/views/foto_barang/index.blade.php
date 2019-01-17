@extends('layouts.admin')
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row m-t-30">
            <div class="col-md-12">
                <div class="m-b-10">
                    <a href="{{ route('fotbar.create') }}" >
                        <button type="button" data-toggle="modal"  class="btn btn-outline-danger">
                        <i class="fa fa-pencil-square-o"></i>    
                        Tambah Data
                    </button></a>
                    
                </div>
                <br><br><br>
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-border table-data3" border="2">
                        <thead>
                            <tr>
                            <th>Nama Barang</th>
                                <th>Foto</th>

                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <?php $nomor = 1; ?>
                                <?php $bebe = null ?>
                                @foreach($foto_barang as $data)
                                <td>
                                @if($bebe!=$data->barang->nama)
                                {{$data->barang->nama}}
                                <?php $bebe=$data->barang->nama?>
                                @endif
                                </td>
                                <td><img src="{{ asset('assets/img/'.$data->foto)  }}" style="height:125px;width:125px;margin-top:7px;"></td> 				    	
                                <td>
                                    <a class="btn btn-warning" href="{{ route('fotbar.edit',$data->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('fotbar.destroy',$data->id) }}">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE" >

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
        
    </div>
</div>

@endsection