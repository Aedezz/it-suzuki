<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpembuatan extends Model
{
    use HasFactory;

    protected $table = 'form_user';
    protected $fillable = [
        'nik', 'nama_lengkap', 'jabatan', 'divisi_cabang', 'keterangan',
        'aplikasi', 'modul', 'nomor', 'tanggal', 'cek'
    ];    
        public $timestamps = false;
}
