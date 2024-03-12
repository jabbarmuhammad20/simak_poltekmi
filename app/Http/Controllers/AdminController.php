<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Tahun_Akademik;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function daftarMahasiswa()
    {
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => Mahasiswa::with('user')->get(),
        ];

        return view('mahasiswa.daftarMhs', compact('data'));
    }

    public function createMahasiswa(Request $request) 
    {
        if ($request->isMethod('POST')) {
            $this->validate($request,[
                'email'=>'unique:users',
            ]);

            $user = User::create([
                'type' => '0',
                'name' => $request->name,
                'npm' => $request->npm,
                'email' => $request->email,
                'password' => Hash::make('123456789'), 
            ]);

            $userId = $user->id;

            Mahasiswa::create([
                'user_id' => $userId,
                'npm' => $request->npm,
                'semester' => $request->semester,
                'prog_studi' => $request->prog_studi,
                'k_dosenwali' => $request->k_dosenwali,
                'aktif' => $request->aktif,
                'ket' => $request->ket,
            ]);

            return redirect('dashboard/admin/tambah/mahasiswa')->with('success', 'Mahasiswa Berhasil Ditambahkan !');
        }

        $data = [
            'title' => 'Tambah Mahasiswa',
            'dosen' => Dosen::all(), 
        ];
        return view('mahasiswa.tambahMhs', compact('data'));
    }

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

            return redirect('dashboard/admin/tambah/matkul')->with('success', 'Matakuliah Berhasil Ditambahkan !');
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
            'title' => 'Data Matkul',
            'matkul' => Matakuliah::with('dosen')->get(),
        ];
        return view('matakuliah.daftarMatkul', compact('data'));
    }
}
