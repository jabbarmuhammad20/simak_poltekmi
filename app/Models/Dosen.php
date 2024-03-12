<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;
class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen_tabel';
    protected $fillable = [
        'id',
        'nidn',
        'nama',
        'prog_studi',
    ];

    public function Matakuliah()
    {
     return $this->hasMany('App\Models\Matakuliah');
    }

    public function User()
    {
     return $this->hasMany('App\Models\Matakuliah');
    }
}