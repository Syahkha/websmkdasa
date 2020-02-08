<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Kategori;
use App\Model\SubKategori;

class frontendController extends Controller
{

    function index(){
        $websetting=DB::table('setting')->get();
        $menu=Kategori::where('edit', 'N')->get();
        $galeri=DB::table('galeri')->get();
        $studi=DB::table('jurusan')->get();


        return view('front.konten',
            ['setting'=>$websetting, 'galeri'=>$galeri,'studi'=>$studi],
            ['menu'=>$menu]
           
        );
    }
    function blog(){
        $websetting=DB::table('setting')->get();
        $menu=Kategori::where('edit', 'N')->get();
        $kategori=Kategori::get();
     
        $artikel = DB::table('artikel')
            ->join('users', 'users.id', '=', 'artikel.id_admin')
            ->select('artikel.*', 'users.name')
            ->get();
        
        $bacajuga = DB::table('artikel')
        ->inRandomOrder()
        ->limit(4)
            ->get();

       


        return view('front.user.blog',[
            'setting'=>$websetting,
            'artikel'=>$artikel,
            'menu'=>$menu,
            'kategori'=>$kategori,
            'bacajuga' =>$bacajuga
        ]);
    }

    function blogs($kurl){
        
    }
    
}
