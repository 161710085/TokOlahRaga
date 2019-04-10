@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/barang') }}">Barang</a></li>
                    <li class="active">Foto Barang</li>
                </ul>
                <h2>Foto Barang</h2>
                <div class="panel-body">
                    <form action="{{ route('foto_barang.store', $barang->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label class="control-label">Pict</label>	
                            <input type="file" id="foto" name="foto[]" class="validate" accept="image/*" multiple>
                            @if ($errors->has('foto'))
                            <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('id_barang') ? 'has error' : '' }}">
                            <input type="hidden" name="id_barang" value="{{ $barang->id }}">
                            <!-- </select> -->
                            @if ($errors->has('id_barang'))
                            <span class="help-block">
                            <strong>{{ $errors->first('id_barang') }}</strong>
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