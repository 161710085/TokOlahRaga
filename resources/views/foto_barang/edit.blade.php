@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data foto_barang 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('fotbar.update',$foto_barang->id) }}" method="post"  enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
                    <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Foto</label>
                                @if (isset($foto_barang) && $foto_barang->foto)
                                    <p>
                                        <br>
                                    <img src="{{ asset('assets/img/'.$foto_barang->foto) }}" style="width:250px; height:250px;" alt="">
                                    </p>
                                @endif
                                <input name="foto" type="file" value="{{ $foto_barang->foto }}">
                            </div>
                    <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">barang</label>
                                <select class="form-control" name="id_barang" required>
                                    @foreach($barang as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-outline-danger"> 
                                    <i class="fa  fa-exclamation-triangle fa-lg"></i>
                                    Batal
                                </button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection