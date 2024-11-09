<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mperbaikan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'form_perangkat';
    protected $fillable = ['nomor', 'nama_lengkap', 'tanggal', 'nik', 'jabatan', 'divisi_cabang', 'kode_asset', 'tgl_beli', 'nama_barang',  'jumlah', 'spesifikasi', 'keluhan', 'it', 'date_it', 'cek'];
}
