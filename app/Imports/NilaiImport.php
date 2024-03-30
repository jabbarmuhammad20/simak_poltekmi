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
            // $nilai = Mahasiswa ::where('npm',$row['npm'])->first();
            
            // if($nilai != null ){
            foreach ($rows as $row) 
            {
                Nilai::create([
                    'matakuliah_id' => $row['matakuliah_id'],
                    'mahasiswa_npm' => $row['npm'],
                    'k_matakuliah' => $row['k_matakuliah'],
                    'nilai' => $row['nilai'],
                ]);
            }
        }
    }
// }
