@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li class="active">Tambah Berita</li>
                </ul>
                <h2>Tambah Berita</h2>
                <div class="panel-body">
                    <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label class="control-label">Judul</label>	
                            <input type="text" name="judul" class="form-control"  required>
                            @if ($errors->has('judul'))
                            <span class="help-block">
                            <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('isi') ? 'has error' : ''}} ">
                            <label class="control-label">Isi Berita</label>
                            <textarea name="isi" id="isi" class="form-control"></textarea>
                            @if ($errors->has('isi'))
                            <span class="help-block">
                            <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label class="control-label">Sampul</label>	
                            <input type="file" id="foto" name="foto" class="validate" accept="image/*" required>
                            @if ($errors->has('foto'))
                            <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
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