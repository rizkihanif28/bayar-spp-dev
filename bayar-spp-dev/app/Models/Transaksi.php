<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'petugas_id',
        'siswa_id',
        'periode',
        'nis',
        'jumlah',
        'tanggal_bayar'
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function histori()
    {
        return $this->hasOne(Histori::class);
    }
}
