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



        return view('front.konten',
            ['setting'=>$websetting],
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

    function detail_artikel($judul)
    {
        $websetting=DB::table('setting')->get();
        
        $artikel=DB::table('artikel')
        ->join('users', 'users.id', '=', 'artikel.id_admin')
        ->select('artikel.*', 'users.name')
    	->where('judul_url',$judul)
    	->limit(1)
    	->get();
        $nav = DB::table('kategori')
        ->where(['edit'=>'N',"show"=>"Y"])
        ->get();
    	$artikellain = DB::table('artikel')
    	->inRandomOrder()
    	->limit(3)
    	->get();

    	$kategori = DB::table('kategori')->get();
    	$websetting = DB::table('setting')->limit(1)->get();
        $menu=Kategori::where('edit', 'N')->get();

    	return view('front.user.detail_artikel',[
            'setting'=>$websetting,
            'menu'=>$menu,
            'artikel'=>$artikel

        ]);
    }
    
}
