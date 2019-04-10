@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="panel" style="padding : 20px">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li class="active">Edit Berita</li>
                </ul>
                <h2>Edit Berita</h2>
                <div class="panel-body">
                    <form action="{{ route('berita.update',$berita->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label class="control-label">Judul</label>	
                            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}"  required>
                            @if ($errors->has('judul'))
                            <span class="help-block">
                            <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
                            <label class="control-label">Isi Berita</label>	
                            <textarea name="isi" class="form-control"> {!! $berita->isi !!} </textarea>
                            @if ($errors->has('isi'))
                            <span class="help-block">
                            <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                            @endif
                        </div>
                        @if (isset($berita) && $berita->foto)
                        <p>
                            {!! Html::image(asset('img/berita/'.$berita->foto), null, ['class'=>'img-rounded img-responsive', 'style'=>'width:300px']) !!}
                        </p>
                        @endif
                        <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label class="control-label">Sampul</label>	
                            <input type="file" id="foto" name="foto" class="validate" accept="image/*" value="{{ $berita->foto }}">
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