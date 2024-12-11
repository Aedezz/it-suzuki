<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChecklistPembuatanController extends Controller

    {
    // Menampilkan semua data formUser menggunakan Query Builder
   // Menampilkan hanya data dengan status "Selesai" (cek = 1)
   public function index()
   {
       // Mengambil data dengan kondisi cek = 1
       $ceklistData = DB::table('form_user')->where('cek', 1)->get();

       // Mengirimkan data ke view checklist
       return view('form-pembuatan.checklist', compact('ceklistData'));
   }

   public function updateStatus($id)
   {
       // Mengambil data status (cek) berdasarkan id
       $data = DB::table('form_user')->where('id', $id)->first();
   
       // Periksa apakah data ditemukan
       if (!$data) {
           return response()->json(['message' => 'Data tidak ditemukan'], 404);
       }
   
       // Ubah status menjadi 2 (ditandai selesai)
       $newStatus = 2;
   
       // Update status di database
       DB::table('form_user')->where('id', $id)->update(['cek' => $newStatus]);
   
       // Mengirim response sukses
       return response()->json(['message' => 'Status berhasil diperbarui']);
   }
   
    }
