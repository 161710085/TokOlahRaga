@extends('frontend.index')
@section('conten')


    <div class="single-blog-wrapper">

        <!-- Single Blog Post Thumb -->
        <div class="single-blog-post-thumb">
        @foreach ($berita->get() as $data)
            <img src=" ../img/berita/{{$data->foto}}" style="width:2000px ; height: auto " alt="">
        </div>

        <!-- Single Blog Content Wrap -->
        <div class="single-blog-content-wrapper d-flex">

            <!-- Blog Content -->
            <div class="single-blog--text">
            <blockquote>
                    <h6><i class="fa fa-quote-left" aria-hidden="true"></i>{{ $data->created_at->Format('d M Y') }}</h6>
                    <span class="author"><i class="fa fa-user-circle"></i> Dikirim Oleh : Admin</span>   
                </blockquote>
        <h2>{{ $berita->judul }}</h2>
                

                <p>{!!$berita->isi!!}</p>
            </div>
@endforeach
            <!-- Related Blog Post -->
            <div class="related-blog-post">
                <!-- Single Related Blog Post -->
                <div class="single-related-blog-post">
                    <img src="{{asset('fe/img/bg-img/rp1.jpg')}}" alt="">
                    <a href="#">
                        <h5>Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper massa</h5>
                    </a>
                </div>
                <!-- Single Related Blog Post -->
                <div class="single-related-blog-post">
                    <img src="{{asset('fe/img/bg-img/rp2.jpg')}}" alt="">
                    <a href="#">
                        <h5>Fusce tincidunt nulla magna, ac euismod quam viverra id. Fusce eget metus feugiat</h5>
                    </a>
                </div>
                <!-- Single Related Blog Post -->
                <div class="single-related-blog-post">
                    <img src="{{asset('fe/img/bg-img/rp3.jpg')}}" alt="">
                    <a href="#">
                        <h5>Etiam leo nibh, consectetur nec orci et, tempus tempus ex</h5>
                    </a>
                </div>
                <!-- Single Related Blog Post -->
                <div class="single-related-blog-post">
                    <img src="{{asset('fe/img/bg-img/rp4.jpg')}}" alt="">
                    <a href="#">
                        <h5>Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</h5>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

  @endsection