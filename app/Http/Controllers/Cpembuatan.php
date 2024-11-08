<?php

namespace App\Http\Controllers;

use App\Models\Mpembuatan;
use Illuminate\Http\Request;

class Cpembuatan extends Controller
{
    public function create()
    {
        return view('pembuatan');
    }

    public function store(Request $request)
    {
        $currentMonth = date('m');  // Bulan saat ini
        $currentYear = date('y');   // Tahun saat ini

        // Ambil entri terakhir berdasarkan nomor terbesar
        $lastEntry = Mpembuatan::orderByDesc('nomor')->first();

        // Menentukan nomor berikutnya
        if ($lastEntry) {
            // Ambil 4 digit terakhir dari nomor
            $lastNumber = (int) substr($lastEntry->nomor, -4);
            $nextNumber = $lastNumber + 1;
        } else {
            // Jika belum ada entri, mulai dari nomor 1
            $nextNumber = 1;
        }

        // Format nomor baru (SLV/11/24/0001)
        $formattedNumber = sprintf('SLV/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);

        // Simpan data baru ke dalam tabel 'data_coba' menggunakan model
        Mpembuatan::create([
            'nomor' => $formattedNumber,
            'nik' => $request->input('nik'),
            'tanggal' => now()->format(format: 'Y-m-d'),// Set tanggal ke hari ini
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jabatan'=> $request->input('jabatan'),
            'divisi_cabang'=> $request->input('divisi_cabang'),
            'keterangan'=> $request->input('keterangan'),  // Corrected typo
            'aplikasi' => implode(',', $request->input('aplikasi', [])),
            'modul'=> $request->input('modul'),
            'cek' => 0,  // Set nilai cek ke 0
        ]);

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
    }
}
