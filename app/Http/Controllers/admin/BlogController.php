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
    function hapusK($id){
        $data=DB::delete('delete from kategori where id=?',[$id]);
        if($data){
            return redirect()->action('admin\BlogController@dataPenulisan')->with('msg','Data Berhasil dihapus');
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
            $data=DB::insert('insert  into artikel(judul,judul_url,artikel,tanggal,id_admin,gambar,idkategori) values(?,?,?,?,?,?,?)',[$ju,$jurl,$is,$tgl,$ida,$nama,$idk]);
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
        
            $data=DB::table("artikel")
                ->orderBy('tanggal','desc')
                ->join('kategori','kategori.id','=','artikel.idkategori')
                ->join('users','users.id','=','artikel.id_admin')
                ->select(DB::raw('kategori.*,artikel.*,users.name'))
                ->paginate(10);
            $kat=DB::select('select * from kategori');
            return view('admin.blog.data_tulis',[
                'artikel'=>$data,
                'kategori'=>$kat]);
    }
    function lockA($id,$y){
        $data=DB::update('update artikel set artikel.show=? where id=?',[$y,$id]);       
            if($y=="Y"){
                return redirect()->action('admin\BlogController@dataPenulisan')->with('msg','Data Berhasil Ditampilkan');
            }else{
                return redirect()->action('admin\BlogController@dataPenulisan')->with('msg','Data Berhasil Dilock');
            }
    }
    function updateArtikel(Request $request){
        $request->validate([
            'judul'=>'required',
            'kategori'=>'required',
            'gambar'=>'image|mimes:jpg,jpeg,png|max:4096',
            'isi'=>'required',
        ]);
        if($request->hasFile('gambar')){
            $id=$request->idar;
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
            $data=DB::update('update artikel set judul=?,judul_url=?,artikel=?,tanggal=?,id_admin=?,gambar=?,idkategori=? where id=?',[$ju,$jurl,$is,$tgl,$ida,$nama,$idk,$id]);
            if($data){
                return redirect()->action('admin\BlogController@dataPenulisan')->with("msg","Artikel Berhasil Disimpan");
            }else{
                return redirect()->action('admin\BlogController@dataPenulisan')->with("msg","Artikel Gagal Disimpan");
            }
        } else{
            $id=$request->idar;
            $old=$request->old;
            $ju=$request->judul;
            $jurl=str_replace(' ','-',$ju);
            $is=$request->isi;
            $tgl=date('d-m-Y H:i:s');
            $ida=$request->id;
            $idk=$request->kategori;
            $data=DB::update('update artikel set judul=?,judul_url=?,artikel=?,tanggal=?,id_admin=?,gambar=?,idkategori=? where id=?',[$ju,$jurl,$is,$tgl,$ida,$old,$idk,$id]);
            if($data){
                return redirect()->action('admin\BlogController@dataPenulisan')->with("msg","Artikel Berhasil Disimpan");
            }else{
                return redirect()->action('admin\BlogController@dataPenulisan')->with("msg","Artikel Gagal Disimpan");
            }
        }     
    }
    function hapusA($id){
        $data=DB::delete('delete from artikel where id=?',[$id]);
        if($data){
            return redirect()->action('admin\BlogController@dataPenulisan')->with('msg','Data Berhasil dihapus');
        }
    }
    function cari(Request $request){
        $request->validate([
            'cari'=>'required',
        ]);
        $cari=$request->cari;
        if(empty($cari)){

        }else{
        //$data=DB::select("select * from artikel where judul like '%?%'  or artikel like '%?%'",[$cari]);
        $data=DB::table('artikel')
                ->where('judul','like','%'.$cari.'%')
                ->orWhere('artikel','like','%'.$cari.'%')
                ->orderBy('tanggal','desc')
                ->leftjoin('kategori','kategori.id','=','artikel.idkategori')
                ->leftjoin('users','users.id','=','artikel.id_admin')
                ->select(DB::raw('kategori.*,artikel.*,users.name'))
                ->paginate(10);
        $kat=DB::select('select * from kategori');
        if($data){
            return view('admin.blog.data_tulis',['artikel'=>$data,'kategori'=>$kat,'msg'=>'Kembali']);
        }else{
            return view('admin.blog.data_tulis',['artikel'=>$data,'kategori'=>$kat,'msg'=>'Post Tidak Ada']);
        }
        }
    }
}
