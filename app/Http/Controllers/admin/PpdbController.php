<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PpdbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // DEFINISIKAN PATH
        $this->path = public_path('/source/ppdb');
    }

    function daftar(){
        return view('admin\ppdb\daftar');
    }
    function simpanD(Request $request){
        $request->validate([
            'nisn'=>'required',
            'nik'=>'required'
        ]);
        $hari_d=$request->hari_tanggal;
        $no_p=$request->nomor_pendaftaran;
        $nama_s=$request->nama_siswa;
        $jk=$request->jenis_kelamin;
        $nisn=$request->nisn;
        $tl=$request->tempat_lahir;
        $tgll=$request->tanggal_lahir;
        $nik=$request->nik;
        $agama=$request->agama;
        $kh_s=$request->kebutuhan_khusus_siswa;
        $almt=$request->alamat;
        $rt=$request->rt;
        $rw=$request->rw;
        $dsn=$request->dusun;
        $kel=$request->kelurahan;
        $kec=$request->kecamatan;
        $kode_p=$request->kode_pos;
        $jt=$request->jenis_tinggal;
        $at=$request->alat_transportasi;
        $telp_s=$request->telepon_siswa;
        $hp_s=$request->hp_siswa;
        $email=$request->email;
        $no_un=$request->no_peserta_un;
        $p_kip=$request->penerima_kip;
        $no_kip=$request->no_kip;
        $nama_a=$request->nama_ayah;
        $pekerjaan_a=$request->pekerjaan_ayah;
        $thl_a=$request->tahun_lahir_ayah;
        $penghasilan_a=$request->penghasilan_ayah;
        $jjg_a=$request->jenjang_pendidikan_ayah;
        $kh_a=$request->kebutuhan_khusus_ayah;
        $hp_a=$request->hp_ayah;
        $nama_i=$request->nama_ibu;
        $pekerjaan_i=$request->pekerjaan_ibu;
        $thl_i=$request->tahun_lahir_ibu;
        $penghasilan_i=$request->penghasilan_ibu;
        $jjg_i=$request->jenjang_pendidikan_ibu;
        $kh_i=$request->kebutuhan_khusus_ibu;
        $hp_i=$request->hp_ibu;
        $berat=$request->berat_badan;
        $tinggi=$request->tinggi_badan;
        $jarak=$request->jarak_rumah;
        $waktu_t=$request->waktu_tempuh;
        $jml_sdr=$request->jumlah_saudara_kandung;
        
        $cek=DB::select('select idortu from orang_tua where idortu=?',[$nik]);
        if($cek){
            return redirect()->action('admin\PpdbController@daftar')->with("msg","No NIK Sudah ada");
        }else{
            $datao=DB::insert('insert into orang_tua(idortu,nama_ayah,tahun_lahir_ayah,jenjang_pendidikan_ayah,pekerjaan_ayah,penghasilan_ayah,kebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,tahun_lahir_ibu,jenjang_pendidikan_ibu,pekerjaan_ibu,penghasilan_ibu,kebutuhan_khusus_ibu,no_hp_ibu) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$nik,$nama_a,$thl_a,$jjg_a,$pekerjaan_a,$penghasilan_a,$kh_a,$hp_a,$nama_i,$thl_i,$jjg_i,$pekerjaan_i,$penghasilan_i,$kh_i,$hp_i]);
        }
        $datas=DB::insert('insert into siswa(idortu,hari_tanggal,no_pendaftaran,nama_lengkap,gender,nisn,tempat_lahir,ttl,nik,agama,kebutuhan_khusus,alamat,rt,rw,dusun,kelurahan,kecamatan,kode_pos,jenis_tinggal,alat_transportasi,telp,hp,email,no_peserta_un,penerima_kip,no_kip,berat_badan,tinggi_badan,jarak_rumah_sekolah,waktu_tempuh,jumlah_saudara,ppdb) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$nik,$hari_d,$no_p,$nama_s,$jk,$nisn,$tl,$tgll,$nik,$agama,$kh_s,$almt,$rt,$rw,$dsn,$kel,$kec,$kode_p,$jt,$at,$telp_s,$hp_s,$email,$no_un,$p_kip,$no_kip,$berat,$tinggi,$jarak,$waktu_t,$jml_sdr,'terima']);
        if($datas){
            return redirect()->action('admin\PpdbController@daftar')->with("msg","Data Berhasil Disimpan");
        }else{
            return redirect()->action('admin\PpdbController@daftar')->with("msg","Data Gagal Disimpan");
        }        
    }
    
    function ppdbSiswa(){
        $data=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->where(['ppdb'=>"belum",'gender'=>'Laki-Laki'])
        ->select(DB::raw("siswa.id as ids, siswa.*,orang_tua.*"))
        ->paginate(20);
        $datat=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->where(['ppdb'=>"tolak",'gender'=>'Laki-Laki'])
        ->select(DB::raw("siswa.id as ids, siswa.*,orang_tua.*"))
        ->paginate(20);
        return view('admin.ppdb.ppdb_siswa',['ppdb'=>$data,'ppdbt'=>$datat]);
    }
    function accSiswa($id){
        $data=DB::update("update siswa set ppdb='terima' where id=?",[$id]);
        if($data){
            return redirect()->action('admin\PpdbController@ppdbSiswa')->with('msg','Data Berhasil Disimpan');
        }else{
            return redirect()->action('admin\PpdbController@ppdbSiswa')->with('msg','Data Gagal Disimpan');
        }
    }
    function ditolakSiswa(Request $request){
        $request->validate(['ket'=>'required']);
        $id=$request->id;
        $ket=$request->ket;
        $data=DB::update("update siswa set ppdb='tolak' , ket=? where id=?",[$ket,$id]);
        if($data){
            return redirect()->action('admin\PpdbController@ppdbSiswa')->with('msg','Data Berhasil Disimpan');
        }else{
            return redirect()->action('admin\PpdbController@ppdbSiswa')->with('msg','Data Gagal Disimpan');
        }
    }
    function ppdbSiswi(){
        $data=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->where(['ppdb'=>"belum",'gender'=>'Perempuan'])
        ->select(DB::raw("siswa.id as ids, siswa.*,orang_tua.*"))
        ->paginate(20);
        $datat=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->where(['ppdb'=>"tolak",'gender'=>'Perempuan'])
        ->select(DB::raw("siswa.id as ids, siswa.*,orang_tua.*"))
        ->paginate(20);
        return view('admin.ppdb.ppdb_siswi',['ppdb'=>$data,'ppdbt'=>$datat]);
    }
    
    function accSiswi($id){
        $data=DB::update("update siswa set ppdb='terima' where id=?",[$id]);
        if($data){
            return redirect()->action('admin\PpdbController@ppdbSiswi')->with('msg','Data Berhasil Disimpan');
        }else{
            return redirect()->action('admin\PpdbController@ppdbSiswi')->with('msg','Data Gagal Disimpan');
        }
    }
    function ditolakSiswi(Request $request){
        $request->validate(['ket'=>'required']);
        $id=$request->id;
        $ket=$request->ket;
        $data=DB::update("update siswa set ppdb='tolak' , ket=? where id=?",[$ket,$id]);
        if($data){
            return redirect()->action('admin\PpdbController@ppdbSiswi')->with('msg','Data Berhasil Disimpan');
        }else{
            return redirect()->action('admin\PpdbController@ppdbSiswi')->with('msg','Data Gagal Disimpan');
        }
    }
    function print($id){
        $data=DB::table('siswa')
        ->leftJoin('orang_tua','orang_tua.idortu',"=",'siswa.idortu')
        ->where('siswa.id',$id)
        ->select(DB::raw("siswa.id as ids,siswa.*,orang_tua.*"))
        ->paginate(20);
        return view('admin.ppdb.print',['print'=>$data]);
    }
}
