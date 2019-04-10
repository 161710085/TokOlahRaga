@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/merk') }}">Merk</a></li>
                    <li class="active">Edit Merk</li>
                </ul>
                <h2>Edit Merk</h2>
                <div class="panel-body">
                    <form action="{{ route('merk.update',$merk->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_merk') ? ' has-error' : '' }}">
                            <label class="control-label">Nama Merk</label>	
                            <input type="text" name="nama_merk" class="form-control" value="{{ $merk->nama_merk }}"  required>
                            @if ($errors->has('nama_merk'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nama_merk') }}</strong>
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