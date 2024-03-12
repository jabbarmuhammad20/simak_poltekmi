<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Matakuliah;
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
        $matkul = Nilai::with('matakuliah','mahasiswa')->get();
        return view('mhs.nilai.daftarNilai_mhs', compact('matkul'));
    }

    public function daftarMatkul() {
        $matkul = Matakuliah::all();
        return view('mhs.matkul.daftarMatkul_mhs', compact('matkul'));
    }

    public function krs(Request $request) {
        if ($request->ajax()) {
            if ($request->isMethod('get')) {
                return $this->response(true, Matakuliah::with('Nilai')->get());
            }
        }
 
        $matkul = Setting::find(1);        
        return view('mhs.matkul.krs_mhs',compact('matkul'));
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

            Nilai::create([
                'matakuliah_id' => $request->matakuliah_id,
                'mahasiswa_npm' => Auth::user()->npm,
            ]);
    
            return $this->response(true, 'Berhasil menambah KRS.');
        }
    }
}