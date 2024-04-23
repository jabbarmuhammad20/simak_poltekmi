<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Update_semesterExport implements FromCollection, WithMapping, WithHeadings
{
    private $index = 0; // Initialize row number

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function map($mahasiswa): array
    {
        $this->index++;

        return [
            $this->index,
            $mahasiswa->tahun_masuk,
            $mahasiswa->npm,
            $mahasiswa->User->name,
            $mahasiswa->programstudi->programstudi,
            $mahasiswa->semester,
            $mahasiswa->aktif,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun Masuk',
            'NPM',
            'Nama',
            'Program Studi',
            'Semester',
            'Aktif',
        ];
    }
}
