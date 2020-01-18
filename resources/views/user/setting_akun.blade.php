@extends('layouts.index')
@section('title')
    Setting Akun
@endsection
@section('konten')
    <div class="container-fluid dashboard-content">
        @if(Session('msg'))
            <div class="alert alert-warning alert-dismissible fade-show" role="alert">
                <p align="center">{{Session('msg')}}</p>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $er)
                <ul>
                    <div class="alert alert-warning alert-dismissible fade-show" role="alert">
                        <li>{{$er}}</li>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                </ul>
            @endforeach
        @endif
        <div class="card shadow">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Setting User</h5>
            </div>
            <div class="card-body">
                <form action="{{url('set-akun-data')}}" method="post">
                    @csrf
                    @foreach($data as $item)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="text" name="name" value="{{$item->name}}" placeholder="Nama Lengkap" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{$item->email}}" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" placeholder="New Password (Isi Jika Ingin Mengedit)" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>

@endsection