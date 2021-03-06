<?php
    include('admin/css/date_indonesia.php');
?>
@extends('layouts.index')
@section('title')
Daftar Siswa
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
                <p align="center">{{Session('msg')}}</p> Lihat Data <a href="{{url('data-siswa')}}">Siswa</a>/<a href="{{url('data-siswi')}}">Siswi</a>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        <div class="card shadow card-primary">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    Daftar Siswa
                </div>
            </div>
            <div class="card-body">
                <form action="{{url('simpan-daftar')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <legend></legend>
                                <legend>INPUT SISWA</legend>
                            </center>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Hari, Tanggal</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="datepicker" type="text" value="<?php
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
                                <input type="text" name="nomor_pendaftaran" value="<?php 
                                    $np=DB::table("siswa")
                                    ->select(DB::raw("MAX(RIGHT(no_pendaftaran,3)) as kd_max"));
                                    if($np->count()>0){
                                        foreach ($np->get() as $nop) {
                                            $tmp=((int)$nop->kd_max)+1;
                                            $final="".sprintf('%03s',$tmp);
                                        }
                                    }else{
                                        $final=""."001";
                                    }
                                    echo $final;
                                    ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="">Tahun Ajaran</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                                    @foreach ($th as $item)
                                        <option value="{{$item->id}}">{{$item->tahun}}</option>
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
                                <input type="text" name="nama_siswa" placeholder="Nama" class="form-control">
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
                                    <div class="col-md-4">
                                        <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki<br><legend></legend>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                                    </div>
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
                                <input type="text" name="nisn" placeholder="NISN" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" readonly  class="form-control pull-right tgl" name="tanggal_lahir" value="{{date('d-m-Y')}}" id="datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">NIK *)</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nik" placeholder="NIK *)" class="form-control" required>
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
                                <input type="text" name="kebutuhan_khusus_siswa" placeholder="Kebutuhan Khusus" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Alamat</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="alamat" placeholder="Alamat" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">RT</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="rt" placeholder="RT" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">RW</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="rw" placeholder="RW" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Dusun</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="dusun" placeholder="Dusun" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Kelurahan</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Kecamatan</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Kode POS</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="kode_pos" placeholder="Kode POS" class="form-control">
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
                                    <div class="col-md-4">
                                        <input type="radio" name="jenis_tinggal" value="Bersama Orangtua"> Bersama Orangtua<br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="jenis_tinggal" value="Bersama Wali"> Bersama Wali<br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="jenis_tinggal" value="Pondok"> Pondok <br>
                                    </div>
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
                                <input type="text" name="alat_transportasi" placeholder="Alat Transportasi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Telepon *)</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="telepon_siswa" placeholder="Telepon *)" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">HP *)</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="hp_siswa" placeholder="HP *)" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">E-Mail</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="email" placeholder="E-Mail" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">No. Peserta UN</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="no_peserta_un" placeholder="No. Peserta UN" class="form-control">
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
                                    <div class="col-md-4">
                                        <input type="radio" name="penerima_kip" value="Ya"> Ya<br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="penerima_kip" value="Tidak"> Tidak<br>
                                    </div>
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
                                <input type="text" name="no_kip" placeholder="No. KIP" class="form-control">
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
                                <input type="text" name="nama_ayah" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">d. Pekerjaan</label> --}}
                                <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                <input type="text" name="tahun_lahir_ayah" placeholder="Tahun Lahir" class="form-control tahun" id="datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">e. Penghasilan</label> --}}
                                <input type="text" name="penghasilan_ayah" placeholder="Penghasilan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">
                            <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                            <div class="form-group">
                                <div class="row">
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
                                        <input type="radio" name="jenjang_pendidikan_ayah" value="S1"> S1<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                <input type="text" name="kebutuhan_khusus_ayah" placeholder="Kebutuhan Khusus" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">g. HP *)</label> --}}
                                <input type="text" name="hp_ayah" placeholder="Hp *)" class="form-control">
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
                                <input type="text" name="nama_ibu" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">d. Pekerjaan</label> --}}
                                <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">b. Tahun Lahir</label> --}}
                                <input type="text" name="tahun_lahir_ibu" placeholder="Tahun Lahir" class="form-control tahun" id="datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">e. Penghasilan</label> --}}
                                <input type="text" name="penghasilan_ibu" placeholder="Penghasilan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">
                            <label for="jenjang_pendidikan">Jenjang Pendidikan :</label>
                            <div class="form-group">
                                <div class="row">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">f. Kebutuhan Khusus</label> --}}
                                <input type="text" name="kebutuhan_khusus_ibu" placeholder="Kebutuhan Khusus" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- <label for="nis">g. HP *)</label> --}}
                                <input type="text" name="hp_ibu" placeholder="Hp *)" class="form-control">
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
                                <input type="text" name="berat_badan" placeholder="Berat Badan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Tinggi Badan</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="tinggi_badan" placeholder="Tinggi Badan" class="form-control">
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
                                    <div class="col-md-4">                                        
                                        <input type="radio" name="jarak_rumah" value="Kurang dari 1 Kilometer"> Kurang dari 1 Kilometer<br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="jarak_rumah" value="Lebih dari 1 Kilometer"> Lebih dari 1 Kilometer<br>
                                    </div>    
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
                                <input type="text" name="waktu_tempuh" placeholder="Waktu Tempuh ke Sekolah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="nis">Jumlah Saudara Kandung</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="jumlah_saudara_kandung" placeholder="Jumlah Saudara Kandung" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-right">
                                <button class="btn btn-clock btn-primary" type="submit"><span class="fa fa-check"></span> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
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