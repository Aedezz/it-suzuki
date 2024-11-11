<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MInstal extends Model
{
     // Tentukan nama tabel yang digunakan
    protected $table = 'form_install';

     // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['nomor', 'tanggal', 'kode_asset', 'nik', 'nama_lengkap', 'jabatan', 'divisi_cabang', 'it', 'date_it', 'cek'];
 
     // Nonaktifkan timestamps karena kita tidak menggunakan created_at dan updated_at
    public $timestamps = false;
}
