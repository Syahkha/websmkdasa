    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-pen"></i>
                <span>Siswa Menulis</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{url('tulis')}}">Tulis Baru</a>
                <a class="dropdown-item" href="{{url('data-tulis')}}">Data Penulisan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="false" aria-expanded="true">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Siswa</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start"
                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 63px, 0px);">
                <a class="dropdown-item" href="{{url('input-siswa')}}">Input Siswa</a>
                <a class="dropdown-item" href="{{url('data-siswa')}}">Data Siswa</a>
                <a class="dropdown-item" href="{{url('data-siswi')}}">Data siswi</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="false" aria-expanded="true">
                <i class="fas fa-fw fa-address-card"></i>
                <span>PPDB</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start"
                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 63px, 0px);">
                <a class="dropdown-item" href="{{url('daftar')}}">Daftar Siswa</a>
                <a class="dropdown-item" href="{{url('ppdb-siswa')}}">PPDB Siswa</a>
                <a class="dropdown-item" href="{{url('ppdb-siswi')}}">PPDB siswi</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('data-user')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('setweb')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Setting Web</span>
            </a>
        </li>
    </ul>
    <!-- end sidebar -->
