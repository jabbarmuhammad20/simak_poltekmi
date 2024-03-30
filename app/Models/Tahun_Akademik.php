<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Tahun_Akademik extends Model
{
    use HasFactory;
    protected $table = 'tahun_akademik';
    protected $fillable = [
        'tahun_akademik',
    ];
    
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class,'id','tahun_akademik_id');
    }
}