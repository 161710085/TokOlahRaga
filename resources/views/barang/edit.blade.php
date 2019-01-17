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
          <button class="btn btn-warning">
          Kembali Kehalaman Sebelumnya
          </button>
          </a>
          <h2 class="card-heading">
            <center>EDIT DATA PRODUK</center>
          </h2>
          <div class="modal-footer">
          </div>
          <form action="{{ route('barang.update',$barang->id) }}" class="form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
              <div class="form-group">
                <label>NAMA</label>
                <input value="{{$barang->nama}}" type="text" class="form-control" autocomplete="name" name="nama" required>
              </div>
              <div class="form-group {{ $errors->has('id_kategori') ? 'has error' : '' }}">
                <label class="control-label">Kategori</label>
                <select name="id_kategori" class="js-selectize">
                  @foreach($kategori as $data)
                  <option value="{{ $data->id }}">{{ $selectedkategori == $data->id ? '' : '' }} {{ $data->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('kategori'))
                <span class="help-block">
                <strong>{{ $errors->first('kategori') }}</strong>
                </span>
                @endif
              </div>


              <div class="form-group {{ $errors->has('id_merk') ? 'has error' : '' }}">
                <label class="control-label">Merk</label>
                <select name="id_merk" class="js-selectize">
                  @foreach($merk as $data)
                  <option value="{{ $data->id }}">{{ $selectedmerk == $data->id ? '' : '' }} {{ $data->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('merk'))
                <span class="help-block">
                <strong>{{ $errors->first('merk') }}</strong>
                </span>
                @endif
              </div>


              <div class="form-group {{ $errors->has('id_jenis') ? 'has error' : '' }}">
                <label class="control-label">Jenis</label>
                <select name="id_jenis" class="js-selectize">
                  @foreach($jenis as $data)
                  <option value="{{ $data->id }}">{{ $selectedjenis == $data->id ? '' : '' }} {{ $data->nama }}</option>
                  @endforeach
                </select>
                @if ($errors->has('jenis'))
                <span class="help-block">
                <strong>{{ $errors->first('jenis') }}</strong>
                </span>
                @endif
              </div>


              <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                <label class="control-label">DESKRIPSI</label> 
                <textarea  placeholder="Masukan Deskripsi" class="form-control" name="deskripsi">{{$barang->deskripsi}}</textarea>
                @if ($errors->has('deskripsi'))
                <span class="help-block">
                <strong>{{ $errors->first('deskripsi') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('size') ? ' has-error' : '' }}">
              <div class="form-group">
                <label>Size</label>
                <input value="{{$barang->size}}" type="number" class="form-control" autocomplete="name" name="size" required>
              </div>
              <div class="form-group">
                <label>HARGA</label>
                <input value="{{$barang->harga}}" type="number" class="form-control" autocomplete="name" name="harga" required>
              </div>
              <div class="form-group">
                <label>STOCK</label>
                <input value="{{$barang->stok}}" type="number" class="form-control" autocomplete="name" name="stok" required>
              </div>
              
              @if ($errors->has('a'))
              <span class="help-block">
              <strong>{{ $errors->first('a') }}</strong>
              </span>
              @endif
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