@extends('layouts.index')
@section('title')
    Input Siswa
@endsection
@section('css')
<link rel="stylesheet" href="">
@endsection
@section('konten')
    <div class="container-fluid">

    <div class="accordion" id="accordionExample">
  <div class="card shadow mb-3">
  <a href="#collapseOne" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <div class="row">
                <div class="col font-weight-bold">
                    Data Orang Tua / Wali
                </div>
            </div>
        </a>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div clas="form-group">
                        <div class="mb-4 btn btn-outline-info" data-toggle="modal" data-target="#addw"><i class="fa fa-plus"></i>Tambah Data Wali</div>
                        <a href="{{url('download-excel')}}" class="mb-4 btn btn-outline-info"><i class="fa fa-id-badge"></i> Download Data Wali</a>
                    </div>
                    <div class="modal fade" id="addw">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title">
                                        <h5>Tambah Data Wali</h5>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{url('')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nis">No KK</label>
                                                    <input type="number" placeholder="Isikan No KK" name="kk" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Nama Ayah/Wali</label>
                                                    <input type="text" placeholder="Isikan Nama Ayah/Wali" name="ayah" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">No KTP Ayah/Wali</label>
                                                    <input type="number" placeholder="Isikan No KTP Ayah/Wali" name="ktpa" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">Pendidikan Ayah/Wali</label>
                                                    <input type="text" placeholder="Isikan Pendidikan Ayah/Wali" name="pda" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">Perkerjaan Ayah/Wali</label>
                                                    <input type="text" placeholder="Isikan Pekerjaan Ayah/Wali" name="pka" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Nama Ibu/Wali</label>
                                                    <input type="text" placeholder="Isikan Nama Ibu/Wali" name="ibu" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">No KTP Ibu/Wali</label>
                                                    <input type="number" placeholder="Isikan KTP Ibu/Wali" name="ktpi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">Pendidikan Ibu/Wali</label>
                                                    <input type="text" placeholder="Isikan Pendidikan Ibu/Wali" name="pdi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">Pekerjaan Ibu/Wali</label>
                                                    <input type="text" placeholder="Isikan Pekerjaan Ibu/Wali" name="pkbu" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">No Telepon Wali</label>
                                                    <input type="number" maxlength="13" placeholder="Isikan Nomor Telepon Contoh (085xxx)" name="telp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Alamat Wali</label>
                                                    <input type="text" placeholder="Isikan Alamat Wali" name="alamat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Desa</label>
                                                    <input type="text" placeholder="Isikan Desa Wali" name="des" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Kecamatan</label>
                                                    <input type="text" placeholder="Isikan Kecamatan Wali" name="kec" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Kota</label>
                                                    <input type="text" placeholder="Isikan Kota Wali" name="kot" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis">Provinsi</label>
                                                    <input type="text" placeholder="Isikan Provinsi Wali" name="prov" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nis">Penghasilan Wali</label>
                                                    <input type="text" id="gj" placeholder="Isikan Penghasilan" onkeyup="decimal()" name="pgh" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-square-o"></span>Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($ortu as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->no_kk}}</td>
                                    <td>{{$item->ayah}}</td>
                                    <td>{{$item->ibu}}</td>
                                    <td>{{$item->telepon_wali}}</td>
                                    <td>{{$item->alamat_wali}}</td>
                                    <td>
                                        <a href="{{url('hapus-wali').'/'.$item->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#mdw"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="mdw">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <h5>Edit Data Ortu</h5>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form method="POST" action="{{url('update-wali')}}">
                                                        @csrf
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                            <input type="hidden" readonly name="id" value="{{$item->id}}" class="form-control">
                                                                <label for="nis">No KK</label>
                                                                <input type="number" placeholder="Isikan No KK" value="{{$item->no_kk}}" name="kk" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Nama Ayah/Wali</label>
                                                                <input type="text" placeholder="Isikan Nama Ayah/Wali" value="{{$item->ayah}}" name="ayah" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">No KTP Ayah/Wali</label>
                                                                <input type="number" placeholder="Isikan No KTP Ayah/Wali" value="{{$item->ktp_ayah}}" name="ktpa" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">Pendidikan Ayah/Wali</label>
                                                                <input type="text" placeholder="Isikan Pendidikan Ayah/Wali" value="{{$item->pendidikan_ayah}}" name="pda" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">Pekerjaan Ayah/Wali</label>
                                                                <input type="text" placeholder="Isikan Pekerjaan Ayah/Wali" value="{{$item->pekerjaan_ayah}}" name="pka" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Nama Ibu/Wali</label>
                                                                <input type="text" placeholder="Isikan Nama Ibu/Wali" value="{{$item->ibu}}" name="ibu" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">No KTP Ibu/Wali</label>
                                                                <input type="number" placeholder="Isikan No KTP Ibu/Wali" value="{{$item->ktp_ibu}}" name="ktpi" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">Pendidikan Ibu/Wali</label>
                                                                <input type="text" placeholder="Isikan Pendidikan Ibu/Wali" value="{{$item->pendidikan_ibu}}" name="pdi" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nis">Pekerjaan Ibu/Wali</label>
                                                                <input type="text" placeholder="Isikan Pekerjaan Ibu/Wali" value="{{$item->pekerjaan_ibu}}" name="pkbu" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">No Telepon Wali</label>
                                                                <input type="text" value="{{$item->telepon_wali}}" placeholder="Isikan Nomor Telepon Contoh (085xxx)" name="telp" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Alamat Wali</label>
                                                                <input type="text" value="{{$item->alamat_wali}}" placeholder="Isikan Alamat Wali" name="alamat" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Desa</label>
                                                                <input type="text" value="{{$item->desa}}" placeholder="Isikan Desa Wali" name="desa" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Kecamatan</label>
                                                                <input type="text" value="{{$item->kec}}"  placeholder="Isikan Kecamatan Wali" name="kec" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Kota</label>
                                                                <input type="text" value="{{$item->kota}}"  placeholder="Isikan Kota Wali" name="kot" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Provinsi</label>
                                                                <input type="text" value="{{$item->prov}}"  placeholder="Isikan Provinsi Wali" name="prov" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nis">Penghasilan</label>
                                                                <input type="text" id="gj" value="{{$item->penghasilan_wali}}"   placeholder="Isikan Penghasilan" onkeyup="decimal()" name="pgh" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-outline-primary"><span class="fa fa-check-square-o"></span> Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
      </div>
    </div>
  </div>
  <div class="card shadow">
  <a href="#collapseTwo" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <div class="row">
                <div class="col font-weight-bold">
                    Input Siswa
                </div>
            </div>
        </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  
</div>

    </div>
      
    
@endsection