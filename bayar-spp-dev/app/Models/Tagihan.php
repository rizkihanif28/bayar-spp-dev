<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'jumlah',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
