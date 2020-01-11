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
    function akun(){
        $id=Auth::user()->id;
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('user.setting_akun',['data'=>$data]);
        }
    }
    function editA(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $id=$request->id;
        $name=$request->name;
        $pass=Hash::make($request->password);
        $email=$request->email;
        if(empty($request->password)){
            $data=DB::update('update users set name=?,email=? where id=?',[$name,$email,$id]);
            if($data){
                return redirect()->action('user\User@akun')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@akun')->with('msg',"Gagal Disimpan");
            }
        }else{
            $data=DB::update('update users set name=?,password=?,email=? where id=?',[$name,$pass,$email,$id]);
            if($data){
                return redirect()->action('user\User@akun')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@akun')->with('msg',"Gagal Disimpan");
            }
        }
    }
}
