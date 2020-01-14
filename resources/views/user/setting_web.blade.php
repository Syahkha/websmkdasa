@extends('layouts.index')
@section('title')
Setting Web
@endsection
@section('konten')
<div class="container-fluid">
<div class="card">
            <div class="card-header">
                <div class="card-title">Setting Website</div>
            </div>
            <div class="card-body">

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

                <form action="{{url('update-setting')}}" method="post">                 
                @csrf 
                @foreach ($data as $item)      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <label for="">Nama Web</label>
                                <input placeholder="Isikan Nama Web" value="{{$item->webname}}" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>      
                        <div class="col-md-6">
                            <div class="form-group">                              
                                <label for="">PPDB</label>
                                <select name="psb" id="" class="form-control">
                                   @if ($item->psb=="Y")
                                       <option value="{{$item->psb}}">Aktif</option>
                                   @else
                                   <option value="{{$item->psb}}">Non-Aktif</option>
                                   @endif
                                    
                                    <option value="Y">Aktif</option>
                                    <option value="N">Non-Aktif</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input placeholder="Isi Email" value="{{$item->email}}" type="text" name="email" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input placeholder="Isi Alamat" value="{{$item->alamat}}" type="text" name="alamat" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kontak 1</label>
                                <input placeholder="Isikan Kontak 1" value="{{$item->kontak1}}" type="text" name="kontak1" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input placeholder="Isi Kota" value="{{$item->kota}}" type="text" name="kota" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kontak 2</label>
                                <input placeholder="Isi Kontak 2" value="{{$item->kontak2}}" type="text" name="kontak2" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <input placeholder="Isi Provinsi" value="{{$item->provinsi}}" type="text" name="provinsi" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input placeholder="Isi Facebook" value="{{$item->facebook}}" type="text" name="facebook" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input placeholder="Isi Logo" value="{{$item->logo}}" type="file" name="logo" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input placeholder="Isi Instagram" value="{{$item->instagram}}" type="text" name="instagram" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">icon</label>
                                <input placeholder="Isi Icon" value="{{$item->icon}}" type="file" name="icon" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input placeholder="Isi Twitter" value="{{$item->twitter}}" type="text" name="twitter" id="" class="form-control">
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Banner</label>
                                <input placeholder="Isi Banner" value="{{$item->banner}}" type="file" name="banner" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Youtube</label>
                                <input placeholder="Isi Youtube" value="{{$item->youtube}}" type="text" name="youtube" id="" class="form-control">
                            </div>
                        </div>  
                        <hr> 
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary "> Simpan</button>
                        </div>                      
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
</div>
@endsection