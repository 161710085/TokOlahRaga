@extends('frontend.index')
@section('conten')

    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area breadcumb-style-two bg-img" style="background-image: url({{asset('fe/img/bg-img/breadcumb2.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Fashion Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
               
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                    @foreach ($berita as $data)
                        <img src=" ../img/berita/{{$data->foto}}" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="#">{{$data->judul}}</a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="#">{{$data->judul}}</a>
                            </div>
                            <p>{!! substr($data['isi'] ,0,150) !!} .... </p>
                            <a href="/singleblog/{{$data->slug}}">Baca Selengkapnya <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
         
            </div>
        </div>
    </div>
@endsection