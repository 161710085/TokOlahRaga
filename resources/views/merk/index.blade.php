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
      <br>
      <h2 class="card-heading">
        <center>TABEL DATA PRODUK</center>

      </h2>
      <h5 class="card-header">
        <div class="col-20">
          <a href="{{route('merk.create')}}">
          <button type="button" class="btn btn-primary btn-rounded btn-floating btn-outline" data-toggle="modal" data-target="#exampleModal">
          TAMBAH
          </button>
          </a>
          <!-- <a class="btn btn-primary btn-rounded btn-floating btn-outline" href="{{ url('/admin/export/barang') }}">Export</a> -->                   
        </div>
      </h5>
      <div class="card-body">
        <div class="table-responsive">
          {!! $html->table(['class'=>'table table-bordered-responsive']) !!}
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
</div>

<script type="text/javascript">
  (function(document) {
  'use strict';
  
  var LightTableFilter = (function(Arr) {
  
  var _input;
  
  function _onInputEvent(e) {
   _input = e.target;
   var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
   Arr.forEach.call(tables, function(table) {
    Arr.forEach.call(table.tBodies, function(tbody) {
     Arr.forEach.call(tbody.rows, _filter);
    });
   });
  }
  
  function _filter(row) {
   var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
   row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
  }
  
  return {
   init: function() {
    var inputs = document.getElementsByClassName('light-table-filter');
    Arr.forEach.call(inputs, function(input) {
     input.oninput = _onInputEvent;
    });
   }
  };
  })(Array.prototype);
  
  document.addEventListener('readystatechange', function() {
  if (document.readyState === 'complete') {
   LightTableFilter.init();
  }
  });
  
  })(document);
  
  
  Sumber : http://jintoples.blogspot.com/2014/08/cara-membuat-tabel-search-dengan.html#ixzz5SHrnhR7t 
  Follow us: @jin_toples on Twitter | JinToplesBlogger on Facebook
</script>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection