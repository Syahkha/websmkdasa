<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        //Definisikan Path
        $this->middleware('auth');
        $this->path = public_path('/source/artikel');
   
    }

    function tulis(){
    $data=DB::select('select * from kategori');
    $dataS=DB::table('sub_kategori')
    ->join('kategori', 'sub_kategori.kategori_id', '=', 'kategori.id')
    ->select('sub_kategori.*', 'kategori.kategori')
    ->orderby('kategori_id')
    ->get();
        return view('admin.blog.tulis',['data'=>$data,'dataS'=>$dataS]);
    }
    
    function inputKategori(Request $request){
        $request->validate([
            'kategori'=>'required',
        ]);
        $kategori=$request->kategori;
        $kurl=str_replace(' ','-',$kategori);
        if($request->menu=="N"){
            $data=DB::insert('insert into kategori(kategori,edit,url_kategori) values(?,?,?)',[$kategori,"N",$kurl]);
            if($data){
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
            }else{
                return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
            }
        }else{
            $data=DB::insert('insert into kategori(kategori,url_kategori) values(?,?)',[$kategori,$kurl]);
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
        $kurl=str_replace(' ','-',$kategori);
        if($request->menu=="N"){
            $data=DB::update('update kategori set kategori=?,edit=?,url_kategori=? where id=?',[$kategori,"N",$kurl,$id]);
        }else{
            $data=DB::update('update kategori set kategori=?,edit=?,url_kategori=? where id=?',[$kategori,"Y",$kurl,$id]);
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
            return redirect()->action('admin\BlogController@tulis')->with('psn','Data Berhasil dihapus');
        }
    }
    function subKategori(Request $request){
        
    
        $sub=$request->subkategori;
        $idk=$request->idk;

        $data=DB::insert('insert into sub_kategori(sub_kategori,kategori_id) values(?,?)',[$sub,$idk]);
        if($data){
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
        }else{
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
        }

    }

    function upSK(Request $request){
        $request->validate([
            'id'=>'required',
            'edit_subkategori'=>'required',
            'idk'=>'required',
        ]);
        $sub=$request->edit_subkategori;
        $idk=$request->idk;
        $id=$request->id;

      
        $upsub=DB::table('sub_kategori')
            ->where('id', $id)
            ->update(
                ['sub_kategori' => $sub],
                ['kategori_id' => $idk]
            );
        if($upsub){
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Berhasil Disimpan');
        }else{
            return redirect()->action('admin\BlogController@tulis')->with("psn",'Gagal Disimpan');
        }

    }
    function hapusSK($id){
        $data=DB::table('sub_kategori')
            ->where(['id' => $id])
            ->delete();
            if($data){
                return redirect()->action('admin\BlogController@tulis')->with('psn','Data Berhasil dihapus');
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
            'isi'=>'required',
        ]);
        if($request->hasFile('gambar')){
            $old=$request->gambarLama;
            File::delete('source/artikel/'.$old);
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
