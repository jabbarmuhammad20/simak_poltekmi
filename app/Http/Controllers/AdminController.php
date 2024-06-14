<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Tahun_Akademik;
use App\Models\Matakuliah;
use App\Models\Programstudi;
use App\Models\Setting;
use App\Models\Nilai;
use App\Imports\NilaiImport;
use App\Imports\Update_semesterImport;
use App\Exports\Update_semesterExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function daftarMahasiswa()
    // Daftar Mahasiswa Aktif
    {
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => Mahasiswa::with('user','programstudi')
            ->where('aktif','1')
            ->get(),
        ];

        return view('mahasiswa.daftarMhs', compact('data') );
    }

    public function daftarMahasiswa_nonaktif()
    // Daftar Mahasiswa nonAktif
    {
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => Mahasiswa::with('user','programstudi')
            ->where('aktif','0')
            ->get(),
        ];

        return view('mahasiswa.daftarMhs', compact('data') );
    }

    public function verMatkul(){
        $data = [
            'title' => 'Daftar Matakuliah Aktif',
            'dosen' => Dosen::all(),
            'matkul' => Matakuliah::with('user','tahunakademik','programstudi','dosen')
            ->where('aktif','1')
            ->get(),
        ];
        $tahun_akademik = Tahun_Akademik::all();
        $prog = Programstudi::all();
        
        return view('mahasiswa.verifikasiMatkul_adm', compact('data','tahun_akademik','prog'));    
    }

    public function getNilaiByMatkul(Request $request, $id){
        $setting = Setting::all()->first();
        $data = [
            'title' => 'Data Nilai Mahasiswa',
            'nilai' => Nilai::with('mahasiswa', 'matakuliah', 'user', 'programstudi','tahunakademik')
            ->where('matakuliah_id', $id)
            ->where('tahunakademik_id',$setting->tahunakademik_id)
            ->get(),
        ];
        return view('mahasiswa/verifikasiNilai_adm', compact('data'));
    }

    public function input_nilai(Request $request, $id){
        $nilai = Nilai::findOrFail($id);
        $nilai ->nilai=$request->input('nilai');
        $nilai ->kunci=$request->input('kunci');
        $nilai->update();
        return redirect()->back()->with('success', 'Nilai Berhasil diubah !');
    }

    public function updateMatkul(Request $request, $id){
        $matkul = Matakuliah::findOrFail($id);
        $matkul ->k_matkul=$request->input('k_matkul');
        $matkul ->dosen_id=$request->input('dosen_id');
        $matkul ->programstudi_id=$request->input('programstudi_id');
        $matkul ->nama_matakuliah=$request->input('nama_matakuliah');
        $matkul ->sks=$request->input('sks');
        $matkul ->semester=$request->input('semester');
        $matkul ->tahunakademik_id=$request->input('tahunakademik_id');
        $matkul ->aktif=$request->input('aktif');
        $matkul ->kunci=$request->input('kunci');
        $matkul->update();
        return redirect()->back()->with('success', 'Nilai Berhasil diubah !');
    }

    public function daftarnilaiMahasiswa()
    {
        $data = [
            'title' => 'Daftar Nilai',
            'nilai' => Nilai::with('user','mahasiswa')->get(),
        ];

        return view('mahasiswa.daftarnilaiMhs', compact('data'));
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
                'password' => Hash::make('123456'), 
            ]);

            Mahasiswa::create([
                'user_id' => $user->id,
                'npm' => $user->npm,
                'semester' => $request->semester,
                'tahun_masuk' => $request->tahun_masuk,
                'kelas_id' => $request->kelas_id,
                'programstudi_id' => $request->programstudi_id,
                'dosen_id' => $request->dosen_id,
                'aktif' => $request->aktif,
                'ket' => $request->ket,
            ]);

            return redirect('dashboard/admin/tambah/mahasiswa')->with('success', 'Mahasiswa Berhasil Ditambahkan !');
        }

        $data = [
            'title' => 'Tambah Mahasiswa',
            'dosen' => Dosen::all(), 
            'tahunAkademik' => Tahun_Akademik::all(),
            'program' => Programstudi::all(),
            'kelas' => kelas::all(),
        ];
        return view('mahasiswa.tambahMhs', compact('data'));
    }

    public function createMatkul(Request $request){
        if ($request->isMethod('POST')) {
            Matakuliah::create([
                'dosen_id' => $request->dosen_id,
                'tahunakademik_id' => $request->tahunakademik_id,
                'k_matkul' => $request->k_matkul,
                'nama_matakuliah' => $request->nama_matakuliah,
                'programstudi_id' => $request->programstudi_id,
                'kelas_id' => $request->kelas_id,
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
            'programstudi' => Programstudi::all(),
            'kelas' => kelas::all(),
        ];

        return view('matakuliah.tambahMatkul', compact('data'));
    }

    public function createDosen(Request $request, Dosen $dosen) {
        if ($request->isMethod('POST')) {
            $this->validate($request,[
                'email'=>'unique:users',
            ]);

            $user = User::create([
                'type' => '2',
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('123456789'), 
            ]);

            Dosen::create([
                'nidn' => $request->nidn,
                'user_id' => $user->id,
                'nama' => $user->name,
                'programstudi_id' => $request->programstudi_id,
            ]);

            return redirect('dashboard/admin/tambah/dosen')->with('success', 'Dosen Berhasil Ditambahkan !');
        }

        $data = [
            'title' => 'Tambah Dosen',
            'dosen' => $dosen->getNonDosenIds(),
        ];

        return view('dosen.tambahDosen', compact('data'));
    }

    public function arsipMatkul(){
        // daftar matakuliah non aktif
            $data = [
            'title' => 'Daftar Matakuliah Non Aktif',
            'dosen' => Dosen::all(),
            'matkul' => Matakuliah::with('user','tahunakademik','programstudi','dosen')
            ->where('aktif','0')
            ->get(),
            ];
            $tahun_akademik = Tahun_Akademik::all();
            $prog = Programstudi::all();

        return view('matakuliah.arsipMatkul', compact('data','prog','tahun_akademik'))->with('success', 'Matakuliah Berhasil Diubah !');
    }

    public function daftarDosen(){
        $data = [
            'title' => 'Data Dosen',
            'dosen' => Dosen::with('user')->get(),
        ];
        return view('dosen.daftarDosen', compact('data'));
    }

    // Update data semester
    public function update_semesterExport() 
    {
        return Excel::download(new Update_semesterExport, 'update_semester.xlsx');
    }

    public function update_semesterImport(){
        Excel::import(new Update_semesterImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data Semester Berhasil Diubah !');
    }


    public function importnilaiMahasiswa(){
        Excel::import(new NilaiImport, request()->file('file'));
        return redirect('/dashboard/admin/daftar/nilai')->with('success', 'Nilai Berhasil Ditambahkan !');
    }

    public function deleted_nilai($id){
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect('/dashboard/admin/daftar/nilai')->with('success', 'Nilai Berhasil Dihapus !');
    }

    public function pengaturan(){
        $data = [
            'title' => 'Tahun Akademik',
            'tahunakademik' => Tahun_Akademik::all(),
            'setting' => Setting::with('tahunakademik')->get(), 

        ];
        return view('setting/tahunAkademik', compact('data'));
    }

    public function updateTahunakademik(Request $request, $id){
        $data = [
            'title' => 'Tahun Akademik',
            'tahunakademik' => Tahun_Akademik::all(),
            'setting' => Setting::with('tahunakademik')->get(),  
        ];  
        $tahun_akademik = Setting::first();
        $tahun_akademik->tahunakademik_id=$request->input('tahunakademik_id');
        $tahun_akademik->update();

        return redirect()->back()->with('success', 'Data Semester Berhasil Diubah !');
    }

    public function pengaturankelas( Request $request){
        if ($request->isMethod('POST')) {
            Kelas::create([
                'kode' => $request->kode,
                'namakelas' => $request->namakelas,
                'ruangkelas' => $request->ruangkelas,
        
            ]);

            return redirect()->back()->with('success', 'Kelas Berhasil Ditambah !');
        }

        $data = [
            'title' => 'Tambah Kelas',
            'kelas' => Kelas::all(),
        ];
        return view('setting/tambahKelas', compact('data'));
    }

}
