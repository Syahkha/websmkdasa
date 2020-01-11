<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class user extends Controller
{
    function user(){
        $id=Auth::user()->id;
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('user.setting_user',['data'=>$data]);
        }
    }
}
