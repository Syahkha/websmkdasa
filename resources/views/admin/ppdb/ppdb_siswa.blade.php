@extends('layouts.index')
@section('title')
PPDB Siswa
@endsection
@section('konten')
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Data Pendaftaran Siswa</div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($ppdb as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nisn}}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->ttl}}</td>
                            <td>{{$item->alamat}} RT {{$item->rt}} RW {{$item->rw}} dusun {{$item->dusun}} kelurahan {{$item->kelurahan}} kecamatan {{$item->kecamatan}}</td>
                            <td>{{$item->telp}}</td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection