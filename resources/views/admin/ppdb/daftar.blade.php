@extends('layouts.index')
@section('title')
Daftar Siswa
@endsection
@section('konten')
    <div class="container-fluid">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session('msg'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <p align="center">{{Session('msg')}}</p> Lihat Data Pendaftaran Putra/Putri
                <button class="close" type="button" data-dissmis="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        <div class="card shadow card-primary">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    Daftar Siswa
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('simpan-daftar')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <legend></legend>
                                <legend>INPUT SISWA</legend>
                            </center>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Hari, Tanggal</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="{{date('D,d/m/Y')}}" class="form-control-sm form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">Nama</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="" class="form-control" required>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $("[id='gj']").on('keyup', function(){
        var n = parseInt($(this).val().replace(/\D/g,''),10);
        $(this).val(n.toLocaleString());
        }); 
        $('.tgl').datepicker({
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection