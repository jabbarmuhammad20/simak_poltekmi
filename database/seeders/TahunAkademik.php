<?php

namespace Database\Seeders;

use App\Models\Tahun_Akademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademik extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               'tahun_akademik'=>'2023-2024',
            ],
            [
               'tahun_akademik'=>'2024-2025',
            ],
        ];

        foreach ($data as $dt) {
            Tahun_Akademik::create($dt);
        }
    }
}
