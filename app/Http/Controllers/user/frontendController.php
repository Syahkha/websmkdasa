<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{

    function index(){
        return view('front.index');
    }
    
}
