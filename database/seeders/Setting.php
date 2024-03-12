<?php

namespace Database\Seeders;

use App\Models\Setting as ModelsSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               'tahun_akademik'=>'2023-2024',
               'ganjil_genap'=>'1'
            ],
        ];

        foreach ($data as $dt) {
            ModelsSetting::create($dt);
        }
    }
}
