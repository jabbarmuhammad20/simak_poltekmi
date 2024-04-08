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
        return $this->hasMany(Matakuliah::class,'id','matakuliah_id');
    }
}
