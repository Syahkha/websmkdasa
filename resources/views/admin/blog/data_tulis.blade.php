@extends('layouts.index')
@section('title')
Data Tulis
@endsection
@section('konten')
<div class="container-fluid">
    @if (Session('msg'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        <p align="center">{{Session('msg')}}</p>
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
    <div class="card shadow">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data Artikel</h5>
        </div>

        <div class="card-body">
            <table class="table  table-striped table-bordered first">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    <a href="{{url('tulis')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Buat Artikel</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="pull-right mb-3">
                            <form class="form" method="POST" action="{{url('cari-artikel')}}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input required type="text" name="cari" placeholder="Cari Artikel"
                                        class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Posted By</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </div>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($artikel as $post)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$post->judul}}</td>
                        <td>{{$post->tanggal}}</td>
                     
                        <td>{{$post->kategori}}</td>
                        
                        <td>{{$post->name}}</td>
                        <td>
                            <button class="btn btn-sm " data-toggle="modal" data-target="#l{{$post->id}}"><span
                                    data-toggle="tooltip" title="Lihat Artikel" class="fa fa-eye"></span></button>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#p{{$post->id}}"><span data-toggle=" tooltip" title="Edit Artikel"
                                class="fa fa-edit fa-fw"></span></button>
                            <a href="{{url('hapus-artikel').'/'.$post->id}}" class="btn btn-danger btn-sm"
                                data-toggle="tooltip" title="Hapus Artikel"><span class="fa fa-trash"></span></a>
                            @if($post->show=="Y")
                            <a href="{{url('lock-artikel').'/'.$post->id.'/'.'N' }}" class="btn btn-sm btn-default"
                                data-toggle="tooltip" title="Hide/Show   Artikel"><span class="fa fa-unlock"></span></a>
                            @else
                            <a href="{{url('lock-artikel').'/'.$post->id.'/'.'Y' }}" class="btn btn-sm btn-default"
                                data-toggle="tooltip" title="Hide/Show   Artikel"><span class="fa fa-lock"></span></a>
                            @endif
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="l{{$post->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Artikel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea id="txt">{{ $post->artikel }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="p{{$post->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Artikel</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{url('update-artikel')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" readonly name="id" value="{{Auth::user()->id}}"
                                                        class="form-control">
                                                    <input type="hidden" readonly name="idar" value="{{$post->id}}"
                                                        class="form-control">
                                                    <label for="judul">Judul Posting</label>
                                                    <input type="text" value="{{$post->judul}}" class="form-control"
                                                        name="judul" placeholder="Judul Artikel">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kategori">Pilih Kategori</label>
                                                    <select class="form-control" name="kategori" id="kategori">
                                                        <option selected value="{{$post->id}}">{{$post->kategori}}
                                                        </option>
                                                        @foreach ($kategori as $item)
                                                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="judul">Upload Gambar Cover</label>
                                                    <img src="{{asset('source/artikel').'/'.$post->gambar}}" alt=""
                                                        height="300px" width="50%"><br>
                                                    <input type="hidden" value="{{$post->gambar}}" name="gambarLama"
                                                        class="form-control">
                                                    <input type="file" name="gambar" class="form-control" id="file">
                                                </div>
                                            </div>
                                            <div class="col col-md-12">
                                                <div class="form-group">
                                                    <label for="judul">Isi Artikel</label>
                                                    <textarea class="form-control" id="editor1" name="isi" rows="30"
                                                        cols="100">{{ $post->artikel }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        selector: 'textarea#txt',
        height: 500,
        menubar: false,
        readonly: 1,
        relative_urls: false,
        remove_script_host: false,
    });
    tinymce.init({
        selector: 'textarea#editor1',
        height: 500,
        menubar: false,
        relative_urls: false,
        remove_script_host: false,
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
