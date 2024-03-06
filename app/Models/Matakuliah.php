<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;
use App\Models\Dosen;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah_tabel';
    protected $fillable = [
    'k_matkul',
    'dosen_id',
    'prog_studi',
    'nama_matakuliah',
    'sks',
    'semester',
    'aktif',
    'ket',
    ];
    public function Nilai()
    {
        // Setiap user akan memiliki banyak data
        return $this->hasMany('App\Models\Nilai');
    }

    public function Dosen()
    {
        return $this->belongsTo('App\Models\Dosen');
    }
}