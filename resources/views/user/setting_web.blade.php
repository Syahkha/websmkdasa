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
                            <label for="">Instagram</label>
                            <input placeholder="Isi Instagram" value="{{$item->instagram}}" type="text" name="instagram"
                                id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input placeholder="Isi Twitter" value="{{$item->twitter}}" type="text" name="twitter" id=""
                                class="form-control">
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
                            <label for="">Youtube</label>
                            <input placeholder="Isi Youtube" value="{{$item->youtube}}" type="text" name="youtube" id=""
                                class="form-control">
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
                            <label for="">Profil</label>
                            <textarea placeholder="Isi Profil" rows="5" name="profil" id=""
                                class="form-control">{{$item->profil}} </textarea>
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

                    <hr>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary "> Simpan</button>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Galeri</h5>
        </div>
        <div class="card-body">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#add" title="Tambah User"><i class="fas fa-plus fa-sm"></i> Tambah Galeri</button>
            <div class="form-group"></div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($galeri as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->nama_galeri}}</td>
                            <td>
                                <button class="btn btn-sm " data-toggle="modal"
                                    data-target="#l{{$item->id_galeri}}"><span data-toggle="tooltip"
                                        title="Lihat gambar" class="fa fa-eye"></span></button>
                                <a href="{{url('hapus-galeri').'/'.$item->id_galeri.'/'.$item->nama_galeri}}"
                                    class="btn btn-sm btn-danger"><span title="hapus gambar"
                                        class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <!-- l -->
                        <div class="modal" id="l{{$item->id_galeri}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Lihat Gambar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('source/galeri').'/'.$item->nama_galeri}}" alt=""
                                            height="300px" width="90%"><br>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ll -->
                        @endforeach
                        <!-- Modal -->
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah gambar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('tambah-galeri')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tambah Galeri</label>
                                                <input type="file" name="nama_galeri" class="form-control"
                                                    id="exampleFormControlInput1" placeholder="pilih gambar" required   >
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Program Studi</h5>
        </div>
        <div class="card-body">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#add_studi" title="Tambah User"><i class="fas fa-plus fa-sm"></i> Tambah Program Studi</button>
            <div class="form-group"></div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($studi as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->nama_jurusan}}</td>
                            <td>
                            <button data-toggle="modal" data-target="#edit{{$item->id}}" class="btn btn-success btn-sm" title="Edit Program Studi"><i class="fas fa-edit"></i></button>
                                <a href="{{url('hapus-studi').'/'.$item->id}}"
                                    class="btn btn-sm btn-danger"><span title="hapus gambar"
                                        class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <!-- U -->
                        <div class="modal" id="edit{{$item->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Lihat Gambar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{url('update-studi')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1"> Tambah Program Studi</label>
                                                <input type="hidden" value="{{$item->id}}" name="id">
                                                <input type="text" value="{{$item->nama_jurusan}}" name="nama" class="form-control"
                                                    id="exampleFormControlInput1" placeholder="Isi Nama Program Studi" required   >
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- UU -->
                        @endforeach
                        <!-- Modal -->
                        <div class="modal fade" id="add_studi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Program Studi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('tambah-studi')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1"> Tambah Program Studi</label>
                                                <input type="text" name="studi" class="form-control"
                                                    id="exampleFormControlInput1" placeholder="Isi Nama Program Studi" required   >
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
   
</div>
@endsection