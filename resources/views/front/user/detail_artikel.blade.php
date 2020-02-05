@extends('front.index')
@section('title')
Blog
@endsection
@section('konten')
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach($artikel as $data)
                            <div class="blog">
                                <div class="blog-img">
                                    <img class="img-responsive" src="{{asset('source/artikel/'.$data->gambar)}}" alt="">
                                </div>
                                <div class="blog-content">
                                    @php
                                        $tgl = explode(' ',$data->tanggal);
                                    @endphp
                                    <ul class="post-meta"><br>
                                        <p>Penulis <a href="#">{{$data->name}}</a> | <a href="#">{{$data->tanggal}}</a> </p>
                                    </ul>
                                    <h3>{{$data->judul}}</h3>
                                    {!!$data->artikel!!}
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>


               
            </div>
            <div class="col-12 col-md-4">
                <div class="academy-blog-sidebar">
                    <!-- Blog Post Widget -->
                    <div class="blog-post-search-widget mb-30">
                        <form action="#" method="post">
                            <input type="search" name="search" id="Search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

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
                        <h5>Baca Juga</h5>
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

                    <!-- Add Widget -->
                    <div class="add-widget">
                        <a href="#"><img src="img/blog-img/add.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection