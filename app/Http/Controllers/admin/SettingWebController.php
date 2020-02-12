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
        $this->galpath=public_path('/source/galeri');

    }
    public function setweb(){

        $data=DB::select('select * from setting');
        $galeri=DB::table('galeri')->get();
        $studi=DB::table('jurusan')->get();
        return view('user.setting_web',[
            'data'=>$data,
            'galeri'=>$galeri,
            'studi'=>$studi
            ]);
        
    }

    function inputGaleri(Request $request){
        $request->validate([
            'nama_galeri'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $galeri=$request->file('nama_galeri');
        $nama=$request->file('nama_galeri')->getClientOriginalName();
        $path=$this->galpath;
        $galeri->move($path,$nama); 

        $data=DB::table('galeri')->insert([
            ['nama_galeri'=>$nama]
        ]);
        if($data){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
        }
    }

    function hapusGaleri($id_galeri,$nama_galeri){
        File::delete('source/galeri/'.$nama_galeri);
        $data=DB::delete('delete from galeri where id_galeri=?',[$id_galeri]);
        if($data){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Dihapus");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Dihapus");
        }
    }

    function inputStudi(Request $request){
        $studi=$request->studi;
        
        $data=DB::table('jurusan')->insert([
            ['nama_jurusan'=>$studi]
        ]);
        if($data){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
        }
    }
    function updateStudi(Request $request){
        $id=$request->id;
        $nama=$request->nama;
        $data=DB::table('jurusan')
        ->where('id',$id)
        ->update(['nama_jurusan'=>$nama]);
        if($data){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Disimpan");
        }
    }

    function hapusStudi($id){
       
        $data=DB::delete('delete from jurusan where id=?',[$id]);
        if($data){
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Berhasil Dihapus");
        }else{
            return redirect()->action('admin\SettingWebController@setweb')->with('msg',"Gagal Dihapus");
        }
    }

    function inputSetweb(Request $request){
        $request->validate([
            'logo'=>'required|image|mimes:jpg,jpeg,png|max:40096',
            'icon'=>'required|image|mimes:jpg,jpeg,png|max:40096',
            
        ]);
        
        $id=$request->id;
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

        $setweb=SettingModel::insert([
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
            'psb'=>$request->psb,
            'banner'=>$nama,
            'logo'=>$nl,
            'icon'=>$nc,
        ]);
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
