<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_tabel';
    protected $fillable = [
        'user_id',
        'npm',
        'semester',
        'prog_studi',
        'k_dosenwali',
        'aktif',
        'ket',
    ];
    

}