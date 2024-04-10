<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $fillable = [
       'tahun_akademik',
       'ganjil_genap',
    ];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class,'tahunakademik_id','id');
    }
}
