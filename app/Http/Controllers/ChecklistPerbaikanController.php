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

   // Fungsi untuk mengubah status berdasarkan ID
   public function updateStatus($id)
   {
       // Mengambil data status (cek) berdasarkan id
       $data = DB::table('form_perangkat')->where('id', $id)->first();
       
       
       
   
       // Periksa apakah data ditemukan
       if (!$data) {
           return response()->json(['message' => 'Data tidak ditemukan'], 404);
       }
   
       // Ubah status menjadi 2 (ditandai selesai)
       $newStatus = 2;
   
       // Update status di database
       DB::table('form_perangkat')->where('id', $id)->update(['cek' => $newStatus]);
   
       // Mengirim response sukses
       return response()->json(['message' => 'Status berhasil diperbarui']);
   }
   
   
    }
