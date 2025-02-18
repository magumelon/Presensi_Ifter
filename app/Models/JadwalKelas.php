<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kelas'; // Nama tabel di database

    protected $fillable = [
        'matapelajaran',
        'guru_id',
        'jam',
        'hari',
    ];

    // Relasi dengan model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}