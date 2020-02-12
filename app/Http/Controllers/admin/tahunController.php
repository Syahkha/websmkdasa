<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tahunController extends Controller
{
    function tahun(){
        $data=DB::table('tahun')
        ->paginate();
        return view('admin.ppdb.tahun',['th'=>$data]);
    }
}
