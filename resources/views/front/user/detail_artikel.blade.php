@extends('front.index')
@section('title')
Blog
@endsection
@section('konten')
@foreach($setting as $data)
<div class="breadcumb-area bg-img" style="background-image: url({{asset('source/banner/'.$data->banner)}});">
    @endforeach
</div>
    <div class="blog-area mt-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach($artikel as $data)
                            <div class="single-blog-post">
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
                                <a href="{{url('tampilblog')}}" class="btn academy-btn btn-sm mt-15">Kembali</a>
                            </div>
                            @endforeach
                        </div>
                        
                    </div><br>
            </div>
        </div>
    </div>
@endsection