<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru'; // Nama tabel di database

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'nip',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan model JadwalKelas
    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'guru_id');
    }
}