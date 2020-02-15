@extends('front.index')
@section('title')
Blog
@endsection
@section('konten')
@foreach($setting as $data)
<div class="breadcumb-area bg-img" style="background-image: url({{asset('source/banner/'.$data->banner)}});">
    @endforeach
    <div class="bradcumbContent">
        <h2>ARTIKEL</h2>
    </div>
</div>
<div class="blog-area mt-50 section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="academy-blog-posts">
                    <div class="row">
                        @if (count($artikel) > 0)
                        @foreach($artikel as $data)
                        <div class="col-12">
                            <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms"
                                style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                <p>Hasil Pencarian "<b>{{$cari}}</b>"</p>
                                <!-- Post Thumb -->
                                <div class="blog-post-thumb mb-50">
                                    <img src="{{asset('source/artikel/'.$data->gambar)}}" alt="">
                                </div>
                                <!-- Post Title -->
                                <a href="#" class="post-title">{{$data->judul}}</a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p>Penulis : <a href="#">{{$data->name}}</a> | <a href="#">{{$data->tanggal}}</a> </p>
                                </div>
                                <!-- Post Excerpt -->
                                <p>{!!substr($data->artikel, 0, 750)!!}...</p>
                                <!-- Read More btn -->
                                <a href="{{url('/'.$data->judul_url)}}"
                                    class="btn academy-btn btn-sm mt-15">Baca Selengkapnya</a>
                            </div>
                        </div>
                        @endforeach
                        @else 
                    Artikel " <u> {{$cari}} </u> " tidak ditemukan!
		@endif
                    </div>
                </div>
                <!-- Pagination Area Start -->
                <div class="academy-pagination-area wow fadeInUp" data-wow-delay="400ms"
                    style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <nav>
                        <ul class="pagination">
                            {{-- <li class="page-item active">{{ $artikel->links() }}</li> --}}
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="academy-blog-sidebar">
                    <!-- Blog Post Widget -->
                    <div class="blog-post-search-widget mb-30">
                        <form action="/cariartikel" method="get">
                            <input type="search" name="cari" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <!-- Blog Post Catagories -->
                    <div class="blog-post-categories mb-30">
                        <h5>Categories</h5>
                        <ul>
                            @foreach($kategori as $k)
                            <li><a href="{{url('/blog/'.$k->id)}}">{{$k->kategori}}</a></li>
                            @endforeach
                        </ul>   
                    </div>

                    <!-- Latest Blog Posts Area -->
                    <div class="latest-blog-posts mb-30">
                        <h5>Baca Juga</h5>
                        <!-- Single Latest Blog Post -->
                        @foreach ($bacajuga as $item)
                        <div class="single-latest-blog-post d-flex mb-30">

                            <div class="latest-blog-post-thumb">
                                <img src="{{asset('source/artikel/'.$item->gambar)}}" alt="">
                            </div>
                            <div class="latest-blog-post-content">
                                <a href="#" class="post-title">
                                    <h6>{!!substr($item->judul, 0, 15)!!}...</h6>
                                </a>
                                <a href="#" class="post-date">{{ $item->tanggal }}</a>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <!-- Add Widget -->
                    <div class="add-widget">
                        <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
