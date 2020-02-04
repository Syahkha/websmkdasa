@extends('front.index')
@section('title')
Home
@endsection
@section('konten')
<section class="hero-area">
    <div class="hero-slides owl-carousel">

        <!-- Single Hero Slide -->
        @foreach($setting as $data)
        <div class="single-hero-slide bg-img"
            style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('source/banner/'.$data->banner)}}');">
            @endforeach
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            @foreach($setting as $websetting)
                            <h2 data-animation="fadeInUp" data-delay="400ms">{{$websetting->webname}} <br>Kota
                                {{$websetting->kota}}</h2>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                <i class="icon-contract"></i>
                                <h5>Akreditasi A</h5>
                            </div>
                        </div>
                        <!-- Single Top Features -->
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-like"></i>
                                <h5>Biaya Terjangkau</h5>
                            </div>
                        </div>
                        <!-- Single Top Features -->
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-message"></i>
                                <h5>Beasiswa</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Top Feature Area End ##### -->


 <!-- ##### About Us Area Start ##### -->
 <section class="about-us-area mt-50 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                      <span>Profil</span>
                        <h3>Tentang SMK Plus Darussalam</h3>
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
                    <p>Vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum. Cras vulputate metus id felis ornare hendrerit. Maecenas sodales suscipit ipsum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
                        <img src="{{asset('front/img/bg-img/bg-3.jpg')}}" alt="">
                        <img src="{{asset('front/img/bg-img/bg-2.jpg')}}" alt="">
                        <img src="{{asset('front/img/bg-img/bg-1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->


<!-- ##### Course Area Start ##### -->
<div class="academy-courses-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Course Area -->
            <div class="col-12 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100">
                    <div class="course-icon">
                        <i class="icon-id-card"></i>
                    </div>
                    <div class="course-content">
                        <h4>PPDB Online</h4>
                        <p>Segera daftar melalui PPDB Online.</p>
                    </div>
                </div>
            </div>
            <!-- Single Course Area -->
            <div class="col-12 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100">
                    <div class="course-icon">
                        <i class="icon-wall-clock"></i>
                    </div>
                    <div class="course-content">
                        <h4>Berita</h4>
                        <p>Ikuti berita terbaru dari kami.</p>
                    </div>
                </div>
            </div>
            <!-- Single Course Area -->
            <div class="col-12 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100">
                    <div class="course-icon">
                        <i class="icon-agenda-1"></i>
                    </div>
                    <div class="course-content">
                        <h4>Kegiatan</h4>
                        <p>Kegiatan siswa/siswi smk plus darussalam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Course Area End ##### -->


@endsection