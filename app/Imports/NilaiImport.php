<?php

namespace App\Imports;

use App\Models\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
            foreach ($rows as $row) 
            {
                Nilai::create([
                    'tahunakademik_id' => $row['tahunakademik_id'],
                    'kelas_id' => $row['kelas_id'],
                    'matakuliah_id' => $row['matakuliah_id'],
                    'mahasiswa_npm' => $row['npm'],
                    'k_matakuliah' => $row['k_matakuliah'],
                    'nilai' => $row['nilai'],
                ]);
            }
    }
}
