<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function user(){
        $id=Auth::user()->id;
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('user.setting_user',['data'=>$data]);
        }
    }
}
