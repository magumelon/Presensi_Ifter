<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSiswa extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Nama tabel di database

    protected $fillable = [
        'murid_id', // ID murid
        'tanggal', // Tanggal kehadiran
        'status', // Status kehadiran
    ];

    // Relasi dengan model User
    public function murid()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}