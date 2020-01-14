<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function tulis(){
      
            return view('admin.blog.tulis');
    }
    

    function dataPenulisan(){
        return view('admin.blog.data_tulis');
    }
}
