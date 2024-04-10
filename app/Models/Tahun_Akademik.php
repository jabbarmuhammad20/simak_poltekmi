<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Tahun_Akademik extends Model
{
    use HasFactory;
    protected $table = 'tahunakademik';
    protected $fillable = [
        'tahun_akademik',
    ];
    
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class,'id','tahunakademik_id');
    }
    public function nilai()
    {
        return $this->belongsTo(Nilai::class,'tahunakademik_id','id');
    }
    
}