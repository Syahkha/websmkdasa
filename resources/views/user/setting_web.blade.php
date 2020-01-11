@extends('layouts.index')
@section('title')
Setting Web
@endsection
@section('content')
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
                                <input type="hidden" name="id" value="">
                                <label for="">Nama Web</label>
                                <input placeholder="Isikan Nama Web" value="" type="text" name="name" id="" class="form-control">
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