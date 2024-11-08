<?php

namespace App\Http\Controllers;

use App\Models\MInstal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function create()
    {
        return view('form-db/pc');
    }

    public function store(Request $request)
    {
        $currentMonth = date('m');  // Bulan saat ini
        $currentYear = date('y');   // Tahun saat ini

        // Ambil entri terakhir berdasarkan nomor terbesar
        $lastEntry = MInstal::orderByDesc('nomor')->first();

        // Menentukan nomor berikutnya
        if ($lastEntry) {
            // Ambil 4 digit terakhir dari nomor
            $lastNumber = (int) substr($lastEntry->nomor, -4);
            $nextNumber = $lastNumber + 1;
        } else {
            // Jika belum ada entri, mulai dari nomor 1
            $nextNumber = 1;
        }

        // Format nomor baru (STD/11/24/0001)
        $formattedNumber = sprintf('STD/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);

        // Simpan data baru ke dalam tabel 'it_magang' menggunakan model
        MInstal::create([
            'nik' => $request->input('nik'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jabatan' => $request->input('jabatan'),
            'divisi_cabang' => $request->input('divisi_cabang'),
            'kode_asset' => $request->input('kode_asset'),
            'nomor' => $formattedNumber,
            'cek' => 0,  // Set nilai cek ke 0
            'tanggal' => now()->format('Y-m-d')  // Set tanggal ke hari ini
        ]);

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
    }
}
