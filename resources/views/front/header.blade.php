<header class="header-area">

<!-- Top Header Area -->
<div class="top-header">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <div class="header-content h-100 d-flex align-items-center justify-content-between">
                    <div class="academy-logo">
                    @foreach($setting as $data)
                        <a href="index.html"><img src="{{asset('source/logo/'.$data->logo)}}"  width="200px" alt="logo"></a>
                    @endforeach
                    </div>
                    <div class="login-content">
                        <a href="{{url('login')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar Area -->
<div class="academy-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="academyNav">

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="cn-dropdown-item has-down pr12"><a href="#">Profil</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Galeri</a></li>
                                        </ul>
                                    <span class="dd-trigger"></span><span class="dd-arrow"></span></li>
                            <li><a href="">PPDB</a></li>
                            <li><a href="{{url('tampilblog')}}">Berita</a></li>

                            @foreach($menu as $m)
                            <li class="cn-dropdown-item has-down pr12"><a href="#">{{$m->kategori}}</a>
                                        
                                        <ul class="dropdown">
                                            @foreach($m->sub_kategori as $s)
                                            <li><a href="">{{$s->sub_kategori}}</a></li>
                                            @endforeach
                                        </ul>
                                    <span class="dd-trigger"></span><span class="dd-arrow"></span>
                            </li>
                            @endforeach
                            <li><a href="#">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>

                <!-- Calling Info -->
                <div class="calling-info">
                    <div class="call-center">
                        <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568 889</span></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>