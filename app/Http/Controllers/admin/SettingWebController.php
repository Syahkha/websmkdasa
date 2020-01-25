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
        $this->path = public_path('/source');
        $this->banpath=public_path('/source/banner');

    }
    public function setweb(){

        $data=DB::select('select * from setting');
       
            return view('user.setting_web',['data'=>$data]);
        
    }

    public function upset(Request $request){
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
        
        if($request->hasFile('banner')) {
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
            $profil=$request->profil;
            
            //banner
            $bn=$request->file('banner');
            $nama=$request->file('banner')->getClientOriginalName();
            $path=$this->banpath;
            $bn->move($path,$nama); 

            //update
            $up=DB::update("update setting set webname=?,email=?,kontak1=?,kontak2=?,fb=?,ig=?,twit=?,alamat=?,kota=?,provinsi=?,yt=?,psb=?,banner=? where id=?",[$nam,$ema,$kt1,$kt2,$fb,$ig,$tw,$al,$kot,$pr,$yt,$psb,$nama,$id]);
            if($up){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
     
        }elseif($request->hasFile('logo')||$request->hasFile('ico')){
            $request->validate([
                'logo'=>'required|image|mimes:jpg,jpeg,png|max:40096',
                'ico'=>'required|image|mimes:jpg,jpeg,png|max:40096',
                
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
            $profil=$request->profil;

            $logo=$request->logo;
            $ico=$request->icon;
            $path=$this->path;
            $lg=$logo->getClientOriginalName();
            $ic=$ico->getClientOriginalName();
            $logo->move($path,$lg);
            $ico->move($path,$ic);

            $update=DB::update("update setting set webname=?,email=?,kontak1=?,kontak2=?,alamat=?,provinsi=?,kota=?,facebook=?,instagram=?,twitter=?,youtube=?,psb=?,profil=?,logo=?,icon=? where id=?",
            [$name,$email,$kontak1,$kontak2,$alamat,$provinsi,$kota,$facebook,$instagram,$twitter,$youtube,$psb,$profil,$lg,$ic,$id]);
            if($update){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
            
        }else{
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
            if($update){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
        }
                
    }

    function inputSetweb(Request $request){
        $request->validate([
            'logo'=>'required|image|mimes:jpg,jpeg,png|max:40096',
            'icon'=>'required|image|mimes:jpg,jpeg,png|max:40096',
            
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
        $profil=$request->profil;
        //banner
        $bn=$request->file('banner');
        $nama=$request->file('banner')->getClientOriginalName();
        $path=$this->banpath;
        $bn->move($path,$nama); 
        //logo
        $logo=$request->file('logo');
        $nl=$request->file('logo')->getClientOriginalName();
        $logo->move($path,$nl);
        //icon
        $icon=$request->file('icon');
        $nc=$request->file('icon')->getClientOriginalName();
        $icon->move($path,$nc);

        $setweb=DB::insert('insert into setting (webname,email,kontak1,kontak2,alamat,provinsi,kota,facebook,instagram,twitter,youtube,psb,profil,banner,logo,icon,id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$name,$email,$kontak1,$kontak2,$alamat,$provinsi,$kota,$facebook,$instagram,$twitter,$youtube,$psb,$profil,$nama,$nl,$nc,$id]);
        if($setweb){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
        }
    }
}
