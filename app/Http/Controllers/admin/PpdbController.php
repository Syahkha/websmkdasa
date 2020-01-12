<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PpdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function daftar(){
        return view('admin.ppdb.daftar');
    }
    
    function ppdbSiswa(){
        return view('admin.ppdb.ppdb_siswa');
    }

    function ppdbSiswi(){
        return view('admin.ppdb.ppdb_siswi');
    }
}
