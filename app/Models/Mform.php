<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mform extends Model
{
    use HasFactory;
    protected $table = 'perbaikan';
    protected $fillable = ['no_induk', 'nama_leng', 'jabatan', 'divisi_cbg', 'kode_ass', 'tanggal', 'nama_barang',  'jumlah', 'spesifikasi', 'keluhan'];
}
