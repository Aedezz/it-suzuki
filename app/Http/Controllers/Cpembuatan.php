<?php

namespace App\Http\Controllers;

use App\Models\Mpembuatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpembuatan extends Controller
{
    public function create()
    {
        return view('user.pembuatan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|string|max:25', // NIK harus berupa angka dan memiliki 8 digit
            'nama_lengkap' => 'required|string|max:100', // Nama lengkap harus string dan max 255 karakter
            'jabatan' => 'required|string|max:100', // Jabatan harus string dan max 100 karakter
            'divisi_cabang' => 'required|string|max:100', // Divisi/cabang harus string dan max 100 karakter
            'keterangan' => '|string|max:100', // Keterangan bersifat opsional, tetapi jika ada, maksimal 255 karakter
            'aplikasi' => 'array', // Aplikasi harus berupa array jika diisi
            'aplikasi.*' => 'string|max:100', // Setiap aplikasi dalam array harus string
            'modul' => 'string|max:100', 
        ]);

<<<<<<< Updated upstream
        // dd($request->all());
        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
=======
        // Mendapatkan bulan dan tahun sekarang
        $currentMonth = date('m');
        $currentYear = date('y');

        // Mendapatkan entri terakhir untuk nomor
        $lastEntry = Mpembuatan::select('nomor')
            ->whereRaw('SUBSTRING(nomor, -6) REGEXP "^[0-9]+$"')
            ->orderBy(DB::raw('CAST(SUBSTRING(nomor, -6) AS UNSIGNED)'), 'desc')
            ->first();

        // Menentukan nomor urut berikutnya
        $nextNumber = $lastEntry ? (int) substr($lastEntry->nomor, -6) + 1 : 1;

        // Format nomor sesuai dengan aturan
        $formattedNumber = sprintf('SLV/%s/%s/%06d', $currentMonth, $currentYear, $nextNumber);

        // Menyimpan data ke dalam tabel Mpembuatan
        $pembuatan = Mpembuatan::create([
            'nik' => $request->input('nik'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jabatan' => $request->input('jabatan'),
            'divisi_cabang' => $request->input('divisi_cabang'),
            'keterangan' => $request->input('keterangan'),
            'aplikasi' => implode(',', $request->input('aplikasi', [])),
            'modul' => $request->input('modul'),
            'nomor' => $formattedNumber,
            'tanggal' => now()->format('y-m-d'),
            'cek' => 0,
        ]);

        // Redirect ke halaman form dengan data baru yang disimpan
        return redirect()->route('pembuatan.create')
            ->with('success', 'Data berhasil disimpan')
            ->with('data', $pembuatan);
>>>>>>> Stashed changes
    }
}
