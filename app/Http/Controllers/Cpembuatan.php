<?php

namespace App\Http\Controllers;

use App\Models\Mpembuatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // Perbaikan kapitalisasi

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

// Ambil entri terakhir berdasarkan nomor terbesar (4 digit terakhir)
$lastEntry = Mpembuatan::select('nomor')
    ->whereRaw('SUBSTRING(nomor, -4) REGEXP "^[0-9]+$"')  // Ambil 4 digit terakhir jika hanya angka
    ->orderBy(DB::raw('CAST(SUBSTRING(nomor, -4) AS UNSIGNED)'), 'desc')  // Urutkan berdasarkan 4 digit terakhir
    ->first();

// Menentukan nomor berikutnya
if ($lastEntry) {
    // Ambil 4 digit terakhir dari nomor dan tambahkan 1
    $lastNumber = (int) substr($lastEntry->nomor, -4);
    $nextNumber = $lastNumber + 1;
} else {
    // Jika belum ada entri, mulai dari nomor 1
    $nextNumber = 1;
}

// Format nomor baru (STD/MM/YY/XXXX)
$formattedNumber = sprintf('SLV/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);


        // Simpan data baru ke dalam tabel 'data_coba' menggunakan model
        Mpembuatan::create([
            'nik' => $request->input('nik'),
            'nama_lengkap'=> $request->input('nama_lengkap'),
            'jabatan'=> $request->input('jabatan'),
            'divisi_cabang'=> $request->input('divisi_cabang'),
            'keterangan'=> $request->input('keterangan'),  
            'aplikasi'=> implode(',', $request->input('aplikasi', [])),
            'modul'=> $request->input('modul'),
            'nomor'=> $formattedNumber,
            'tanggal'=> now()->format('y-m-d'),
            'cek'=> 0,  // Set nilai cek ke 0
        ]);

        dd($request->all());
        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
    }
}
