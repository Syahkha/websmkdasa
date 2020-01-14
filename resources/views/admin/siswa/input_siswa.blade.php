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
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Data Orang Tua / Wali
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div clas="form-group">
                        <div class="mb-4 btn btn-outline-info" data-toggle="modal" data-target="#addw"><i class="fa fa-plus"></i>Tambah Data Wali</div>
                        <a href="{{url('download-excel')}}" class="mb-4 btn btn-outline-info"><i class="fa fa-id-badge"></i> Download Data Wali</a>
                    </div>
                    <div class="modal-fade" id="addw">
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
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Input Siswa
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  
</div>

    </div>
      
    
@endsection