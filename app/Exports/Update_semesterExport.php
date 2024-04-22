<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Update_semesterExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function map($mahasiswa):array
        {
            return [
                //data yang dari kolom tabel database yang akan diambil
                $mahasiswa->id,
                $mahasiswa->tahun_masuk,
                $mahasiswa->npm,
                $mahasiswa->User->name,
                $mahasiswa->programstudi->programstudi,
                $mahasiswa->semester,
                $mahasiswa->aktif,
            ];
        }

        public function headings():array
        {
            return [
                //pastikan urut dan jumlahnya sesuai dengan yang ada di mapping-data atau table di database
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
