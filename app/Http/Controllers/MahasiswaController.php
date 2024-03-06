<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;
use App\Models\Nilai;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function nilai(){
        $matkul = Nilai::with('Matakuliah')->get();
        return view('mhs.nilai.daftarNilai_mhs',['matkul'=>$matkul]);
    }

    public function daftarMatkul(){
        $matkul = Matakuliah::all();
        return view('mhs.matkul.daftarMatkul_mhs',['matkul'=>$matkul]);
    }

    public function krs(){
        $matkul = Matakuliah::with('Nilai')->get();
        return view('mhs.matkul.krs_mhs',['matkul'=>$matkul]);
    }

    public function inputkrs(Request $request){
        // $this->validate($request,[
        //     'matakuliah_id'=>'unique:matakuliah_id',
        // ]);
        $matkul= new Nilai;
        $matkul-> matakuliah_id =$request->matakuliah_id;
        $matkul-> mahasiswa_npm =$request->mahasiswa_npm;
        $matkul->save();
        return redirect('krs')->with(['success' => 'Berhasil Ditambahkan']);
    }
        
}