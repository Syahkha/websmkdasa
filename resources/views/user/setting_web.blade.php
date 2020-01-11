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
                <form action="#" method="post"  >                  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Nama Web</label>
                                <input placeholder="Isikan Nama Web" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>      
                        <div class="col-md-6">
                            <div class="form-group">                              
                                <label for="">PPDB</label>
                               <select name="psb" id="" class="form-control">
                                       <option value=>Aktif</option>
                                   <option value="">Non-Aktif</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Email</label>
                                <input placeholder="Isi Email" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Alamat</label>
                                <input placeholder="Isi Alamat" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Kontak 1</label>
                                <input placeholder="Isikan Kontak 1" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Kota</label>
                                <input placeholder="Isi Kota" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Kontak 2</label>
                                <input placeholder="Isi Kontak 2" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Provinsi</label>
                                <input placeholder="Isi Provinsi" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Facebook</label>
                                <input placeholder="Isi Facebook" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Logo</label>
                                <input placeholder="Isi Logo" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Instagram</label>
                                <input placeholder="Isi Instagram" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">icon</label>
                                <input placeholder="Isi Icon" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Twitter</label>
                                <input placeholder="Isi Twitter" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Banner</label>
                                <input placeholder="Isi Banner" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <label for="">Youtube</label>
                                <input placeholder="Isi Youtube" value="" type="text" name="name" id="" class="form-control">
                            </div>
                        </div>  
                        <hr> 
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary "> Simpan</button>
                        </div>                      
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection