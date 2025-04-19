<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    // 🔁 Relasi ke tabel murid (jika user adalah murid)
    public function murid()
    {
        return $this->hasOne(Murid::class, 'user_id'); 
    }
    
    // Relasi ke tabel guru (jika user adalah guru)
    public function guru()
    {
        return $this->hasOne(Guru::class, 'user_id');
    }


    // 🔁 Relasi ke jadwal guru (jika user adalah guru)
    public function jadwalGuru()
    {
        return $this->hasMany(JadwalGuru::class, 'guru_id');
    }

    // ✅ Cek apakah user adalah murid
    public function isMurid()
    {
        return $this->role === 'murid';
    }

    // ✅ Cek apakah user adalah guru
    public function isGuru()
    {
        return $this->role === 'guru';
    }
}
