<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = [
        'tahunakademik_id',
        'matakuliah_id',
        'mahasiswa_npm',
        'kelas_id',
        'k_matakuliah',
        'krs',
        'nidn',
        'kunci',
        'nilai',
        'ket'
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

    public function tahunakademik()
    {
        return $this->belongsTo(Tahun_Akademik::class,'tahunakademik_id','id');
    }
    
    public function programstudi()
    {
        return $this->hasMany(Programstudi::class,'programstudi','id');
    }

    public function setting()
    {
        return $this->hasMany(Programstudi::class,'tahun_akademik','id');
    }
}
