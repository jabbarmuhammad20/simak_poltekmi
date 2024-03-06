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

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm', 'npm');
    }
}
