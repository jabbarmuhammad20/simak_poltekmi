<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Kelas;
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

    public function nilai()
    {
        $data = [
            'title' => 'Transkip Nilai',
            'matkul' => Nilai::with('matakuliah', 'mahasiswa')
                ->where('mahasiswa_npm', Auth::user()->npm)
                ->get(),
        ];

        // Tambahkan perhitungan untuk setiap semester
        $semesters = [1, 2, 3, 4, 5, 6, 7, 8];
        $semesterData = [];

        $totalSksKumulatif = 0;
        $totalNilaiKumulatif = 0;

        foreach ($semesters as $semester) {
            $totalSks = 0;
            $totalNilai = 0;
            foreach ($data['matkul'] as $n) {
                if ($n->Matakuliah->semester == $semester) {
                    $totalSks += $n->Matakuliah->sks;
                    $nilaiBobot = 0;
                    if ($n->nilai >= 80) {
                        $nilaiBobot = 4;
                    } elseif ($n->nilai >= 70) {
                        $nilaiBobot = 3;
                    } elseif ($n->nilai >= 60) {
                        $nilaiBobot = 2;
                    } elseif ($n->nilai >= 50) {
                        $nilaiBobot = 1;
                    }
                    $totalNilai += $nilaiBobot * $n->Matakuliah->sks;
                }
            }
            $ip = $totalSks ? $totalNilai / $totalSks : 0;
            $semesterData[$semester] = [
                'totalSks' => $totalSks,
                'ip' => $ip,
            ];

            // Tambahkan ke total kumulatif
            $totalSksKumulatif += $totalSks;
            $totalNilaiKumulatif += $totalNilai;
        }

        // Hitung IPK
        $ipk = $totalSksKumulatif ? $totalNilaiKumulatif / $totalSksKumulatif : 0;

        $data['semesterData'] = $semesterData;
        $data['totalSksKumulatif'] = $totalSksKumulatif;
        $data['ipk'] = $ipk;

        return view('mhs.nilai.daftarNilai_mhs', compact('data'));
    }


    public function daftarMatkul()
    {
        $data = [
            'title' => 'Daftar Matakuliah Aktif',
            'matkul' => Matakuliah::with('programstudi', 'mahasiswa', 'tahunakademik')
                ->where('programstudi_id', Auth::user()->Mahasiswa[0]->programstudi_id)
                ->where('semester',Auth::user()->Mahasiswa[0]->semester)
                ->get(),
        ];
        $setting = Setting::all()->first();
        return view('mhs.matkul.daftarMatkul_mhs', compact('data', 'setting'));
    }

    public function krs(Request $request)
    {
        if ($request->ajax()) {
            return $this->response(true, Matakuliah::with('Nilai')->get());
        }

        $data = [
            'title' => 'Kartu Rencana Studi',
            'krs' => Setting::find(1),
        ];
        return view('mhs.matkul.krs_mhs', compact('data'));
    }

    public function inputkrs(Request $request)
    {
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
    public function printKrs()
    {
        //sc sama dengan daftar matkul
        $data = [
            'title' => 'KARTU RENCANA STUDI',
            'matkul' => Matakuliah::with('programstudi', 'mahasiswa', 'tahunakademik')
                ->where('programstudi_id', Auth::user()->Mahasiswa[0]->programstudi_id)
                ->where('semester',Auth::user()->Mahasiswa[0]->semester)
                ->get(),
        ];
        $setting = Setting::all()->first();
        return view('mhs.printKrs_mhs', compact('data', 'setting'));
    }

    public function Biodata()
    {
        $data = [
            'title' => 'Biodata',
            'biodata' => Mahasiswa::with('user', 'dosen', 'programstudi', 'kelas')
                ->where('user_id', Auth::user()->id)
                ->get(),
        ];
        return view('mhs.biodata_mhs', compact('data'));
    }

    public function update_biodata(Request $request)
    {
        Mahasiswa::where('user_id', Auth::user()->id)->update([
            'nik_mhs' => $request->input('nik_mhs'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'alamat' => $request->input('alamat'),
            'desa' => $request->input('desa'),
            'kec' => $request->input('kec'),
            'kab' => $request->input('kab'),
            'prov' => $request->input('prov'),
            'nama_bapak' => $request->input('nama_bapak'),
            'nama_bapak' => $request->input('nama_ibu')
            ]);
        return redirect()->back()->with('success', 'Data Berhasil diubah !');
    }
}
