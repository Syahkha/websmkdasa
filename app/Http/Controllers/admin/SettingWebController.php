<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function setweb(){

        $data=DB::select('select * from setting');
       
            return view('user.setting_web',['data'=>$data]);
        
    }

    function upset(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'kontak1'=>'required',
            'kontak2'=>'required',
            'alamat'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'twitter'=>'required',
            'youtube'=>'required',
            'psb'=>'required',
        ]);
        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $kontak1=$request->kontak1;
        $kontak2=$request->kontak2;
        $alamat=$request->alamat;
        $provinsi=$request->provinsi;
        $kota=$request->kota;
        $facebook=$request->facebook;
        $instagram=$request->instagram;
        $twitter=$request->twitter;
        $youtube=$request->youtube;
        $psb=$request->psb;

        //update
        $update=DB::update("update setting set webname=?,email=?,kontak1=?,kontak2=?,alamat=?,provinsi=?,kota=?,facebook=?,instagram=?,twitter=?,youtube=?,psb=? where id=?",
        [$name,$email,$kontak1,$kontak2,$alamat,$provinsi,$kota,$facebook,$instagram,$twitter,$youtube,$psb,$id]);
    
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        
    }
}
