@extends('layouts.index')
@section('title')
    Setting Akun
@endsection
@section('konten')
    <div class="content-wrapper">
        <div class="container-fluid">
            @if(Session('msg'))
                <div class="alert alert-warning alert-dismissable fade-show" role="alert">
                    <p align="center">{{Session('msg')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $er)
                    <ul>
                        <div class="alert alert-warning alert-dismissable fade-show" role="alert">
                            <li>{{$er}}</li>
                            <button class="close" button="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    </ul>
                @endforeach
            @endif
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Setting Akun</h5>
            </div>
        </div>
        </div>
    </div>
@endsection