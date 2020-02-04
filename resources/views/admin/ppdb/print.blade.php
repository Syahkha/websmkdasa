<?php
    include('admin/css/date_indonesia.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min1.css')}}">
    <title>Print Formulir</title>
</head>
<body>
    <div class="container">
        <div class="col col-md-12">
            <center><img src="{{asset('depan').'/'.'head.png'}}" alt=""></center><br>
            <center><h1>Data Pribadi Siswa</h1></center><br>
            @foreach ($print as $item)
                <div class="col col-md-12">
                    <div class="container">
                        <div class="row">
                            <div style="text-align: right" class="col-md-0">
                                <label for="" text-align="right">1.</label><br>
                                <label for="" text-align="right">2.</label><br>
                                <label for="" text-align="right">3.</label><br>
                                <label for="" text-align="right">4.</label><br>
                                <label for="" text-align="right">5.</label><br>
                                <label for="" text-align="right">6.</label><br>
                                <label for="" text-align="right">7.</label><br>
                                <label for="" text-align="right">8.</label><br>
                                <label for="" text-align="right">9.</label><br>
                                <label for="" text-align="right">10.</label><br>
                                <label for="" text-align="right">11.</label><br>
                                <label for="" text-align="right">12.</label><br>
                                <label for="" text-align="right">13.</label><br>
                                <label for="" text-align="right">14.</label><br>
                                <label for="" text-align="right">15.</label><br>
                                <label for="" text-align="right">16.</label><br>
                                <label for="" text-align="right">17.</label><br>
                                <label for="" text-align="right">18.</label><br>
                                <label for="" text-align="right">19.</label><br>
                                <label for="" text-align="right">20.</label><br>
                                <label for="" text-align="right">21.</label><br>
                                <label for="" text-align="right">22.</label><br>
                                <label for="" text-align="right">23.</label><br>
                                <label for="" text-align="right">24.</label><br>
                                <label for="" text-align="right">25.</label><br>
                                <label for="" text-align="right"><b>26.</b></label><br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4">
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-0">
                                                <label for="">a.</label><br>
                                                <label for="">b.</label><br>
                                                <label for="">c.</label><br>
                                                <label for="">d.</label><br>
                                                <label for="">e.</label><br>
                                                <label for="">f.</label><br>
                                                <label for="">g.</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="" text-align="right"><b>27.</b></label><br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4">
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-0">
                                                <label for="">a.</label><br>
                                                <label for="">b.</label><br>
                                                <label for="">c.</label><br>
                                                <label for="">d.</label><br>
                                                <label for="">e.</label><br>
                                                <label for="">f.</label><br>
                                                <label for="">g.</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="" text-align="right">28.</label><br>
                                <label for="" text-align="right">29.</label><br>
                                <label for="" text-align="right">30.</label><br>
                                <label for="" text-align="right">31.</label><br>
                                <label for="" text-align="right">32.</label><br>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label for="">Hari, Tanggal</label><br>
                                <label for="">Nomor Pendaftaran</label><br>
                                <label for="">Nama Lengkap</label><br>
                                <label for="">Jenis Kelamin</label><br>
                                <label for="">NISN </label><br>
                                <label for="">Tempat Lahir</label><br>
                                <label for="">Tanggal Lahir</label><br>
                                <label for="">NIK *)</label><br>
                                <label for="">Agama</label><br>
                                <label for="">Kebutuhan Khusus</label><br>
                                <label for="">Alamat</label><br>
                                <label for="">RT</label><br>
                                <label for="">RW</label><br>
                                <label for="">Dusun</label><br>
                                <label for="">Kelurahan</label><br>
                                <label for="">Kecamatan</label><br>
                                <label for="">Kode Pos</label><br>
                                <label for="">Jenis Tinggal</label><br>
                                <label for="">Alat Transportasi</label><br>
                                <label for="">Telepon *)</label><br>
                                <label for="">HP *)</label><br>
                                <label for="">E-Mail</label><br>
                                <label for="">No. Peserta UN</label><br>
                                <label for="">Penerima KIP</label><br>
                                <label for="">No. KIP</label><br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4">
                                        <label for=""><b>Data Ayah</b></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Nama</label><br>
                                                <label for="">Tahun Lahir</label><br>
                                                <label for="">Pendidikan</label><br>
                                                <label for="">Pekerjaan</label><br>
                                                <label for="">Penghasilan</label><br>
                                                <label for="">Kebutuhan Khusus</label><br>
                                                <label for="">HP *)</label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-4">
                                        <label for=""><b>Data Ibu</b></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Nama</label><br>
                                                <label for="">Tahun Lahir</label><br>
                                                <label for="">Pendidikan</label><br>
                                                <label for="">Pekerjaan</label><br>
                                                <label for="">Penghasilan</label><br>
                                                <label for="">Kebutuhan Khusus</label><br>
                                                <label for="">HP *)</label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Berat Badan</label><br>
                                <label for="">Tinggi Badan</label><br>
                                <label for="">Jarak Rumah ke Sekolah</label><br>
                                <label for="">Waktu Tempuh ke Sekolah</label>
                                <label for="">Jumlah Saudara Kandung</label><br>
                            </div>
                            <div class="col-md-6">
                                <label for="">: <?php
                                    $tanggal = time();
                                        echo ''.indonesian_date($tanggal, 'l, d/F/Y'); 
                                    ?></label><br>
                                <label for="">: {{$item->no_pendaftaran}}</label><br>
                                <label for="">: {{$item->nama_lengkap}}</label><br>
                                <label for="">: {{$item->gender}}</label><br>
                                <label for="">: {{$item->nisn}}</label><br>
                                <label for="">: {{$item->tempat_lahir}}</label><br>
                                <label for="">: {{$item->ttl}}</label><br>
                                <label for="">: {{$item->nik}}</label><br>
                                <label for="">: {{$item->agama}}</label><br>
                                <label for="">: {{$item->kebutuhan_khusus}}</label><br>
                                <label for="">: {{$item->alamat}}</label><br>
                                <label for="">: {{$item->rt}}</label><br>
                                <label for="">: {{$item->rw}}</label><br>
                                <label for="">: {{$item->dusun}}</label><br>
                                <label for="">: {{$item->kelurahan}}</label><br>
                                <label for="">: {{$item->kecamatan}}</label><br>
                                <label for="">: {{$item->kode_pos}}</label><br>
                                <label for="">: {{$item->jenis_tinggal}}</label><br>
                                <label for="">: {{$item->alat_transportasi}}</label><br>
                                <label for="">: {{$item->telp}}</label><br>
                                <label for="">: {{$item->hp}}</label><br>
                                <label for="">: {{$item->email}}</label><br>
                                <label for="">: {{$item->no_peserta_un}}</label><br>
                                <label for="">: {{$item->penerima_kip}}</label><br>
                                <label for="">: {{$item->no_kip}}</label><br>
                                <label for="">:</label><br>
                                <label for="">: {{$item->nama_ayah}}</label><br>
                                <label for="">: {{$item->tahun_lahir_ayah}}</label><br>
                                <label for="">: {{$item->jenjang_pendidikan_ayah}}</label><br>
                                <label for="">: {{$item->pekerjaan_ayah}}</label><br>
                                <label for="">: {{$item->penghasilan_ayah}}</label><br>
                                <label for="">: {{$item->kebutuhan_khusus_ayah}}</label><br>
                                <label for="">: {{$item->no_hp_ayah}}</label><br>
                                <label for="">:</label><br>
                                <label for="">: {{$item->nama_ibu}}</label><br>
                                <label for="">: {{$item->tahun_lahir_ibu}}</label><br>
                                <label for="">: {{$item->jenjang_pendidikan_ibu}}</label><br>
                                <label for="">: {{$item->pekerjaan_ibu}}</label><br>
                                <label for="">: {{$item->penghasilan_ibu}}</label><br>
                                <label for="">: {{$item->kebutuhan_khusus_ibu}}</label><br>
                                <label for="">: {{$item->no_hp_ibu}}</label><br>
                                <label for="">: {{$item->berat_badan}}</label><br>
                                <label for="">: {{$item->tinggi_badan}}</label><br>
                                <label for="">: {{$item->jarak_rumah_sekolah}}</label><br>
                                <label for="">: {{$item->waktu_tempuh}}</label><br>
                                <label for="">: {{$item->jumlah_saudara}}</label><br>
                                <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <p>Keterangan :</p>
                                </div>
                                <br>
                                <div class="row">
                                    <p>Formulir pendaftaran sesuai dengan data isian DAPODIK. Jadi, supaya diisi dengan lengkap.</p>
                                </div>
                                <div class="row">
                                    <p>Tulis dengan huruf kapital!</p>
                                </div>
                                <p>*) Setiap empat digit angka dipisahkan dengan garis hubung [-].<p>
                                    <p>**) Coret yang tidak perlu!</p>
                            </div>
                            <div class="col-md-4">
                                <br><br><br><p align="center">Panitia PPDB</p>
                                <br><br><br><br><p align="center">________________________________________________</p>
                                                <p>NIP.</p><br>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script>   
       $(document).ready(function(){
            window.print();
        })
        window.onafterprint = function(){
            history.go(-1);
        }
    </script>
</body>
</html>