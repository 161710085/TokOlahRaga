@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/foto_barang') }}">Foto Barang</a></li>
                    <li class="active">Edit Foto Barang</li>
                </ul>
                <h2>Edit Foto Barang</h2>
                <div class="panel-body">
                    <form action="{{ route('foto_barang.update',$foto_barang->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label class="control-label">Pict</label>	
                            <input type="file" id="foto" name="foto" class="validate" accept="image/*" value="{{ $foto_barang->foto }}"  required>
                            @if ($errors->has('foto'))
                            <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('id_barang') ? ' has-error' : '' }}">
                            <label class="control-label">Barang</label>	
                            <select name="id_barang" class="js-example-basic-single" style="width:100%">
                            @foreach($barang as $data)
                            <option value="{{ $data->id }}"  {{ $barangselect == $data->id ? 'selected="selected"' : '' }}>{{ $data->nama_barang }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('id_barang'))
                            <span class="help-block">
                            <strong>{{ $errors->first('id_barang') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection