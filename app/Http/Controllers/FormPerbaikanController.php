<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPerbaikanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    public function index()
    {
        // Mengambil semua data dari tabel form_perangkat
        $modul = DB::table('form_perangkat')->get();
        
        // Mengirim data ke view
        return view('form-db.modul.modul', compact('modul'));
    }

    // Fungsi untuk memperbarui status
    public function updateStatus($id)
    {
        // Mengambil data status (cek) berdasarkan id
        $data = DB::table('form_perangkat')->where('id', $id)->first();
        
        // Cek status saat ini, jika 0 (Belum) ubah menjadi 1 (Selesai), jika 1 (Selesai) ubah menjadi 0 (Belum)
        $newStatus = ($data->cek == 0) ? 1 : 0;

        // Update status di database
        DB::table('form_perangkat')->where('id', $id)->update(['cek' => $newStatus]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('modul.index')->with('success', 'Status berhasil diperbarui.');
    }

    // Menampilkan form untuk mengedit form yang sudah ada
    public function edit($id)
    {
        // Menemukan data form berdasarkan id menggunakan Query Builder
        $formUser = DB::table('form_perangkat')->where('id', $id)->first();
        
        // Mengirim data formUser ke view
        return view('form-pembuatan.edit', compact('formUser'));
    }

    // Memperbarui data form
    public function update(Request $request, $id)
    {
        // Validasi input (menggunakan format yang sama dengan kode yang Anda berikan)
        $validated = $request->validate([
            'nomor' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'nik' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'divisi_cabang' => 'required|string|max:100',
            'kode_asset' => 'required|string|max:20',
            'tgl_beli' => 'required|date',
            'nama_barang' => 'required|string|max:100',
            'jumlah' => 'required|integer',
            'spesifikasi' => 'nullable|string',
            'keluhan' => 'nullable|string',
            'cek' => 'required|boolean',
        ]);

        // Memperbarui data formUser menggunakan Query Builder
        DB::table('form_perangkat')->where('id', $id)->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil diperbarui.');
    }

    // Menghapus data form
    public function destroy($id)
    {
        // Menghapus data form berdasarkan id menggunakan Query Builder
        DB::table('form_perangkat')->where('id', $id)->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('modul.index')->with('success', 'Form User berhasil dihapus.');
    }
}
