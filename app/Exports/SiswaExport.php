<?php

namespace App\Exports;

// use App\Siswa;
// use App\Ortu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class SiswaExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('siswa')
        ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        ->select(DB::raw("siswa.nisn,nik,idtahun,nama_lengkap,gender,tempat_lahir,ttl,agama,kebutuhan_khusus,alamat,rt,rw,dusun,kelurahan,kecamatan,kode_pos,jenis_tinggal,telp,hp,penerima_kip,no_kip, orang_tua.nama_ayah,nama_ibu, siswa.ppdb,status, orang_tua.nama_ayah"))
        ->where(['ppdb'=>"terima",'gender'=>'Laki-Laki'])
        ->get();
        return $data;
        
        // return Siswa::select('nisn','nik','idtahun','nama_lengkap','gender','tempat_lahir','ttl','agama','kebutuhan_khusus','alamat','rt','rw','dusun','kelurahan','kecamatan','kode_pos','jenis_tinggal','telp','hp','penerima_kip','no_kip','ppdb','status')->where('gender','Laki-Laki')
        // ->leftjoin('orang_tua','siswa.idortu',"=",'orang_tua.idortu')
        // ->select(Siswa::raw("siswa.id as ids, siswa.*, tahun.id as idth, tahun.*, orang_tua.*"))
        // ->where(['ppdb'=>"terima",'gender'=>'Laki-Laki'])
        // ->get();
        // return Ortu::all()->where('idortu');
    }
    public function headings():array
    {
        return [
            'NIS',
            'NIK',
            'Tahun',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Kebutuhan Khusus',
            'Alamat',
            'RT',
            'RW',
            'DUSUN',
            'KELURAHAN',
            'KECAMATAN',
            'KODE POS',
            'Jenis Tinggal',
            'Telepon',
            'HP',
            'Penerima KIP',
            'No KIP',
            'Ayah',
            'Ibu',
            'PPDB',
            'Status',
        ];
    }
}
