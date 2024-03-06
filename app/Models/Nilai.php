<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai_tabel';
    protected $fillable = [
    'matakuliah_id',
    'k_matakuliah',
    'nama_matakuliah',
    'mahasiswa_npm',
    'krs',
    'nidn',
    'nilai',
    'ket',
    ];

    public function Matakuliah()
    {
     return $this->hasMany('App\Models\Matakuliah');
    }



}
