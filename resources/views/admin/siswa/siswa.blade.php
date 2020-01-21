@extends('layouts.index')
@section('title')
Siswa
@endsection
@section('konten')
    <div class="content p-4">
         @if (Session('msg'))
            <div class="alert alert-primary alert-dismissible" role="alert">
            <p align="center">{{Session('msg')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
        @endif 
        <div class="card card-primary">
            <div class="card header">
                <div class="card title">Data Siswa</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-inline" action="" method="post">
                            @csrf
                            <div class="form-group mr-sm-2">
                                <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari Siswa">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="form-inline" action="" method="post">
                            @csrf
                            <div class="form-group mr-sm-2">
                                <select name="sort" id="" class="form-control">
                                @foreach
                                    <option value="" ></option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection