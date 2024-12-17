<?php

namespace App\Http\Controllers;

use App\Models\Mpembuatan;  // Menggunakan model Mpembuatan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpembuatan extends Controller
{
    // Menampilkan form input dengan data session jika ada
    public function create()
    {
        return view('form-db.pembuatan');
    }

    // Menyimpan data input form ke dalam database
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
    $currentMonth = now()->format('m');
    $currentYear = now()->format('y');

    // Mendapatkan entri terakhir untuk nomor
    $lastEntry = Mpembuatan::select('nomor')
        ->whereRaw('SUBSTRING(nomor, -6) REGEXP "^[0-9]+$"')
        ->orderBy(DB::raw('CAST(SUBSTRING(nomor, -6) AS UNSIGNED)'), 'desc')
        ->first();

    // Menentukan nomor urut berikutnya
    $nextNumber = $lastEntry ? (int) substr($lastEntry->nomor, -6) + 1 : 1;

    // Format nomor sesuai aturan
    $formattedNumber = sprintf('SLV/%s/%s/%06d', $currentMonth, $currentYear, $nextNumber);

    // Menyimpan data ke dalam tabel Mpembuatan
    $savedata = Mpembuatan::create([
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap,
        'jabatan' => $request->jabatan,
        'divisi_cabang' => $request->divisi_cabang,
        'keterangan' => $request->keterangan,
        'aplikasi' => implode(',', $request->aplikasi ?? []),
        'modul' => $request->modul,
        'nomor' => $formattedNumber,
        'tanggal' => now()->format('Y-m-d'),
        'cek' => 0,
    ]);

    // Mengarahkan ke halaman pembuatan-show dengan membawa ID data yang baru disimpan
    return redirect()->route('pembuatan.show', ['data' => $savedata->id]);
}


    // Menampilkan detail data tertentu
    public function viewdata(Mpembuatan $data)
    {
        return view('form-db.pembuatan-show', compact('data'));
    }
}
