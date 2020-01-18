<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">SMK Darussalam</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sm_base" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-fw fa-edit"></i>
          <span>Siswa Menulis</span>
        </a>
        <div id="sm_base" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{url('tulis')}}">Tulis Baru</a>
            <a class="collapse-item" href="{{url('data-tulis')}}">Data Penulisan</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sm_santri" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Siswa</span>
        </a>
        <div id="sm_santri" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{url('input-siswa')}}">Input Siswa</a>
            <a class="collapse-item" href="{{url('data-siswa')}}">Data Siswa Putra</a>
            <a class="collapse-item" href="{{url('data-siswi')}}">Data Siswa Putri</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sm_psb" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>PPDB</span>
        </a>
        <div id="sm_psb" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{url('daftar')}}">Daftarkan Siswa</a>
            <a class="collapse-item" href="{{url('ppdb-siswa')}}">Data PSB Siswa Putra</a>
            <a class="collapse-item" href="{{url('ppdb-siswi')}}">Data PSB Siswa Putri</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('data-user')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Akun</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('setweb')}}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setting Web</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>