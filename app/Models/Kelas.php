<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'kode',
        'ruangkelas',
        'namakelas',
        'hari',
        'jam'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id', 'id');
    }
    
}
