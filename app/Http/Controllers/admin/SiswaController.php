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
    }

    function inputSiswa(){
        return view('admin.siswa.input_siswa');
    }

    function dataSiswa(){
        return view('admin.siswa.siswa');
    }

    function dataSiswi(){
        return view('admin.siswa.siswi');
    }
}
