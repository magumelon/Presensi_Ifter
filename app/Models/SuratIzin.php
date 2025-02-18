<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    // Menentukan nama tabel yang digunakan
    protected $table = 'surat_izin';

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'murid_id',         // Referensi ke tabel murid
        'wali_kelas',       // Nama wali kelas tujuan
        'alasan',           // Alasan izin yang diisi murid
        'file_surat',       // Lokasi file PDF surat izin
        'status',           // Status surat (Menunggu, Diterima, atau Ditolak)
        'tanggal_pengajuan', // Tanggal surat diajukan
        'tanggal_verifikasi', // Tanggal surat diverifikasi
        'guru_verifikator'  // Referensi ke tabel guru untuk guru yang memverifikasi
    ];

    // Menonaktifkan fitur timestamp
    public $timestamps = false; // Tidak menggunakan created_at dan updated_at
}