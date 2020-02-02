@extends('layouts.index')
@section('title')
Blog
@endsection
@section('konten')
<div class="container-fluid">
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
    <!-- KATEGORI -->
    <div class="card shadow mb-3">
        <a href="#collapseOne" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <div class="row">
                <div class="col font-weight-bold">
                    KATEGORI
                </div>
            </div>
        </a>
        <div id="collapseOne" class="collapse">
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
                                        <button type="button" data-toggle="modal" data-target="#l{{$item->id}}"
                                            class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button>
                                        <a href="{{url('hapus-kategori').'/'.$item->id}}"
                                            class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="l{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    <!-- END KATEGORI -->
    <div class="card shadow mb-3">
        <a href="#collapseTwo" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <div class="row">
                <div class="col font-weight-bold">
                    SUB KATEGORI
                </div>
            </div>
        </a>
        <div id="collapseTwo" class="collapse">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Sub Kategori</th>
                                    <th scope="col">Kategori Induk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($dataS as $item)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$item->sub_kategori}}</td>
                                    <td>{{$item->kategori}}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#sub{{$item->id}}"
                                            class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button>
                                        <a href="{{url('hapus-Skategori').'/'.$item->id}}"
                                            class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="sub{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sub Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('update-sub')}}" method="post">
                                                @csrf
                                                <div class="form-group">      
                                                    <select class="form-control" name="idk">
                                                    <option selected="true" disabled="disabled"> Pilih</option>
                                                        @foreach($data as $kat)
                                                        <option value="{{$kat->id}}">{{$kat->kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <input type="hidden" value="{{$item->id}}" name="id">
                                                    <input type="text" name="edit_subkategori"  value="{{$item->sub_kategori}}"
                                                        class="form-control">
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
                        <form action="{{url('sub-kategori')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="subkategori">Kategori Induk</label>
                                <select class="form-control" id="" name="idk">
                                    <option selected="true" disabled="disabled"> Pilih</option>
                                    @foreach($data as $kat)
                                    <option value="{{$kat->id}}">{{$kat->kategori}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Tambah Sub Kategori</label>
                                <input type="text" name="subkategori" class="form-control"
                                    placeholder="Isi Sub Kategori" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- END SUB KATEGORI -->
    <!-- ARTIKEL -->
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Menulis Artikel</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('post-artikel')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" readonly name="id" value="{{Auth::user()->id}}" class="form-control">
                            <label for="judul">Judul Posting</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul Artikel">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                @foreach($dataS as $item)
                                <option value="{{$item->id} }">{{$item->kategori}} -> {{$item->sub_kategori}}</option>
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
                            <textarea class="form-control" id="editor1" name="isi" rows="30" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> <span class="fa fa-fw fa-check"></span>
                                Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END ARTIKEL -->
</div>
@endsection
@section('js')

<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor1',
        height: 300,
        relative_urls: false,
        remove_script_host: false,
        menubar: false,
        plugins: [
            'advlist  autolink lists link image charmap print preview anchor textcolor', 'table',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code wordcount',
            'responsivefilemanager code '
        ],
        toolbar: 'undo redo |table formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat image responsivefilemanager code | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',

        external_filemanager_path: "{!! str_finish(asset('/filemanager'),'/') !!}",
        filemanager_title: "Data Manager",
        external_plugins: {
            "filemanager": "{{ asset('/filemanager/plugin.min.js') }}"
        }
    });

</script>
@endsection
