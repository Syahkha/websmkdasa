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
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
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
                                            <a href="#" class="btn btn-sm btn-danger"><span
                                                    class="fa fa-trash"></span></a>
                                            <button type="button" data-toggle="modal" data-target="#l{{$item->id}}"
                                                class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button>
                                        </td>

                                    </tr>
                                </tbody>
                                <div class="modal fade" id="l{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{'update-kategori'}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{$item->id}}" name="id">
                                                        <input type="text" name="kategori" value="{{$item->kategori}}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group form-check">
                                                        @if ($item->edit=="Y")
                                                        <input type="checkbox" name="menu" value="N"
                                                            class="form-check-input" id="">
                                                        <div class="form-check-label">Tandai Sebagai Menu</div>
                                                        @else
                                                        <input type="checkbox" checked="true" name="menu" value="N"
                                                            class="form-check-input" id="">
                                                        <div class="form-check-label">Tandai Sebagai Menu</div>
                                                        @endif

                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="{{url('input-kategori')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" placeholder="Isi Kategori"
                                        required>

                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" name="menu" value="N" class="form-check-input"
                                        id="exampleCheck1">
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
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        TULIS ARTIKEL
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                <div class="card-body">
                    <form method="POST" action="{{url('post-artikel')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" readonly name="id" value="{{Auth::user()->id}}"
                                        class="form-control">
                                    <label for="judul">Judul Posting</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Artikel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Pilih Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul">Upload Gambar Cover</label>
                                    <input type="file" name="gambar" class="form-control" id="file">
                                </div>
                            </div>
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label for="judul">Isi Artikel</label>
                                    <textarea class="form-control" id="editor1" name="isi" rows="30"
                                        cols="80"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> <span
                                            class="fa fa-fw fa-check"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script>
tinymce.init({
        selector: 'textarea#editor1',
        height: 300,
        relative_urls: false,        
        remove_script_host : false,
        menubar: false,
        plugins: [
            'advlist  autolink lists link image charmap print preview anchor textcolor','table',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code wordcount',
            'responsivefilemanager code '
        ],
        toolbar: 'undo redo |table formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat image responsivefilemanager code | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
       
        external_filemanager_path:"{!! str_finish(asset('/filemanager'),'/') !!}",
        filemanager_title:"Data Manager" ,
        external_plugins:{ "filemanager" : "{{ asset('/filemanager/plugin.min.js') }}"} 
    });
</script>
@endsection
