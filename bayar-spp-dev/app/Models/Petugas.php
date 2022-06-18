<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'jenis_kelamin'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function histori()
    {
        return $this->hasMany(Histori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
