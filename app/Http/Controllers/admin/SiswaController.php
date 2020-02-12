<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->path = public_path('source/pdbb');
    }
    function dataSiswa(){
        $data=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->leftjoin('tahun','siswa.idtahun','=','tahun.id')
        ->where(['ppdb'=>"terima",'gender'=>'Laki-Laki'])
        ->select(DB::raw("siswa.id as ids, siswa.*, tahun.id as idth, tahun.*, orang_tua.*"))
        ->orderBy('nama_lengkap','ASC')
        ->paginate(20);
        $th=DB::table('tahun')
        ->paginate(7);
        return view('admin.siswa.siswa',['th'=>$th,'siswa'=>$data]);
    }
    function updateSiswa(Request $request){
        $request->validate([
            'nisn'=>'required',
            'nik'=>'required',
            'tahun_ajaran'=>'required'
        ]);
        $id=$request->ids;
        $th=$request->tahun_ajaran;
        $idortu=$request->idortu;
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
        $st=$request->status;

        $datas=DB::update("update siswa set idtahun=?,idortu=?,hari_tanggal=?,no_pendaftaran=?,nama_lengkap=?,gender=?,nisn=?,tempat_lahir=?,ttl=?,nik=?,agama=?,kebutuhan_khusus=?,alamat=?,rt=?,rw=?,dusun=?,kelurahan=?,kecamatan=?,kode_pos=?,jenis_tinggal=?,alat_transportasi=?,telp=?,hp=?,email=?,no_peserta_un=?,penerima_kip=?,no_kip=?,berat_badan=?,tinggi_badan=?,jarak_rumah_sekolah=?,waktu_tempuh=?,jumlah_saudara=?,status=? where id=?",[
            $th,$nik,$hari_d,$no_p,$nama_s,$jk,$nisn,$tl,$tgll,$nik,$agama,$kh_s,$almt,$rt,$rw,$dsn,$kel,$kec,$kode_p,$jt,$at,$telp_s,$hp_s,$email,$no_un,$p_kip,$no_kip,$berat,$tinggi,$jarak,$waktu_t,$jml_sdr,$st,$id
        ]);
        if($datas){
            $data=DB::update("update orang_tua set idortu=?,nama_ayah=?,tahun_lahir_ayah=?,jenjang_pendidikan_ayah=?,pekerjaan_ayah=?,penghasilan_ayah=?,kebutuhan_khusus_ayah=?,no_hp_ayah=?,nama_ibu=?,tahun_lahir_ibu=?,jenjang_pendidikan_ibu=?,pekerjaan_ibu=?,penghasilan_ibu=?,kebutuhan_khusus_ibu=?,no_hp_ibu=? where idortu=?",[
                $nik,$nama_a,$thl_a,$jjg_a,$pekerjaan_a,$penghasilan_a,$kh_a,$hp_a,$nama_i,$thl_i,$jjg_i,$pekerjaan_i,$penghasilan_i,$kh_i,$hp_i,$idortu
            ]);
            return redirect()->action('admin\SiswaController@dataSiswa')->with("msg","Data Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SiswaController@dataSiswa')->with("msg","Data Gagal Disimpan");
        }
    }
    function hapusSiswa($id,$idortu){
        $datas=DB::delete('delete from siswa where id=?',[$id]);
        if($datas){
            $data=DB::delete('delete from orang_tua where idortu=?',[$idortu]);
            return redirect()->action('admin\SiswaController@dataSiswa')->with("msg","Data Berhasil Dihapus");
        }else{
            return redirect()->action('admin\SiswaController@dataSiswa')->with("msg","Data Gagal Dihapus");
        }
    }
    function dataSiswi(){
        $data=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->leftjoin('tahun','siswa.idtahun','=','tahun.id')
        ->where(['ppdb'=>"terima",'gender'=>'Perempuan'])
        ->select(DB::raw("siswa.id as ids, siswa.*,orang_tua.*"))
        ->paginate(20);
        return view('admin.siswa.siswi',['siswi'=>$data]);
    }
    function updateSiswi(Request $request){
        $request->validate([
            'nisn'=>'required',
            'nik'=>'required'
        ]);
        $id=$request->ids;
        $idortu=$request->idortu;
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
        $st=$request->status;

        $datas=DB::update("update siswa set idortu=?,hari_tanggal=?,no_pendaftaran=?,nama_lengkap=?,gender=?,nisn=?,tempat_lahir=?,ttl=?,nik=?,agama=?,kebutuhan_khusus=?,alamat=?,rt=?,rw=?,dusun=?,kelurahan=?,kecamatan=?,kode_pos=?,jenis_tinggal=?,alat_transportasi=?,telp=?,hp=?,email=?,no_peserta_un=?,penerima_kip=?,no_kip=?,berat_badan=?,tinggi_badan=?,jarak_rumah_sekolah=?,waktu_tempuh=?,jumlah_saudara=?,status=? where id=?",[
            $nik,$hari_d,$no_p,$nama_s,$jk,$nisn,$tl,$tgll,$nik,$agama,$kh_s,$almt,$rt,$rw,$dsn,$kel,$kec,$kode_p,$jt,$at,$telp_s,$hp_s,$email,$no_un,$p_kip,$no_kip,$berat,$tinggi,$jarak,$waktu_t,$jml_sdr,$st,$id
        ]);
        if($datas){
            $data=DB::update("update orang_tua set idortu=?,nama_ayah=?,tahun_lahir_ayah=?,jenjang_pendidikan_ayah=?,pekerjaan_ayah=?,penghasilan_ayah=?,kebutuhan_khusus_ayah=?,no_hp_ayah=?,nama_ibu=?,tahun_lahir_ibu=?,jenjang_pendidikan_ibu=?,pekerjaan_ibu=?,penghasilan_ibu=?,kebutuhan_khusus_ibu=?,no_hp_ibu=? where idortu=?",[
                $nik,$nama_a,$thl_a,$jjg_a,$pekerjaan_a,$penghasilan_a,$kh_a,$hp_a,$nama_i,$thl_i,$jjg_i,$pekerjaan_i,$penghasilan_i,$kh_i,$hp_i,$idortu
            ]);
            return redirect()->action('admin\SiswaController@dataSiswi')->with("msg","Data Berhasil Disimpan");
        }else{
            return redirect()->action('admin\SiswaController@dataSiswi')->with("msg","Data Gagal Disimpan");
        }
    }
    function hapusSiswi($id,$idortu){
        $datas=DB::delete('delete from siswa where id=?',[$id]);
        if($datas){
            $data=DB::delete('delete from orang_tua where idortu=?',[$idortu]);
            return redirect()->action('admin\SiswaController@dataSiswi')->with("msg","Data Berhasil Dihapus");
        }else{
            return redirect()->action('admin\SiswaController@dataSiswi')->with("msg","Data Gagal Dihapus");
        }
    }
}
