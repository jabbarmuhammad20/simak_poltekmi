<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tahun_Akademik;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $fillable = [
        'k_matkul',
        'tahunakademik_id',
        'dosen_id',
        'programstudi_id',
        'nama_matakuliah',
        'sks',
        'semester',
        'aktif',
        'kunci',
        'ket',
    ];
    
    public function Nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'dosen_id');
    }

    public function tahunakademik()
    {
        return $this->hasMany(Tahun_Akademik::class,'id','tahunakademik_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class,'semester','id');
    }

    public function programstudi()
    {
        return $this->hasMany(Programstudi::class,'id','programstudi_id');
    }
       public function dosen()
    {
        return $this->hasMany(Dosen::class,'id','dosen_id');
    }
}