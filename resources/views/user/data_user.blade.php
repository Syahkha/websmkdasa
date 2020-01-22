@if(Auth::user()->level=="Developer" || Auth::user()->level=="Superadmin" || Auth::user()->level=="Admin")
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
        <div class="card shadow">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Data User</h5>
            </div>
            <div class="card-body">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#add_user" title="Tambah User"><i class="fas fa-plus fa-sm"></i> Tambah User</button>
                <div class="form-group"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th><center>Aksi</center></th>
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
                                            @if($item->level=='Developer')

                                            @elseif($item->id==1)

                                            @else
                                                @if(Auth::user()->level=="Developer" || Auth::user()->level=="Superadmin")
                                                    <button data-toggle="modal" data-target="#edit{{$item->id}}" class="btn btn-success btn-sm" title="Edit User"><i class="fas fa-wrench"></i></button>
                                                    <a href="{{url('hapus-user').'/'.$item->id}}" class="btn btn-danger btn-sm" title="Hapus User"><i class="fas fa-trash"></i></a>
                                                @elseif(Auth::user()->level=="Developer" || Auth::user()->level=="Admin")
                                                    @if($item->level=='Superadmin')
                                                        
                                                    @elseif($item->level=='Admin')

                                                    @else
                                                        <button data-toggle="modal" data-target="#edit{{$item->id}}" class="btn btn-success btn-sm" title="Edit User"><i class="fas fa-wrench"></i></button>
                                                        <a href="{{url('hapus-user').'/'.$item->id}}" class="btn btn-danger btn-sm" title="Hapus User"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                @endif
                                            @endif
                                        </center>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title"><h5 class="mb-1">Edit User</h5>
                                                <p>Silahkan masukan informasi pengguna akun anda.</p></div>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{('edit-user')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control form-control-sm" name="id" value="{{$item->id}}" required="" placehodler="ID">
                                                        <input type="text" class="form-control form-control-sm" name="name" value="{{$item->name}}" required="" placeholder="Username" autocomplete="off" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="email" name="email" value="{{$item->email}}" required="" placeholder="E-Mail" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="password" name="password" type="password" placeholder="New Password (Isi Jika Ingin Mengedit)">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <input id="password-confirm" name="password_confirmation" class="form-control form-control-sm" type="password" placeholder="Confirm New Password (Isi Jika Mengedit)">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <select name="level" class="form-control form-control-sm">
                                                            @if($item->level=="Superadmin")
                                                                <option value="{{$item->level}}">Superadmin</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="User">User</option>
                                                            @else
                                                                @if($item->level=="Admin")
                                                                    @if(Auth::user()->level=="Developer" || Auth::user()->level=="Superadmin")
                                                                        <option value="{{$item->level}}">Admin</option>
                                                                        <option value="User">User</option>
                                                                    @elseif(Auth::user()->level=="Developer" || Auth::user()->level=="Admin")
                                                                        <option value="User">User</option>
                                                                    @endif
                                                                @elseif($item->level=="User")
                                                                    @if(Auth::user()->level=="Developer" || Auth::user()->level=="Superadmin")
                                                                        <option value="{{$item->level}}">User</option>
                                                                        <option value="Admin">Admin</option>
                                                                    @elseif(Auth::user()->level=="Developer" || Auth::user()->level=="Admin")
                                                                        <option value="{{$item->level}}">User</option>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                            </div>
                                                        <button class="form-control btn btn-clock btn-primary btn-sm" type="submit">Simpan</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="add_user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title"><h5 class="mb-1">Tambah User</h5>
                                <p>Silahkan masukkan informasi pengguna anda.</p></div>
                            </div>
                            <div class="modal-body">
                                <form action="{{('tambah-user')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" id="name" name="name" required="" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="email" id="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" id="password_tambah" name="password" type="password" required placeholder="Password" autocomplete="new-password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <input id="password-confirm" name="password_confirmation" class="form-control form-control-sm" type="password" required placeholder="Confirm" autocomplete="new-password">
                                    </div> -->
                                    <div class="form-group">
                                        <select name="level" class="form-control form-control-sm">
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                            </div>
                                        <button class="form-control btn btn-block btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
    @section('konten')
    <h4>Not Found <br>Error 153</h4>
    @endsection
@endif