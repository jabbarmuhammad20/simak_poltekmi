<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'user_id',
        'npm',
        'tahun_masuk',
        'semester',
        'kelas_id',
        'programstudi_id',
        'kelas_id',
        'dosen_id',
        'nik_mhs',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'desa',
        'kec',
        'kab',
        'prov',
        'aktif',
        'ket',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class,'semester','id');
    }

    public function programstudi()
    {
        return $this->belongsTo(Programstudi::class,'programstudi_id','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }
}