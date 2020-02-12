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
                                <td><button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#l{{$item->id}}" type="button" title="Terima"><span class="fa fa-check"></span></button> <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#t{{$item->id}}" type="button" title="Tolak"><span class="fa fa-times"></span></button> <a href="{{url('print-ppdb')."/".$item->ids}}" class="btn btn-outline-info btn-sm" title="Print"><span class="fa fa-print"></span></a></td>
                            </tr>
                            <div class="modal fade" id="l{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title"><b>Ceklist Kelengkapan Pendaftar</b></div>
                                        </div>
                                        <div class="modal-body"><p>Harap Dicek dulu Kelengkapan Pendaftar</p><ol type="1"><li>Surat Pernyataan</li><li>Surat Persertujuan Orang Tua/Wali</li><li>Dan Berkas Lainnya Jika Ada</li></ol>
                                        </div>
                                        <div class="modal-footer"><a href="{{url('acc-daftar-sa').'/'.$item->ids}}" class="btn btn-outline-primary"><i class="fa fa-check"></i> Terima</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="t{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"><h6 class="modal-title"><b>Masukkan Sebab Atau Keterangan Tidak Diterima</b></h6></div>
                                        <div class="modal-body"><form action="{{url('ditolak-daftar-sa')}}" method="post">@csrf<div class="form-group"><input type="hidden" name="id" value="{{$item->ids}}"><input type="text" class="form-control" required name="ket" placeholder="Masukkan Keterangan Tidak Diterima"></div></div>
                                        <div class="modal-footer"><button type="submit" class="btn btn-outline-danger"> Tidak Diterima</button></div></form></div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table></pre>
            </div>
        </div>
        <br>
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Data Pendaftaran Siswa Ditolak</div>
            </div>
            <div class="card-body">
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($ppdbt as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nisn}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->nama_lengkap}}</td>
                                <td>{{$item->ttl}}</td>
                                <td>{{$item->alamat}} RT {{$item->rt}} RW {{$item->rw}} dusun {{$item->dusun}} kelurahan {{$item->kelurahan}} kecamatan {{$item->kecamatan}}</td>
                                <td>{{$item->telp}}</td>
                                <td><button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#l{{$item->id}}" type="button" title="Terima"><span class="fa fa-check"></span></button> <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#t{{$item->id}}" type="button" title="Tolak"><span class="fa fa-times"></span></button> <a href="{{url('print-ppdb')."/".$item->ids}}" class="btn btn-outline-info btn-sm" title="Print"><span class="fa fa-print"></span></a></td>
                            </tr>
                            <div class="modal fade" id="l{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title"><b>Ceklist Kelengkapan Pendaftar</b></div>
                                        </div>
                                        <div class="modal-body"><p>Harap Dicek dulu Kelengkapan Pendaftar</p><ol type="1"><li>Surat Pernyataan</li><li>Surat Persertujuan Orang Tua/Wali</li><li>Dan Berkas Lainnya Jika Ada</li></ol>
                                        </div>
                                        <div class="modal-footer"><a href="{{url('acc-daftar-sa').'/'.$item->ids}}" class="btn btn-outline-primary"><i class="fa fa-check"></i> Terima</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="t{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"><h6 class="modal-title"><b>Masukkan Sebab Atau Keterangan Tidak Diterima</b></h6></div>
                                        <div class="modal-body"><form action="{{url('ditolak-daftar-sa')}}" method="post">@csrf<div class="form-group"><input type="hidden" name="id" value="{{$item->ids}}"><input type="text" class="form-control" required name="ket" placeholder="Masukkan Keterangan Tidak Diterima"></div></div>
                                        <div class="modal-footer"><button type="submit" class="btn btn-outline-danger"> Tidak Diterima</button></div></form></div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table></pre>
            </div>
        </div>
    </div>
@endsection