<?php
    include('admin/css/date_indonesia.php');
?>
@extends('layouts.index')
@section('title')
PPDB Siswa
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
                <p align="center">{{Session('msg')}}</p>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Data Siswa</div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <a href="{{url('download-excelsiswa')}}" class="mb-4 btn btn-outline-success btn-sm">Export Data</a>
                </div>
                <pre><table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            <?php $no=1; ?>
                            @foreach($siswa as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nisn}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->nama_lengkap}}</td>
                                <td>{{$item->ttl}}</td>
                                <td>{{$item->alamat}} RT {{$item->rt}} RW {{$item->rw}} dusun {{$item->dusun}} kelurahan {{$item->kelurahan}} kecamatan {{$item->kecamatan}}</td>
                                <td>{{$item->telp}}</td>
                                <td>{{$item->tahun}}</td>
                                <td><button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#dtl{{$item->id}}" type="button" title="Lihat Detail"><span class="fa fa-eye"></span></button> <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#update{{$item->id}}" type="button" title="Edit"><span class="fa fa-edit"></span></button> <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus{{$item->id}}" type="button" title="Hapus"><span class="fa fa-trash"></span></button> <a href="{{url('print-ppdb')."/".$item->ids}}" class="btn btn-outline-info btn-sm" title="Print"><span class="fa fa-print"></span></a></td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table></pre>
                    @foreach($siswa as $item)
                        <div class="modal fade" id="update{{$item->id}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">                                              
                                        <h4 class="modal-title">Update Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('update-siswa')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Hari, Tanggal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" name="ids" value="{{$item->ids}}">
                                                    <input type="text" value="<?php
                                                    $tanggal = time();
                                                        echo ''.indonesian_date($tanggal, 'l, d/F/Y'); 
                                                    ?>" name="hari_tanggal" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Nomor Pendaftaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="nomor_pendaftaran" value={{$item->no_pendaftaran}} class="form-control" readonly>
                                                </div>
                                            </div><div class="col-md-4">
                                                <div class="">
                                                    <label for="">Tahun Ajaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                                                        <option style="background-color: slategray" class="text-white" value="{{$item->idtahun}}" aria-readonly="true">{{$item->tahun}}</option>
                                                        @foreach ($th as $iteme)
                                                            <option value="{{$iteme->id}}">{{$iteme->tahun}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="nama_siswa" placeholder="Nama" value="{{$item->nama_lengkap}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jenis Kelamin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->gender=="Laki-Laki")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" checked="checked"> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                                                            </div>
                                                        @elseif($item->gender=="Perempuan")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan" checked="checked"> Perempuan<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">NISN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="nisn" placeholder="NISN" value="{{$item->nisn}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tempat Lahir</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$item->tempat_lahir}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tanggal Lahir</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" readonly  class="form-control pull-right tgl" name="tanggal_lahir" value="{{$item->ttl}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">NIK *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="nik" placeholder="NIK *)" class="form-control" value="{{$item->nik}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Agama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->agama=="Islam")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" checked="checked"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"> Budha
                                                            </div>
                                                        @elseif($item->agama=="Kristen Protestan")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" checked="checked"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"> Budha
                                                            </div>
                                                        @elseif($item->agama=="Katolik")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"checked="checked"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"> Budha
                                                            </div>
                                                        @elseif($item->agama=="Hindu")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"checked="checked"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"> Budha
                                                            </div>
                                                        @elseif($item->agama=="Budha")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"checked="checked"> Budha
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam"> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan"> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"> Budha
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kebutuhan Khusus</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="kebutuhan_khusus_siswa" placeholder="Kebutuhan Khusus" class="form-control" value="{{$item->kebutuhan_khusus}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="alamat" placeholder="Alamat" value="{{$item->alamat}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">RT</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="rt" placeholder="RT" value="{{$item->rt}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">RW</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="rw" placeholder="RW" value="{{$item->rw}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Dusun</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="dusun" placeholder="Dusun" value="{{$item->dusun}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kelurahan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="kelurahan" placeholder="Kelurahan" value="{{$item->kelurahan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kecamatan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="kecamatan" placeholder="Kecamatan" value="{{$item->kecamatan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kode POS</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="kode_pos" placeholder="Kode POS" value="{{$item->kode_pos}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jenis Tinggal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenis_tinggal=="Bersama Orangtua")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua" checked="checked"> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali"> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok"> Pondok <br>
                                                            </div>
                                                        @elseif($item->jenis_tinggal=="Bersama Wali")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua"> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali" checked="checked"> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok"> Pondok <br>
                                                            </div>
                                                        @elseif($item->jenis_tinggal=="Pondok")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua"> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali"> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok" checked="checked"> Pondok <br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua"> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali"> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok"> Pondok <br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Alat Transportasi</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="alat_transportasi" placeholder="Alat Transportasi" value="{{$item->alat_transportasi}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Telepon *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="telepon_siswa" placeholder="Telepon *)" value="{{$item->telp}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">HP *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="hp_siswa" placeholder="HP *)" value="{{$item->hp}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">E-Mail</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="email" placeholder="E-Mail" value="{{$item->email}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">No. Peserta UN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="no_peserta_un" placeholder="No. Peserta UN" value="{{$item->no_peserta_un}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Penerima KIP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->penerima_kip=="Ya")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya" checked="checked"> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak"> Tidak<br>
                                                            </div>
                                                        @elseif($item->penerima_kip=="Tidak")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya"> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak" checked="checked"> Tidak<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya"> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak"> Tidak<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">No. KIP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="no_kip" placeholder="No. KIP" value="{{$item->no_kip}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Data Ayah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">a. Nama</label> --}}
                                                    <input type="hidden" name="idortu" value="{{$item->idortu}}">
                                                    <input type="text" name="nama_ayah" placeholder="Nama" value="{{$item->nama_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">d. Pekerjaan</label> --}}
                                                    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" value="{{$item->pekerjaan_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                                    <input type="text" name="tahun_lahir_ayah" placeholder="Tahun Lahir" value="{{$item->tahun_lahir_ayah}}" class="form-control tahun">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">e. Penghasilan</label> --}}
                                                    <input type="text" name="penghasilan_ayah" placeholder="Penghasilan" value="{{$item->penghasilan_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8">
                                                <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenjang_pendidikan_ayah=="Tidak Sekolah")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" checked="checked"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="TK")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" checked="checked"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SD")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" checked="checked"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SMP")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" checked="checked"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SMA")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" checked="checked"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" checked="checked"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D2")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" checked="checked"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D3")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" checked="checked"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="S1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" checked="checked"> S1<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                                    <input type="text" name="kebutuhan_khusus_ayah" placeholder="Kebutuhan Khusus" value="{{$item->kebutuhan_khusus_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">g. HP *)</label> --}}
                                                    <input type="text" name="hp_ayah" placeholder="Hp *)" value="{{$item->no_hp_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Data Ibu</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">a. Nama</label> --}}
                                                    <input type="text" name="nama_ibu" placeholder="Nama" value="{{$item->nama_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">d. Pekerjaan</label> --}}
                                                    <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" value="{{$item->pekerjaan_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                                    <input type="text" name="tahun_lahir_ibu" placeholder="Tahun Lahir" value="{{$item->tahun_lahir_ibu}}" class="form-control tahun">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">e. Penghasilan</label> --}}
                                                    <input type="text" name="penghasilan_ibu" placeholder="Penghasilan" value="{{$item->penghasilan_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8">
                                                <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenjang_pendidikan_ibu=="Tidak Sekolah")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" checked="checked"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="TK")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" checked="checked"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SD")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" checked="checked"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SMP")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" checked="checked"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SMA")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" checked="checked"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" checked="checked"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D2")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" checked="checked"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D3")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" checked="checked"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="S1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" checked="checked"> S1<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah"> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK"> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD"> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP"> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA"> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1"> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2"> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3"> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1"> S1<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                                    <input type="text" name="kebutuhan_khusus_ibu" placeholder="Kebutuhan Khusus" value="{{$item->kebutuhan_khusus_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">g. HP *)</label> --}}
                                                    <input type="text" name="hp_ibu" placeholder="Hp *)" value="{{$item->no_hp_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Berat Badan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="berat_badan" placeholder="Berat Badan" value="{{$item->berat_badan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tinggi Badan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="tinggi_badan" placeholder="Tinggi Badan" value="{{$item->tinggi_badan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jarak Rumah ke Sekolah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jarak_rumah_sekolah=="Kurang dari 1 Kilometer")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer" checked="checked"> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer"> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @elseif($item->jarak_rumah_sekolah=="Lebih dari 1 Kilometer")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer"> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer" checked="checked"> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer"> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer"> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Waktu Tempuh ke Sekolah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="waktu_tempuh" placeholder="Waktu Tempuh ke Sekolah" value="{{$item->waktu_tempuh}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jumlah Saudara Kandung</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="jumlah_saudara_kandung" placeholder="Jumlah Saudara Kandung" value="{{$item->jumlah_saudara}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Status</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->status=="lulus")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus" checked="checked"> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum"> Belum<br>
                                                            </div>
                                                        @elseif($item->status=="belum")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus"> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum" checked="checked">  Belum<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus"> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum"> Belum<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-outline-primary" type="submit"><span class="fa fa-check"></span> Simpan</button>
                                                            </div>
                                        </form>
                                    </div>                                     
                            </div>
                        </div>
                    @endforeach
                    @foreach($siswa as $item)
                        <div class="modal fade" id="dtl{{$item->id}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">                                              
                                        <h4 class="modal-title">Detail Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('simpan-daftar')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Hari, Tanggal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" value="<?php
                                                    $tanggal = time();
                                                        echo ''.indonesian_date($tanggal, 'l, d/F/Y'); 
                                                    ?>" name="hari_tanggal" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Nomor Pendaftaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="nomor_pendaftaran" value={{$item->no_pendaftaran}} class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="">Tahun Ajaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" readonly value="{{$item->tahun}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="nama_siswa" placeholder="Nama" value="{{$item->nama_lengkap}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jenis Kelamin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->gender=="Laki-Laki")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" checked="checked" disabled> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan" disabled> Perempuan<br>
                                                            </div>
                                                        @elseif($item->gender=="Perempuan")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" disabled> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan" checked="checked" disabled> Perempuan<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" disabled> Laki-Laki<br><legend></legend>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_kelamin" value="Perempuan" disabled> Perempuan<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">NISN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="nisn" placeholder="NISN" value="{{$item->nisn}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tempat Lahir</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$item->tempat_lahir}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tanggal Lahir</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" readonly  class="form-control pull-right" name="tanggal_lahir" value="{{$item->ttl}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">NIK *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="nik" placeholder="NIK *)" class="form-control" value="{{$item->nik}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Agama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->agama=="Islam")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" checked="checked" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha" disabled> Budha
                                                            </div>
                                                        @elseif($item->agama=="Kristen Protestan")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" checked="checked" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha" disabled> Budha
                                                            </div>
                                                        @elseif($item->agama=="Katolik")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik"checked="checked" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha" disabled> Budha
                                                            </div>
                                                        @elseif($item->agama=="Hindu")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu"checked="checked" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha" disabled> Budha
                                                            </div>
                                                        @elseif($item->agama=="Budha")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha"checked="checked" disabled> Budha
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Islam" disabled> Islam<br>
                                                                <input type="radio" name="agama" value="Kristen Protestan" disabled> Kristen Protestan
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Katolik" disabled> Katolik<br>
                                                                <input type="radio" name="agama" value="Hindu" disabled> Hindu
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="agama" value="Budha" disabled> Budha
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kebutuhan Khusus</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="kebutuhan_khusus_siswa" placeholder="Kebutuhan Khusus" class="form-control" value="{{$item->kebutuhan_khusus}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="alamat" placeholder="Alamat" value="{{$item->alamat}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">RT</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="rt" placeholder="RT" value="{{$item->rt}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">RW</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="rw" placeholder="RW" value="{{$item->rw}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Dusun</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="dusun" placeholder="Dusun" value="{{$item->dusun}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kelurahan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="kelurahan" placeholder="Kelurahan" value="{{$item->kelurahan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kecamatan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="kecamatan" placeholder="Kecamatan" value="{{$item->kecamatan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Kode POS</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="kode_pos" placeholder="Kode POS" value="{{$item->kode_pos}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jenis Tinggal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenis_tinggal=="Bersama Orangtua")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua" checked="checked" disabled> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali" disabled> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok" disabled> Pondok <br>
                                                            </div>
                                                        @elseif($item->jenis_tinggal=="Bersama Wali")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua" disabled> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali" checked="checked" disabled> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok" disabled> Pondok <br>
                                                            </div>
                                                        @elseif($item->jenis_tinggal=="Pondok")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua" disabled> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali" disabled> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok" checked="checked" disabled> Pondok <br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Orangtua" disabled> Bersama Orangtua<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Bersama Wali" disabled> Bersama Wali<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenis_tinggal" value="Pondok" disabled> Pondok <br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Alat Transportasi</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="alat_transportasi" placeholder="Alat Transportasi" value="{{$item->alat_transportasi}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Telepon *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="telepon_siswa" placeholder="Telepon *)" value="{{$item->telp}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">HP *)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="hp_siswa" placeholder="HP *)" value="{{$item->hp}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">E-Mail</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="email" placeholder="E-Mail" value="{{$item->email}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">No. Peserta UN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="no_peserta_un" placeholder="No. Peserta UN" value="{{$item->no_peserta_un}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Penerima KIP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->penerima_kip=="Ya")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya" checked="checked" disabled> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak" disabled> Tidak<br>
                                                            </div>
                                                        @elseif($item->penerima_kip=="Tidak")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya" disabled> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak" checked="checked" disabled> Tidak<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Ya" disabled> Ya<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="penerima_kip" value="Tidak" disabled> Tidak<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">No. KIP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="no_kip" placeholder="No. KIP" value="{{$item->no_kip}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Data Ayah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">a. Nama</label> --}}
                                                    <input readonly type="text" name="nama_ayah" placeholder="Nama" value="{{$item->nama_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">d. Pekerjaan</label> --}}
                                                    <input readonly type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" value="{{$item->pekerjaan_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                                    <input readonly type="text" name="tahun_lahir_ayah" placeholder="Tahun Lahir" value="{{$item->tahun_lahir_ayah}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">e. Penghasilan</label> --}}
                                                    <input readonly type="text" name="penghasilan_ayah" placeholder="Penghasilan" value="{{$item->penghasilan_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8">
                                                <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenjang_pendidikan_ayah=="Tidak Sekolah")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" checked="checked" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="TK")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" checked="checked" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SD")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" checked="checked" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SMP")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" checked="checked" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="SMA")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" checked="checked" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" checked="checked" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D2")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" checked="checked" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="D3")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" checked="checked" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ayah=="S1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ayah" value="S1" checked="checked" disabled> S1<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                                    <input readonly type="text" name="kebutuhan_khusus_ayah" placeholder="Kebutuhan Khusus" value="{{$item->kebutuhan_khusus_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">g. HP *)</label> --}}
                                                    <input readonly type="text" name="hp_ayah" placeholder="Hp *)" value="{{$item->no_hp_ayah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Data Ibu</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">a. Nama</label> --}}
                                                    <input readonly type="text" name="nama_ibu" placeholder="Nama" value="{{$item->nama_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">d. Pekerjaan</label> --}}
                                                    <input readonly type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" value="{{$item->pekerjaan_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                                    <input readonly type="text" name="tahun_lahir_ibu" placeholder="Tahun Lahir" value="{{$item->tahun_lahir_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">e. Penghasilan</label> --}}
                                                    <input readonly type="text" name="penghasilan_ibu" placeholder="Penghasilan" value="{{$item->penghasilan_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-8">
                                                <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jenjang_pendidikan_ibu=="Tidak Sekolah")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" checked="checked" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="TK")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" checked="checked" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SD")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" checked="checked" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SMP")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" checked="checked" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="SMA")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" checked="checked" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" checked="checked" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D2")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" checked="checked" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="D3")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" checked="checked" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @elseif($item->jenjang_pendidikan_ibu=="S1")
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" checked="checked" disabled> S1<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="Tidak Sekolah" disabled> Tidak Sekolah<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="TK" disabled> TK<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SD" disabled> SD<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMP" disabled> SMP<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="SMA" disabled> SMA<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D1" disabled> D1<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D2" disabled> D2<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="D3" disabled> D3<br>
                                                                <input type="radio" name="jenjang_pendidikan_ibu" value="S1" disabled> S1<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                                    <input readonly type="text" name="kebutuhan_khusus_ibu" placeholder="Kebutuhan Khusus" value="{{$item->kebutuhan_khusus_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- <label for="nis">g. HP *)</label> --}}
                                                    <input readonly type="text" name="hp_ibu" placeholder="Hp *)" value="{{$item->no_hp_ibu}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Berat Badan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="berat_badan" placeholder="Berat Badan" value="{{$item->berat_badan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Tinggi Badan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="tinggi_badan" placeholder="Tinggi Badan" value="{{$item->tinggi_badan}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jarak Rumah ke Sekolah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->jarak_rumah_sekolah=="Kurang dari 1 Kilometer")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer" checked="checked" disabled> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer" disabled> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @elseif($item->jarak_rumah_sekolah=="Lebih dari 1 Kilometer")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer" disabled> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer" checked="checked" disabled> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer" disabled> Kurang dari 1 Kilometer<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer" disabled> Lebih dari 1 Kilometer<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Waktu Tempuh ke Sekolah</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="waktu_tempuh" placeholder="Waktu Tempuh ke Sekolah" value="{{$item->waktu_tempuh}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Jumlah Saudara Kandung</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input readonly type="text" name="jumlah_saudara_kandung" placeholder="Jumlah Saudara Kandung" value="{{$item->jumlah_saudara}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="nis">Status</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @if($item->status=="lulus")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus" checked="checked" disabled> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum" disabled> Belum<br>
                                                            </div>
                                                        @elseif($item->status=="belum")
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus" disabled> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum" checked="checked" disabled>  Belum<br>
                                                            </div>
                                                        @else
                                                            <div class="col-md-4">                                        
                                                                <input type="radio" name="status" value="lulus" disabled> Lulus<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="radio" name="status" value="belum" disabled> Belum<br>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-danger" type="button" data-dismiss="modal"></span> Tutup</button>
                                    </div>
                                    </form>   
                                </div>  
                            </div>                                 
                            </div>
                        </div>
                    @endforeach
                    @foreach($siswa as $item)
                        <div class="modal fade" id="hapus{{$item->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="ids" value="{{$item->ids}}">
                                        <input type="hidden" name="idortu" value="{{$item->idortu}}">
                                        <p>Apakah anda ingin menghapus data siswa <br>Dengan Nama :<br><b>{{$item->nama_lengkap}}</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{url('hapus-siswa').'/'.$item->ids.'/'.$item->idortu}}" class="btn btn-outline-danger"><i class="fa fa-check"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
            format: 'dd-mm-yyyy',
        });
    </script>
    <script>
        $(".tahun").datepicker( {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
        });
    </script>
@endsection