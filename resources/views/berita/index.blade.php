@extends('layouts.admin')
@section('content')

<div class="row">
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Data berita
          <div class="panel-title pull-right"><a href="{{ route('berita.create') }}">Tambah</a>
          </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
            <th>Judul</th>
            <th>Artikel</th>
            <th colspan="2">Option</th>
            </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($berita as $data)
              <tr>
                <td>{{ $no++ }}</td>
                  <td><img src="{{ asset('assets/img/'.$data->foto)  }}" style="height:125px;width:125px;margin-top:7px;"></td> 
              <td>{{ $data->judul }}</td>
              <td>{!! str_limit($data->artikel,50)!!}</td>
              <td>
            <a class="btn btn-warning" href="{{ route('berita.edit',$data->id) }}">Edit</a>
            </td>
            <td>
              <form method="post" action="{{ route('berita.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
              </tr>
              @endforeach 
            </tbody>
          </table>
        </div>
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection