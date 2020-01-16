
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMK PLUS DARUSSALAM @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('user/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('user/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('admin/css/bootadmin.min.css')}}">

</head>
<body id="page-top">    
      @include('layouts.header')   
      <div id="wrapper">
      @include('layouts.navbar')
      <div id="content-wrapper">
      
        @yield('konten')
        
      </div>
    </div>
    <script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <!-- <script src="{{asset('user/vendor/chart.js/Chart.min.js')}}"></script> -->
    <script src="{{asset('user/vendor/datatables/jquery.dataTables.js')}}"></script>
    <!-- <script src="{{asset('user/vendor/datatables/dataTables.bootstrap4.js')}}"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="{{asset('user/js/sb-admin.min.js')}}"></script>
    @yield('js')
    <!-- Demo scripts for this page-->
    <script src="{{asset('user/js/demo/datatables-demo.js')}}"></script>
    <!-- <script src="{{asset('user/js/demo/chart-area-demo.js')}}"></script> -->
</body>
</html>
