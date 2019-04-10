@extends('layouts.admin')
@section('content')
<div class="panel" style="padding : 20px">
    <p><a class="btn btn-success" href="{{ route('berita.create') }}">Tambah</a> </p>
    <br>
    {!! $html->table(['class'=>'table table-striped table-bordered']) !!}
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection