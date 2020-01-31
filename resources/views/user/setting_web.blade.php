@extends('layouts.index')
@section('title')
Setting Web
@endsection
@section('konten')
<div class="container-fluid">
    @if (Session('msg'))
    <div class="alert shadow alert-primary alert-dismissible" role="alert">
        <p align="center">{{Session('msg')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $er)
    <ul>
        <div class="alert alert-primary alert-dismissible" role="alert">
            <li>{{$er}}</li>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
        </div>
        @endforeach
    </ul>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Setting Website</h5>
        </div>
        <div class="card-body">
            @if($data==NULL)
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#add_setweb"><i class="fas fa-plus fa-sm"></i> Isi Setting Website</button>
            @endif
            <form action="{{url('update-setting')}}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($data as $item)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <label for="">Nama Web</label>
                            <input placeholder="Isikan Nama Web" value="{{$item->webname}}" type="text" name="name"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">PPDB</label>
                            <select name="psb" id="" class="form-control">
                                @if ($item->psb=="Y")
                                <option value="{{$item->psb}}">Aktif</option>
                                @else
                                <option value="{{$item->psb}}">Non-Aktif</option>
                                @endif

                                <option value="Y">Aktif</option>
                                <option value="N">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input placeholder="Isi Email" value="{{$item->email}}" type="text" name="email" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input placeholder="Isi Alamat" value="{{$item->alamat}}" type="text" name="alamat" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kontak 1</label>
                            <input placeholder="Isikan Kontak 1" value="{{$item->kontak1}}" type="text" name="kontak1"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kota</label>
                            <input placeholder="Isi Kota" value="{{$item->kota}}" type="text" name="kota" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kontak 2</label>
                            <input placeholder="Isi Kontak 2" value="{{$item->kontak2}}" type="text" name="kontak2"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input placeholder="Isi Provinsi" value="{{$item->provinsi}}" type="text" name="provinsi"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input placeholder="Isi Facebook" value="{{$item->facebook}}" type="text" name="facebook"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Logo</label>
                            <input value="{{$item->logo}}" type="hidden" name="logoLama" id="file" class="form-control">
                            <input placeholder="Isi Logo" value="{{$item->logo}}" type="file" name="logo" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input placeholder="Isi Instagram" value="{{$item->instagram}}" type="text" name="instagram"
                                id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">icon</label>
                            <input value="{{$item->icon}}" type="hidden" name="iconLama" id="file" class="form-control">
                            <input placeholder="Isi Icon" value="{{$item->icon}}" type="file" name="icon" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input placeholder="Isi Twitter" value="{{$item->twitter}}" type="text" name="twitter" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Banner</label>
                            <input value="{{$item->banner}}" type="hidden" name="edit_bannerlama" id="file"
                                class="form-control">
                            <input placeholder="Isi Banner" type="file" name="banner" id="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Youtube</label>
                            <input placeholder="Isi Youtube" value="{{$item->youtube}}" type="text" name="youtube" id=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Profil</label>
                            <input placeholder="Isi Profil" value="{{$item->profil}}" type="text" name="profil" id=""
                                class="form-control">
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary "> Simpan</button>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add_setweb">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Isi Setting Website</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{url('insert-setweb')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Web</label>
                                    <input type="hidden" name="id" value="1 " id="" class="form-control">
                                    <input placeholder="Isikan Nama Web" type="text" name="name" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">PPDB</label>
                                    <select name="psb" id="" class="form-control">
                                        <option value="Y">Aktif</option>
                                        <option value="N">Non-Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input placeholder="Isi Email" type="text" name="email" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input placeholder="Isi Alamat" type="text" name="alamat" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kontak 1</label>
                                    <input placeholder="Isikan Kontak 1" type="text" name="kontak1" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kota</label>
                                    <input placeholder="Isi Kota" type="text" name="kota" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kontak 2</label>
                                    <input placeholder="Isi Kontak 2" type="text" name="kontak2" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input placeholder="Isi Provinsi" type="text" name="provinsi" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input placeholder="Isi Facebook" type="text" name="facebook" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input placeholder="Isi Logo" type="file" name="logo" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input placeholder="Isi Instagram" type="text" name="instagram" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">icon</label>
                                    <input placeholder="Isi Icon" type="file" name="icon" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input placeholder="Isi Twitter" type="text" name="twitter" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input placeholder="Isi Banner" type="file" name="banner" id="file"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Youtube</label>
                                    <input placeholder="Isi Youtube" type="text" name="youtube" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Profil</label>
                                    <input placeholder="Isi profil" type="text" name="profil" id=""
                                        class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary "> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>
    @endsection