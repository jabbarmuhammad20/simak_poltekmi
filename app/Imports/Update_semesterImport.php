<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Update_semesterImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $mahasiswa = Mahasiswa::where('npm', $row['npm'])->first();

            if ($mahasiswa) {
                $mahasiswa->semester = $row['semester'];
                $mahasiswa->save();
            } else {
                echo "Mahasiswa with npm: {$row['npm']} not found.\n";
            }
        }
    }
}
