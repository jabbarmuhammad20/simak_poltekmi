<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'id',
        'nidn',
        'user_id',
        'nama',
        'prog_studi',
    ];

    public function Matakuliah()
    {
     return $this->hasMany(Matakuliah::class);
    }

    public function User()
    {
     return $this->belongsTo(User::class);
    }

    public function getNonDosenIds()
    {
        $existingDosenIds = Dosen::pluck('user_id')->toArray();
        return User::whereNotIn('id', $existingDosenIds)
            ->where('type', '2')
            ->get();
    }
}