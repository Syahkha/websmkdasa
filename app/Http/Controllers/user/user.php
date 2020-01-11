<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function user(){
        $id=Auth::name()->id;
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('user.setting_user',['data'=>$data]);
        }
    }
}
