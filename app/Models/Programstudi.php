<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programstudi extends Model
{
    use HasFactory;
    protected $table = 'programstudi';
    protected $fillable = [
        'kode',
        'programstudi'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class,'id','matakuliah_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'id','programstudi_id');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class,'programstudi_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'programstudi_id','id');
    }
}
