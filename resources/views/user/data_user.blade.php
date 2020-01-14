@extends('layouts.index')
@section('title')
    Data User
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data User</h5>
            </div>
            <div class="card-body">
                <a href="{{url('add-user')}}" class="btn btn-info btn-sm" data-toogle="modal" data-target="#add_user"><i class="fas fa-pencil-alt"></i> Tambah User</a>
                <div class="form-group"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <center>
                                            @if($item->id==1)

                                            @else
                                                <button data-toggle="modal" data-target="#edit{{$item->id}}" class="btn btn-success btn-sm"><i class="fas fa-wrench"></i></button>
                                            @endif
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection