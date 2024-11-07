<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muser extends Model
{
    use HasFactory;

    protected $table = 'form_user';

    protected $fillable =[
    'nomor',
    'tanggal',
    'nik',
    'nama_lengkap',
    'jabatan',
    'divisi_cabang',
    'keterangan',
    'aplikasi',
    'modul',
    'it',
    'date_it',
    ];
}
