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
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">
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
                                <legend>ISIAN FORM SISWA</legend>
                            </center>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection