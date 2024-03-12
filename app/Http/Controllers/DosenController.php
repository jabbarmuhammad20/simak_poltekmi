<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Auth;
use Illuminate\Http\Request;


class DosenController extends Controller
{
    //menampilkan semua matakuliah berdasarkan dosen
    public function daftarMatkul ($id){
    $id = Auth::user()->id;
    $matkul = Matakuliah::all('id',$id);
    return view('dosen/daftarMatakuliah_dsn',compact('matkul'));    
    }

    // Menampilkan mahasiswa yang mengontrak matkul tsb
    public function showMhs($id){
    $nilai = Nilai::where('id')->all();
    return view ('dosen/daftarMahasiswa_dsn')->with('nilai', $nilai);
    }
}
