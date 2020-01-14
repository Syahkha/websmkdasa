@extends('layouts.index')
@section('title')
Blog
@endsection
@section('konten')
<div class="container-fluid">
<div class="accordion" id="accordionExample">
  <div class="card">
  
  @if (Session('psn'))
                    <div class="alert alert-primary alert-dismissible" role="alert">
                    <p align="center">{{Session('psn')}}</p>
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
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          KATEGORI
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
         <div class="col-md-6">
         <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; ?>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$no++}}</th>
      <td>{{$item->kategori}}</td>
      <td>
      <a href="#" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                                    <button type="button" data-toggle="modal" data-target="#" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button>
      </td>
      
    </tr>
  </tbody>
  @endforeach
</table>
         </div>
      <div class="col-md-6">
      <form action="{{url('input-kategori')}}" method="post">
      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Kategori</label>
    <input type="text" name="kategori" class="form-control"placeholder="Isi Kategori" required>
   
  </div>
  
  <div class="form-group form-check">
    <input type="checkbox" name="menu" value="N" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Tambahkan Sebagai Menu</label>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
      </div>
      </div>
    
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          TULIS ARTIKEL
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
@section('js')
<script>

</script>
@endsection