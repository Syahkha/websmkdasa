<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class frontendController extends Controller
{

    function index(){
        $websetting=DB::table('setting')->get();
        return view('front.index',[
            'setting'=>$websetting
        ]);
    }
    
}
