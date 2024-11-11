<?php

namespace App\Http\Controllers;

use App\Models\Mpembuatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpembuatan extends Controller
{
    public function create()
    {
        return view('form-db/pembuatan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|string|max:25', 
            'nama_lengkap' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100', 
            'divisi_cabang' => 'required|string|max:100',
            'keterangan' => 'nullable|string|max:100', 
            'aplikasi' => 'array',
            'aplikasi.*' => 'string|max:100', 
            'modul' => 'nullable|string|max:100', 
        ]);

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
    }
}
