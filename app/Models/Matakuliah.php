<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
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
        return $this->hasMany(Nilai::class);
    }

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'dosen_id');
    }
}