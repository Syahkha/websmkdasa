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
    $data=DB::select('select * from kategori');
        return view('admin.blog.tulis',['data'=>$data]);
    }
    
    function inputKategori(Request $request){
        $request->validate([
            'kategori'=>'required',
        ]);
        $kategori=$request->kategori;
        if($request->menu=="N"){
            $data=DB::insert('insert into kategori(kategori,edit) values(?,?)',[$kategori,"N"]);
            if($data){
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
            }else{
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
            }
        }else{
            $data=DB::insert('insert into kategori(kategori) values(?)',[$kategori]);
            if($data){
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
            }else{
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
            }
        }

    }

    function dataPenulisan(){
        return view('admin.blog.data_tulis');
    }
}
