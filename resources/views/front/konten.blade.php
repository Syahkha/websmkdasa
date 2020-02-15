@extends('front.index')
@section('title')
Home
@endsection
@section('konten')
<section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            @foreach($setting as $data)
            <div class="single-hero-slide bg-img" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('source/banner/'.$data->banner)}}');">
            @endforeach
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                            @foreach($setting as $websetting)
                                <h2 data-animation="fadeInUp" data-delay="400ms">{{$websetting->webname}} <br>Kota {{$websetting->kota}}</h2>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->


=======

            <!-- Single Hero Slide -->
            <!-- <div class="single-hero-slide bg-img" style="background-image: url(front/img/bg-img/bg-2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 data-animation="fadeInUp" data-delay="100ms">All the courses you need</h4>
                                <h2 data-animation="fadeInUp" data-delay="400ms">Wellcome to our <br>Online University</h2>
                                <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-agenda-1"></i>
                                    <h5>Akreditasi A</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-assistance"></i>
                                    <h5>Biaya Terjangkau</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-telephone-3"></i>
                                    <h5>Fasilitas Lengkap</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->

<<<<<<< HEAD
<!-- ##### About Us Area Start ##### -->
<section class="about-us-area section-padding-100-0" id="profil" style="background-color: rgb(245, 247, 250) !important;">
    <div class="container" >
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span>Profil</span>
                    <h2>Tentang SMK Plus Darussalam</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                @foreach($setting as $data)
                <p>{{$data->profil}}</p>
                @endforeach
            </div>
            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                <h5>Program Studi</h5>
                @foreach($studi as $studi)
                <span>{{$studi->nama_jurusan}}</span><br>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
                    @foreach($galeri as $img)
                    <img src="{{asset('source/galeri/'.$img->nama_galeri)}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### About Us Area End ##### -->



<!-- ##### Top Popular Courses Area Start ##### -->
<div class="top-popular-courses-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span>Berita</span>
                    <h3>Info Terbaru</h3>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Single Top Popular Course -->
            @foreach($post as $p)
            <div class="col-12 col-lg-6">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp"
                    data-wow-delay="400ms">
                    <div class="popular-course-content">
                        <h5>{{$p->judul}}</h5>
                        <span>{{$p->name}} | {{$p->tanggal}}</span>

                        <p>{!!substr($p->artikel, 20,30)!!}...</p>
                        <a href="{{url('/detailartikel/'.$p->judul_url)}}" class="btn academy-btn btn-sm">Baca
                            Selengkapnya</a>
=======
    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
        <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3>Kompetensi Keahlian</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="course-icon">
                            <i class="icon-id-card"></i>
                        </div>
                        <div class="course-content">
                            <h4>Rekayasa Perangkat Lunak</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <div class="course-icon">
                            <i class="icon-worldwide"></i>
                        </div>
                        <div class="course-content">
                            <h4>Teknik Komputer Jaringan</h4>
                            <p>Lacinia, lacinia la cus non, fermen tum nisi.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="course-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="course-content">
                            <h4>Teknik Sepeda Motor</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="course-icon">
                            <i class="icon-id-card"></i>
                        </div>
                        <div class="course-content">
                            <h4>Multimedia</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
                    </div>
                    <div class="popular-course-thumb bg-img"
                        style="background-image: url({{asset('source/artikel'.'/'.$p->gambar)}});"></div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
<<<<<<< HEAD
</div>
<!-- ##### Top Popular Courses Area End ##### -->

=======
    <!-- ##### Course Area End ##### -->
@endsection
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa


    