<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = [
        'matakuliah_id',
        'k_matakuliah',
        'mahasiswa_npm',
        'krs',
        'nidn',
        'kunci',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_npm', 'npm');
    }
}
