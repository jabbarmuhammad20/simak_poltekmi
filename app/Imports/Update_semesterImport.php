<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Update_semesterImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
            foreach ($rows as $row) 
            {
                $mahasiswa = Mahasiswa::find($row['NPM'])->get();
                $mahasiswa->semester = $row['Semester'];
                $mahasiswa->update();
            }
    }
}
