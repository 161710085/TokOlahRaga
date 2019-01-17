@extends('layouts.admin')
@section('content')
<header class="page-header">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h1 class="separator">PRODUK</h1>
      <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
      </nav>
    </div>
  </div>
</header>
<section class="page-content container-fluid">
  <div class="card-deck m-b-30">
  <div class="card">
    <h5 class="card-header">
      <div class="col-20">
        <div class="card-body">
          <a href="javascript:history.go(-1)">
          <button class="btn btn-danger">
          Kembali Kehalaman Sebelumnya
          </button>
          </a>
          <h2 class="card-heading">
            <center>EDIT DATA PRODUK</center>
          </h2>
          <div class="modal-footer">
          </div>
          <form action="{{ route('kategori.update',$kategori->id) }}" class="form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group {{ $errors->has('a') ? ' has-error' : '' }}">
              <div class="form-group">
                <label>NAMA</label>
                <input value="{{$kategori->nama}}" type="text" class="form-control" autocomplete="name" name="nama" required>
           <!--      <div class="form-group {{ $errors->has('id_jenis') ? ' has-error' : '' }}">
              <label class="control-label"> Jenis</label> 
              <select name="id_jenis" class="form-controll">
                @foreach($jenis as $data)
                <option value="{{ $data->id }}" {{$selectjenis == $data->id ? 'selected="selected"':'' }} >{{ $data->jenis }}</option>
                @endforeach
              </select>
              @if ($errors->has('id_jenis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_jenis') }}</strong>
                            </span>
                        @endif
            </div> -->
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
              </div>
            </div>
          </form>
        </div>
    </h5>
    </div>
  </div>
</section>
@endsection