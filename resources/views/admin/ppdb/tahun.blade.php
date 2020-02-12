@extends('layouts.index')
@section('title')
    Tahun
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
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Data Siswa</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($th as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->tahun}}</td>
                                    <td width="10px">
                                        <a href="{{url('hapus-tahun').'/'.$item->id}}" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <form action="{{url('s-bayar')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input required type="text"  name="tahun" class="form-control" placeholder="Isikan Tahun Ajar Contoh: 2019/2020">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection