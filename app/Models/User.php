<?php

// app/Models/User.php
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

    public $timestamps = false; // Menonaktifkan timestamp

    // Menambahkan relasi ke model Murid
    public function murid()
    {
        return $this->hasOne(Murid::class, 'user_id'); // Sesuaikan dengan nama kolom yang benar di tabel murid
    }
}