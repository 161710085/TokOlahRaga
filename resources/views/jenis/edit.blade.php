@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/olahraga') }}">Olahraga</a></li>
                    <li class="active">Edit Olahraga</li>
                </ul>
                <h2>Edit Olahraga</h2>
                <div class="panel-body">
                    <form action="{{ route('jenis.update',$jenis->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_olahraga') ? ' has-error' : '' }}">
                            <label class="control-label">Nama Olahraga</label>	
                            <input type="text" name="nama_olahraga" class="form-control" value="{{ $jenis->nama_olahraga }}"  required>
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