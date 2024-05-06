<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Setting;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private function response($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }

    public function nilai() {
        $data = [
            'title' => 'Data Nilai',
            'matkul' => Nilai::with('matakuliah','mahasiswa')->where('mahasiswa_npm', Auth::user()->npm)->get(),
        ];
        return view('mhs.nilai.daftarNilai_mhs', compact('data'));
    }

    public function daftarMatkul() {
        $data = [
            'title' => 'Daftar Matakuliah Aktif',
            'matkul' => Matakuliah::with('programstudi','mahasiswa','tahunakademik')
            ->where('programstudi_id',Auth::user()->Mahasiswa[0]->programstudi_id)
            // ->where('semester',Auth::user()->Mahasiswa[0]->semester)
            ->get(),
        ];
        $setting = Setting::all()->first();
        return view('mhs.matkul.daftarMatkul_mhs', compact('data','setting'));
    }

    public function krs(Request $request) {
        if ($request->ajax()) {
            return $this->response(true, Matakuliah::with('Nilai')->get());
        } 
     
        $data = [
            'title' => 'Kartu Rencana Studi',
            'krs' => Setting::find(1),
        ];
        return view('mhs.matkul.krs_mhs',compact('data'));
    }

    public function inputkrs(Request $request) {
        if ($request->ajax()) {
            if ($request->isMethod('get')) {
                $existingIds = Matakuliah::pluck('id')->toArray();
                $takeNonExistingIds = Nilai::whereIn('matakuliah_id', $existingIds)
                                           ->where('mahasiswa_npm', Auth::user()->npm)
                                           ->get();
                return $this->response(true, $takeNonExistingIds);
            }

            $findMatakuliah = Matakuliah::findOrFail($request->matakuliah_id);
            
            if (empty(Auth::user()->npm)) {
                return $this->response(true, 'NPM anda null, silahkan isi terlebih dahulu');
            }

            Nilai::create([
                'matakuliah_id' => $findMatakuliah->id,
                'k_matakuliah' => $findMatakuliah->k_matkul, 
                'mahasiswa_npm' => Auth::user()->npm,
            ]);
    
            return $this->response(true, 'Berhasil menambah KRS.');
        }
    }
    public function printKrs(){
        //sc sama dengan daftar matkul
        $data = [
            'title' => 'KARTU RENCANA STUDI',
            'matkul' => Matakuliah::with('programstudi','mahasiswa','tahunakademik')
            ->where('programstudi_id',Auth::user()->Mahasiswa[0]->programstudi_id)
            // ->where('semester',Auth::user()->Mahasiswa[0]->semester)
            ->get(),
        ];
        $setting = Setting::all()->first();
        return view('mhs.printKrs_mhs', compact('data','setting'));

    }

    public function Biodata(){
        $data = [
            'title' => 'Biodata',
            'biodata'=> Mahasiswa::with('user','dosen','programstudi')
            ->where('user_id', Auth::user()->id)
            ->get(),
        ];
        
        
        return view('mhs.biodata_mhs', compact('data'));
    }
}