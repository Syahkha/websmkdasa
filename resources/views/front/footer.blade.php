
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area" id="footer">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                            @foreach($setting as $data)
                                <a href="#"><img src="{{asset('source/icon/'.$data->icon)}}" width="100px" alt=""></a>
                                @endforeach
                            </div>
                            @foreach($setting as $data)
                            <p>{{$data->profil}}</p>
                            @endforeach
                            <div class="footer-social-info">
<<<<<<< HEAD
                                <a href="https://{{$data->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="https://{{$data->instagram}}"><i class="fa fa-instagram"></i></a>
                                <a href="https://{{$data->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a href="https://{{$data->youtube}}"><i class="fa fa-youtube"></i></a>
=======
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
                            </div>
                        </div>
                    </div>
                    
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact</h6>
                            </div>
                            @foreach($setting as $websetting)
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>{{$websetting->alamat}} <br> Kota {{$websetting->kota}} </p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>KONTAK 1: {{$websetting->kontak1}}  <br>KONTAK 2: {{$websetting->kontak2}} </p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>{{$websetting->email}} </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->