<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'kelas'; // Sesuaikan dengan nama tabel aslinya

    // Kolom yang bisa diisi (optional)
    protected $fillable = [
        'nama_kelas', // ganti sesuai kolom yang ada di tabel kelas kamu
    ];
}
