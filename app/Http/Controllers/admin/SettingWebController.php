<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Model\SettingModel;

class SettingWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->path = public_path('/source');
        $this->banpath=public_path('/source/banner');
        $this->icopath=public_path('/source/icon');
        $this->logpath=public_path('/source/logo');

    }
    public function setweb(){

        $data=DB::select('select * from setting');
       
            return view('user.setting_web',['data'=>$data]);
        
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
        $logpath=$this->logpath;
        $logo->move($logpath,$nl);
        //icon
        $icon=$request->file('icon');
        $nc=$request->file('icon')->getClientOriginalName();
        $icopath=$this->icopath;
        $icon->move($icopath,$nc);

        $setweb=DB::insert('insert into setting (webname,email,kontak1,kontak2,alamat,provinsi,kota,facebook,instagram,twitter,youtube,psb,profil,banner,logo,icon,id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$name,$email,$kontak1,$kontak2,$alamat,$provinsi,$kota,$facebook,$instagram,$twitter,$youtube,$psb,$profil,$nama,$nl,$nc,$id]);
        if($setweb){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
        }
    }

    function updateSetting(Request $request){

        if($request->hasFile('banner')){
            File::delete('source/banner/'.$request->edit_bannerlama);
            $nameland=$request->file('banner')->getClientOriginalName();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('source/banner');
            $request->file('banner')->move($destination,$finalname);
            $id=$request->id;
            $data = SettingModel::where('id',$id)
            ->update([
                'banner'=>$finalname
                
            ]);

            if($data){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
        }elseif($request->hasFile('logo')){
            //logo
            File::delete('source/logo/'.$request->logoLama);
            $nameland=$request->file('logo')->getClientOriginalName();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace('','-',$lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('source/logo');
            $request->file('logo')->move($destination,$finalname);
            $id=$request->id;

            $data = SettingModel::where('id',$id)
            ->update([
                'logo'=>$finalname
            ]);

            if($data){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
            
        }elseif($request->hasFile('icon')){
            //icon
            File::delete('source/icon/'.$request->iconLama);
            $nameland=$request->file('icon')->getClientOriginalName();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace('','-',$lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('source/icon');
            $request->file('icon')->move($destination,$finalname);
            $id=$request->id;

            $data = SettingModel::where('id',$id)
            ->update([
                'icon'=>$finalname
            ]);

            if($data){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }
        }else{
            $id=$request->id;
            $data = SettingModel::where('id',$id)
            ->update([
                'webname'=>$request->name,
                'profil'=>$request->profil,
                'email'=>$request->email,
                'kontak1'=>$request->kontak1,
                'kontak2'=>$request->kontak2,
                'alamat'=>$request->alamat,
                'kota'=>$request->kota,
                'provinsi'=>$request->provinsi,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
                'psb'=>$request->psb
            ]);

            if($data){
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
            }

        }       
    }
}
