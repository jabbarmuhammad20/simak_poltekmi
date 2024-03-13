<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Tahun_Akademik;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DosenController extends Controller
{
    public function createMatkul(Request $request){
        if ($request->isMethod('POST')) {
            Matakuliah::create([
                'dosen_id' => $request->dosen_id,
                'tahun_akademik' => $request->tahun_akademik,
                'k_matkul' => $request->k_matkul,
                'nama_matakuliah' => $request->nama_matakuliah,
                'prog_studi' => $request->prog_studi,
                'sks' => $request->sks,
                'semester' => $request->semester,
                'ket' => $request->ket,
                'aktif' => $request->aktif,
            ]);

            return redirect('dashboard/dosen/tambah/matkul')->with('success', 'Matakuliah Berhasil Ditambahkan !');
        }

        $data = [
            'title' => 'Tambah Matkul',
            'dosen' => Dosen::all(),
            'tahunAkademik' => Tahun_Akademik::all(),
        ];

        return view('matakuliah.tambahMatkul', compact('data'));
    }

    public function daftarMatkul(){
        $data = [
            'title' => 'Daftar Matakuliah yang Diampu',
            'matkul' => Matakuliah::with('user')->where('dosen_id', Auth::user()->id)->get(),
        ];

        return view('dosen/daftarMatakuliah_dsn', compact('data'));    
    }

    public function getNilaiByMatkul($id){
        $data = [
            'title' => 'Data Nilai Mahasiswa',
            'nilai' => Nilai::with('mahasiswa', 'matakuliah', 'user')->where('matakuliah_id', $id)->get(),
        ];

        return view('dosen/daftarMahasiswa_dsn', compact('data'));
    }
}
