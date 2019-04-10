@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/olahraga') }}">Olahraga</a></li>
                    <li class="active">Tambah Olahraga</li>
                </ul>
                <h2>Tambah Olahraga</h2>
                <div class="panel-body">
                    <form action="{{ route('jenis.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_olahraga') ? ' has-error' : '' }}">
                            <label class="control-label">Nama Olahraga</label>	
                            <input type="text" name="nama_olahraga" class="form-control"  required>
                            @if ($errors->has('nama_olahraga'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nama_olahraga') }}</strong>
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