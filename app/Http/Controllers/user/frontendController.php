<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use App\Model\Kategori;
=======
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa

class frontendController extends Controller
{

    function index(){
        $websetting=DB::table('setting')->get();
<<<<<<< HEAD
        $menu=Kategori::where('edit', 'N')->get();
        $galeri=DB::table('galeri')->get();
        $studi=DB::table('jurusan')->get();
        $post=DB::table('artikel')
        ->join('users', 'users.id', '=', 'artikel.id_admin')
        ->select('artikel.*', 'users.name')
        ->orderBy('tanggal', 'desc')->take(2)->get();


        return view('front.konten',
            ['setting'=>$websetting, 'galeri'=>$galeri,'studi'=>$studi,'post'=>$post],
            ['menu'=>$menu]
           
        );
=======
        return view('front.konten',[
            'setting'=>$websetting
        ]);
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
    }
    function blog(){
        $websetting=DB::table('setting')->get();
     
        $artikel = DB::table('artikel')
            ->join('users', 'users.id', '=', 'artikel.id_admin')
            ->select('artikel.*', 'users.name')
<<<<<<< HEAD
            ->orderBy('tanggal', 'desc')
            ->paginate(3);
        
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
    	->limit(4)
    	->get();

    	$kategori = DB::table('kategori')->get();
    	$websetting = DB::table('setting')->limit(1)->get();
        $menu=Kategori::where('edit', 'N')->get();

    	return view('front.user.detail_artikel',[
            'setting'=>$websetting,
            'menu'=>$menu,
=======
            ->get();

        return view('front.user.blog',[
            'setting'=>$websetting,
>>>>>>> parent of dbb0638... Merge branch 'master' of https://github.com/Syahkha/websmkdasa
            'artikel'=>$artikel
        ]);
    }

    function blog_kategori($url_kategori,Request $request)
    {
        $websetting=DB::table('setting')->get();
        $id=$request->id;
        $artikel = DB::table('artikel')
        ->leftjoin('users', 'users.id', '=', 'artikel.id_admin')
        ->select('artikel.*', 'users.*')
        ->where('idkategori',$url_kategori)
        ->orderBy('tanggal', 'desc')
        ->paginate(3);
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
        $bacajuga = DB::table('artikel')
        ->inRandomOrder()
        ->limit(4)
            ->get();

       


    	return view('front.user.kategori_url',[
            'setting'=>$websetting,
            'menu'=>$menu,
            'artikel'=>$artikel,
            'kategori'=>$kategori,
            'bacajuga' =>$bacajuga

        ]);
    }

    public function cariartikel(Request $request){
    	$kategori = DB::table('kategori')
    	->get();
    	$nav = DB::table('kategori')
        ->where(['edit'=>'N',"show"=>"Y"])
        ->get();
        $artikel = DB::table('artikel')
        ->join('users', 'users.id', '=', 'artikel.id_admin')
    	->where('judul','like','%'.$request->cari.'%')
    	->get();
        
        $menu=Kategori::where('edit', 'N')->get();
        $bacajuga = DB::table('artikel')
        ->inRandomOrder()
        ->limit(4)
            ->get();
        $websetting = DB::table('setting')
    	->limit(1)
    	->get();
    	
    	return view ('front/user/hasilcari',[
            'cari'=>$request->cari,
    		'setting'=>$websetting,
            'artikel'=>$artikel,
            'kategori'=>$kategori,
            'menu'=>$menu,
            'bacajuga' =>$bacajuga,
            'nav' =>$nav
    	]);
    }
    
}
