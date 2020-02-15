@extends('front.index')
@section('title')
Blog
@endsection
@section('konten')
<<<<<<< HEAD
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
                        @foreach($artikel as $data)
                        <div class="col-12">
                            <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms"
                                style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                <!-- Post Thumb -->
                                <div class="blog-post-thumb mb-50">
                                    <img src="{{asset('source/artikel/'.$data->gambar)}}" alt="">
                                </div>
                                <!-- Post Title -->
                                <a href="#" class="post-title">{{$data->judul}}</a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p>Penulis : <a href="#">{{$data->name}}</a> | <a href="#">{{$data->tanggal}}</a> </p>
=======
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>The News</h2>
        </div>
    </div>
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">

                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="img/blog-img/1.jpg" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">Top ten courses we love for you to try</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>By <a href="#">Simon Smith</a> | <a href="#">March 18, 2018</a> | <a href="#">3 comments</a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est.</p>
                                    <!-- Read More btn -->
                                    <a href="#" class="btn academy-btn btn-sm mt-15">Read More</a>
                                </div>
                            </div>
                            @foreach($artikel as $data)
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="{{asset('source/'.$data->gambar)}}"  alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title">{{$data->judul}}</a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>Penulis <a href="#">{{$data->name}}</a> | <a href="#">{{$data->tanggal}}</a> </p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p>{!!substr($data->artikel, 0, 170)!!}...</p>
                                    <!-- Read More btn -->
                                    <a href="#" class="btn academy-btn btn-sm mt-15">Baca Selengkapnya</a>
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
                                </div>
                                <!-- Post Excerpt -->
                                <p>{!!substr($data->artikel, 0, 750)!!}...</p>
                                <!-- Read More btn -->
                                <a href="{{url('/'.$data->judul_url)}}"
                                    class="btn academy-btn btn-sm mt-15">Baca Selengkapnya</a>
                            </div>
<<<<<<< HEAD
=======
                            @endforeach

>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Pagination Area Start -->
                <div class="academy-pagination-area wow fadeInUp" data-wow-delay="400ms"
                    style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item active">{{ $artikel->links() }}</li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="academy-blog-sidebar">
                    <!-- Blog Post Widget -->
                    <div class="blog-post-search-widget mb-30">
                        <form action="/cariartikel" method="get">
                            <input type="text" name="cari" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

<<<<<<< HEAD
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
=======
                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Categories</h5>
                            <ul>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Teachers</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-1.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-2.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>A great way to start</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-3.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-4.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Start your training</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                        </div>
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa

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
