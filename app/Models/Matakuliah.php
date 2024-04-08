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
        'tahun_akademik_id',
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
        return $this->hasMany(Tahun_Akademik::class,'id','tahun_akademik_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class,'id','semester');
    }
    public function programstudi()
    {
        return $this->belongsTo(Programstudi::class,'id','programstudi');
    }
}