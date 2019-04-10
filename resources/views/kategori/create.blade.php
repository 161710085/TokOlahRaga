@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                    <li class="active">Tambah Kategori</li>
                </ul>
                <h2>Tambah Kategori</h2>
                <div class="panel-body">
                    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_kategori') ? ' has-error' : '' }}">
                            <label class="control-label">Nama Kategori</label>	
                            <input type="text" name="nama_kategori" class="form-control"  required>
                            @if ($errors->has('nama_kategori'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nama_kategori') }}</strong>
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