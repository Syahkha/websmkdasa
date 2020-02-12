<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function akun(){
        $id=Auth::user()->id;
        $data=DB::select('select * from users where id=?',[$id]);
        if($data){
            return view('user.setting_akun',['data'=>$data]);
        }
    }
    function editA(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $id=$request->id;
        $name=$request->name;
        $pass=Hash::make($request->password);
        $email=$request->email;
        if(empty($request->password)){
            $data=DB::update('update users set name=?,email=? where id=?',[$name,$email,$id]);
            if($data){
                return redirect()->action('user\User@akun')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@akun')->with('msg',"Gagal Disimpan");
            }
        }else{
            $data=DB::update('update users set name=?,password=?,email=? where id=?',[$name,$pass,$email,$id]);
            if($data){
                return redirect()->action('user\User@akun')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@akun')->with('msg',"Gagal Disimpan");
            }
        }
    }
    function dataU(){
        $data=DB::table('users')
            ->select(DB::raw("users.*"))
            ->orderBy('level','ASC')
            ->paginate(10);
        if($data){
            return view('user.data_user',['data'=>$data]);
        }
    }
    function tambahU(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'level'=>'required',
        ]);
        $name=$request->name;
        $email=$request->email;
        $pass=Hash::make($request->password);
        $lv=$request->level;

        $data=DB::insert('insert into users (name,email,password,level) values(?,?,?,?)',[$name,$email,$pass,$lv]);
        if($data){
            return redirect()->action('user\User@dataU')->with('msg',"Berhasil Disimpan");
        }else{
            return redirect()->action('user\User@dataU')->with('msg',"Gagal Disimpan");
        }
    }
    function hapusU($id){
        $data=DB::delete('delete from users where id=?',[$id]);
        if($data){
            return redirect()->action('user\User@dataU')->with("msg",'Berhasil Dihapus');
        }else{
            return redirect()->action('user\User@dataU')->with("msg",'Gagal Dihapus');
        }
    }
    function editU(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'level'=>'required',
        ]);
        $id=$request->id;
        $name=$request->name;
        $pass=Hash::make($request->password);
        $email=$request->email;
        $lv=$request->level;
        if(empty($request->password)){
            $data=DB::update('update users set name=?,email=?,level=? where id=?',[$name,$email,$lv,$id]);
            if($data){
                return redirect()->action('user\User@dataU')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@dataU')->with('msg',"Gagal Disimpan");
            }
        }else{
            $data=DB::update('update users set name=?,password=?,email=?,level=? where id=?',[$name,$pass,$email,$lv,$id]);
            if($data){
                return redirect()->action('user\User@dataU')->with('msg',"Berhasil Disimpan");
            }else{
                return redirect()->action('user\User@dataU')->with('msg',"Gagal Disimpan");
            }
        }
    }
    function dexcelsiswa(){
        // $data=santri::get()->toArray();
       // return Excel::create('Data Santri', function($excel) use ($data) {
       //     $excel->sheet('mySheet', function($sheet) use ($data)
       //     {
       //         $sheet->fromArray($data);
       //     });
       // })->download("xlsx");
        return Excel::download(new SiswaExport,date('Y-m-d').'-Data Siswa.xlsx');
    }
}
