<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/sb-admin-2.min.css')}}">
</head>
<body class="bg-gradient-primary">
<div class="container">
    @yield('konten')
</div>
</body>
</html>