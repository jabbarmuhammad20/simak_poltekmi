<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Tahun_Akademik;
use App\Models\Nilai;
use App\Models\Programstudi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DosenController extends Controller
{
    public function createMatkul(Request $request){
        if ($request->isMethod('POST')) {
            Matakuliah::create([
                'dosen_id' => $request->dosen_id,
                'tahun_akademik_id' => $request->tahun_akademik_id,
                'k_matkul' => $request->k_matkul,
                'nama_matakuliah' => $request->nama_matakuliah,
                'programstudi_id' => $request->programstudi_id,
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
            'programStudi' => Programstudi::all(),
        ];
        
        return view('matakuliah.tambahMatkul', compact('data'));
    }
    
    public function daftarMatkul(){
        $data = [
            'title' => 'Daftar Matakuliah yang Diampu',
            'matkul' => Matakuliah::with('user','tahunakademik','programstudi')->where('dosen_id', Auth::user()->id)->get(),
        ];
        $tahun_akademik = Tahun_Akademik::all();
        $prog = Programstudi::all();
        
        return view('dosen/daftarMatakuliah_dsn', compact('data','tahun_akademik','prog'));    
    }

    public function updateMatkul(){
        $data = [
            'title' => 'Daftar Matakuliah yang Diampu',
            'matkul' => Matakuliah::with('user')->where('dosen_id', Auth::user()->id)->get(),
        ];
        $tahun_akademik = Tahun_Akademik::all();
        $prog = Programstudi::all();
        
        return view('dosen/daftarMatakuliah_dsn', compact('data','tahun_akademik','prog'));    
    }

    public function getNilaiByMatkul($id){
        $data = [
            'title' => 'Data Nilai Mahasiswa',
            'nilai' => Nilai::with('mahasiswa', 'matakuliah', 'user')->where('matakuliah_id', $id)->get(),
            // 'kunci' => Nilai::where('kunci','0')->get(),
        ];

        return view('dosen/daftarMahasiswa_dsn', compact('data'));
    }

    public function input_nilai(Request $request, $id){
        $nilai = Nilai::findOrFail($id);
        $nilai ->nilai=$request->input('nilai');
        $nilai->update();
        return redirect()->back()->with('success', 'Nilai Berhasil ditambah !');
    }
}
