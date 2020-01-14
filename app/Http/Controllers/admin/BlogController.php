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

        //Definisikan Path
        $this->middleware('auth');
        $this->path = public_path('/source');
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

    function updateKategori(Request $request){
        $request->validate([
            'id'=>'required',
            'kategori'=>'required',
        ]);
        $id=$request->id;
        $kategori=$request->kategori;
        if($request->menu=="N"){
            $data=DB::update('update kategori set kategori=?,edit=? where id=?',[$kategori,"N",$id]);
        }else{
            $data=DB::update('update kategori set kategori=?,edit=? where id=?',[$kategori,"Y",$id]);
        }
        if($data){
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
        }else{
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
        }


    }
    function inputArtikel(Request $request){

        if($request->hasFile('gambar')){
            $img=$request->file('gambar');
            $nama=time().'-'.$img->getClientOriginalName();
            $path=$this->path;
            $img->move($path,$nama);
            $ju=$request->judul;
            $jurl=str_replace(' ','-',$ju);
            $is=$request->isi;
            $tgl=date('d-m-Y H:i:s');
            $ida=$request->id;
            $idk=$request->kategori;
            $data=DB::insert('insert into artikel(judul,judul_url,artikel,tanggal,id_admin,gambar,idkategori) values(?,?,?,?,?,?,?)',[$ju,$jurl,$is,$tgl,$ida,$nama,$idk]);
            if($data){
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Artikel Berhasil Disimpan');
            }else{
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Artikel Gagal Disimpan');
            }
        }else{
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Artikel Gagal Disimpan');
        }        

    }
    function dataPenulisan(){
        return view('admin.blog.data_tulis');
    }
}
