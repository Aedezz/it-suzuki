<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChecklistPerbaikanController extends Controller

    {
    // Menampilkan semua data formUser menggunakan Query Builder
   // Menampilkan hanya data dengan status "Selesai" (cek = 1)
public function index()
{
    // Mengambil hanya data yang statusnya "Selesai" (cek = 1)
    $form = DB::table('form_perangkat')->where('cek', 1)->get();
    
    // Mengirim data ke view
    return view('perbaikan.form.checklist', compact('form'));
}
    }
