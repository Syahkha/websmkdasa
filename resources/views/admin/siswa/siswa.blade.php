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
                    <div class="col-md-4">
                        <a href="" class="mb-4 btn btn-outline-info"><i class="fa fa-id-badge"></i>Download Data Siswa</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIS</th>
                                    <th>ID ORTU</th>
                                    <th>ID TAHUN</th>
                                    <th>NAMA</th>
                                    <th>TTL</th>
                                    <th>ASAL</th>
                                    <th>ALAMAT</th>
                                    <th>DESA</th>
                                    <th>KECAMATAN</th>
                                    <th>KOTA</th>
                                    <th>PROVINSI</th>
                                    <th>TELP</th>
                                    <th>GENDER</th>
                                    <th>FOTO</th>
                                    <th>PSB</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nis}}</td>
                                        <td>{{$item->idortu}}</td>
                                        <td>{{$item->idtahun}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->ttl}}</td>
                                        <td>{{$item->asal}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->desa}}</td>
                                        <td>{{$item->kecamatan}}</td>
                                        <td>{{$item->kota}}</td>
                                        <td>{{$item->provinsi}}</td>
                                        <td>{{$item->telp}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->foto}}</td>
                                        <td>{{$item->psb}}</td>
                                        <td>{{$item->keterangan}}</td>
                                        <td>
                                            <a href="" class="mb-4 btn btn-sm btn-sm btn-online-danger mr-sm-2"><i class="fa fa-trash"></i></a>
                                            <button type="button" data-toggle="modal" data-target="" class="mb-4 btn btn-outline-primary btn-sm"><i class="cfa fa-eit"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="us{{$item->ids}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="modal-title">
                                                        <p>Edit Data Siswa</p>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{url('update_siswa')}}" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <center>
                                                                    <label for="">Foto Siswa</label>
                                                                    <br>
                                                                    <img src="" width="100px" alt="">
                                                                    <hr>
                                                                </center>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" value="" class="form-control">
                                                                    <label for="id">ID</label>
                                                                    <input type="text" placeholder="ID" name="id" value="{{$item->id}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="nis" value="" class="form-control">
                                                                    <label for="id">NIS</label>
                                                                    <input type="text" placeholder="NIS" name="nis" value="{{$item->nis}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="idortu" value="" class="form-control">
                                                                    <label for="id">ID ORTU</label>
                                                                    <input type="text" placeholder="ID" name="idortu" value="{{$item->idortu}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="idtahun" value="" class="form-control">
                                                                    <label for="id">ID TAHUN</label>
                                                                    <input type="text" placeholder="ID TAHUN" name="idtahun" value="{{$item->idtahun}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="nama" value="" class="form-control">
                                                                    <label for="id">NAMA LENGKAP</label>
                                                                    <input type="text" placeholder="NAMA" name="nama" value="{{$item->nama}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="ttl" value="" class="form-control">
                                                                    <label for="id">TTL</label>
                                                                    <input type="text" placeholder="TTL" name="ttl" value="{{$item->ttl}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="asal" value="" class="form-control">
                                                                    <label for="id">ASAL</label>
                                                                    <input type="text" placeholder="ASAL" name="asal" value="{{$item->asal}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="alamat" value="" class="form-control">
                                                                    <label for="id">ALAMAT</label>
                                                                    <input type="text" placeholder="ALAMAT" name="alamat" value="{{$item->alamat}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="desa" value="" class="form-control">
                                                                    <label for="id">DESA</label>
                                                                    <input type="text" placeholder="DESA" name="desa" value="{{$item->desa}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="kecamatan" value="" class="form-control">
                                                                    <label for="id">KECAMATAN</label>
                                                                    <input type="text" placeholder="KECAMATAN" name="kecamatan" value="{{$item->kecamtan}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="kota" value="" class="form-control">
                                                                    <label for="id">KOTA</label>
                                                                    <input type="text" placeholder="KOTA" name="kota" value="{{$item->kota}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="provinsi" value="" class="form-control">
                                                                    <label for="id">PROVINSI</label>
                                                                    <input type="text" placeholder="PROVINSI" name="provinsi" value="{{$item->provinsi}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="telp" value="" class="form-control">
                                                                    <label for="id">TELEPON</label>
                                                                    <input type="text" placeholder="TELEPON" name="tlp" value="{{$item->tlp}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="gender" value="" class="form-control">
                                                                    <label for="id">GENDER</label>
                                                                    <input type="text" placeholder="GENDER" name="gender" value="{{$item->gender}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="psb" value="" class="form-control">
                                                                    <label for="id">PSB</label>
                                                                    <input type="text" placeholder="PSB" name="psb" value="{{$item->psb}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="keterangan" value="" class="form-control">
                                                                    <label for="id">KETERANGAN</label>
                                                                    <input type="text" placeholder="KETERANGAN" name="keterangan" value="{{$item->keterangan}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class=" col-md-12">                
                                                                <div class="form-group text-right">
                                                                    <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-check"></span> Simpan</button>
                                                                </div>              
                                                            </div>
                                                        </div>   
                                                    </form>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection