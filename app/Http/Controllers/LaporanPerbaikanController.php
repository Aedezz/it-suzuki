<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPerbaikanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel form_perangkat        
        // Mengirim data ke view
        return view('perbaikan.form.laporan');
    }

}
