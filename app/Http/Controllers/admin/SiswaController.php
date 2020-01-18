<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->path = public_path('source/psb');
    }

    function inputSiswa(){
        $data=DB::select('select * from siswa');
        $ort=DB::select('select * from orang_tua');
        return view('admin.siswa.input_siswa',['siswa'=>$data,'ortu'=>$ort]);
    }

    function dataSiswa(){
        return view('admin.siswa.siswa');
    }

    function dataSiswi(){
        return view('admin.siswa.siswi');
    }
}
