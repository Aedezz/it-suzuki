<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcoba extends Model
{
    // Tentukan nama tabel yang digunakan
    protected $table = 'data_coba';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['nik', 'nama', 'nomor', 'cek', 'tanggal'];

    // Nonaktifkan timestamps karena kita tidak menggunakan created_at dan updated_at
    public $timestamps = false;
}

