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
     
        $artikel = DB::table('artikel')
            ->join('users', 'users.id', '=', 'artikel.id_admin')
            ->select('artikel.*', 'users.name')
            ->get();

        return view('front.user.blog',[
            'setting'=>$websetting,
            'artikel'=>$artikel
        ]);
    }
    
}
