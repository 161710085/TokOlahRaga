@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/barang') }}">Barang</a></li>
                    <li class="active">Edit Barang</li>
                </ul>
                <h2>Edit Barang</h2>
                <div class="panel-body">
                    <form action="{{ route('barang.update',$barang->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                            <label class="control-label">Nama Barang</label>	
                            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}"  required>
                            @if ($errors->has('nama_barang'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nama_barang') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label class="control-label">Deskripsi</label>	
                            <textarea name="deskripsi" class="form-control"> {!! $barang->deskripsi !!} </textarea>
                            @if ($errors->has('deskripsi'))
                            <span class="help-block">
                            <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
                            <label class="control-label">Harga</label>	
                            <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}"  required>
                            @if ($errors->has('harga'))
                            <span class="help-block">
                            <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label class="control-label">Stock</label>	
                            <input type="number" name="stock" class="form-control" value="{{ $barang->stock }}"  required>
                            @if ($errors->has('stock'))
                            <span class="help-block">
                            <strong>{{ $errors->first('stock') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('id_jenis') ? ' has-error' : '' }}">
                            <label class="control-label">Olahraga</label>	
                            <select name="id_jenis" class="js-example-basic-single" style = width:100%>
                            @foreach($jenis as $data)
                            <option value="{{ $data->id }}"  {{ $jenisselect == $data->id ? 'selected="selected"' : '' }}>{{ $data->nama_olahraga }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('id_jenis'))
                            <span class="help-block">
                            <strong>{{ $errors->first('id_jenis') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('id_merk') ? ' has-error' : '' }}">
                            <label class="control-label">Merk</label>	
                            <select name="id_merk" class="js-example-basic-single" style = width:100%>
                            @foreach($merk as $data)
                            <option value="{{ $data->id }}"  {{ $merkselect == $data->id ? 'selected="selected"' : '' }}>{{ $data->nama_merk }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('id_merk'))
                            <span class="help-block">
                            <strong>{{ $errors->first('id_merk') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('id_kategori') ? ' has-error' : '' }}">
                            <label class="control-label">kategori</label>	
                            <select name="id_kategori" class="js-example-basic-single" style = width:100%>
                            @foreach($kategori as $data)
                            <option value="{{ $data->id }}"  {{ $kategoriselect == $data->id ? 'selected="selected"' : '' }}>{{ $data->nama_kategori }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('id_kategori'))
                            <span class="help-block">
                            <strong>{{ $errors->first('id_kategori') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>&nbsp;Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection