<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Tahun_Akademik;
use App\Models\Matakuliah;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createMhs(){
        // Menempilkan menu tambah mahasiswa
        $dosen = Dosen::all();
        return view('admin.mahasiswa.tambahMhs_admin',['dosen'=>$dosen]);
    }

    public function storeMhs(Request $request){
        // menyimpan tambah mahasiswa baru
        $this->validate($request,[
            'email'=>'unique:users',
        ]);
        
        $users = new User;
        $users-> type='0';
        $users-> npm=$request->npm;
        $users-> name=$request->name;
        $users-> email=$request->email;
        $users-> password=bcrypt('123456789');
        // $users-> remember_token=str_random(60);
        $users->save();
        //menambahkan ke tabel mahasiswa
        $request->request->add(['user_id'=>$users->id]);
        $request->request->add(['npm'=>$users->npm]);
        $mahasiswa= new Mahasiswa;
        $mahasiswa-> user_id =$request->user_id;
        $mahasiswa-> npm =$request->npm;
        $mahasiswa-> semester =$request->semester;
        $mahasiswa-> prog_studi =$request->prog_studi;
        $mahasiswa-> k_dosenwali =$request->k_dosenwali;
        $mahasiswa-> aktif =$request->aktif;
        $mahasiswa-> ket =$request->ket;
        $mahasiswa->save();
        return redirect('admin.tambah')->with(['success' => 'Mahasiswa Berhasil Ditambahkan !']);
    }

    public function createMatkul(){
        // Menempilkan menu tambah mahasiswa
        $dosen = Dosen::all();
        $ta = Tahun_Akademik::all();
        return view('admin.matakuliah.tambahMatkul_admin',['dosen'=>$dosen, 'ta'=>$ta]);
    }

    public function storeMatkul(Request $request){
        // menyimpan tambah Matakuliah
        $users = new Matakuliah;
        $users-> dosen_id=$request->dosen_id;
        $users-> tahun_akademik=$request->tahun_akademik;
        $users-> k_matkul=$request->k_matkul;
        $users-> nama_matakuliah=$request->nama_matakuliah;
        $users-> prog_studi=$request->prog_studi;
        $users-> sks=$request->sks;
        $users-> semester=$request->semester;
        $users-> ket=$request->ket;
        $users-> aktif=$request->aktif;
        $users->save();
        return redirect('admin/tambahmatkul')->with(['success' => 'Matakuliah Berhasil Ditambahkan !']);
    }

    public function daftarMatkul(){
        // Menempilkan menu tambah mahasiswa
        $matkul = Matakuliah::with('Dosen')->get();
        return view('admin.matakuliah.daftarMatkul_admin',['matkul'=>$matkul]);
    }
    //
}
