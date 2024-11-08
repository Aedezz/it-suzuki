<?php

namespace App\Http\Controllers;

use App\Models\Mperbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perangkatController extends Controller
{

    // public function index()
    // {
    //    $pembuatan = Mperbaikan::get();
    //    return view('form-db.perbaikan', compact('pembuatan'));
    // }

    public function create()
    {
        return view('perbaikan');
    }

    public function store(Request $request)
    {

        $currentMonth = date('m');  // Bulan saat ini
        $currentYear = date('y');   // Tahun saat ini

        // Ambil entri terakhir berdasarkan nomor terbesar
        $lastEntry = Mperbaikan::orderByDesc('nomor')->first();

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
        


        Mperbaikan::create([
            'nomor' => $formattedNumber,
            'nik' => $request->input('nik'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jabatan' => $request->input('jabatan'),
            'divisi_cabang' => $request->input('divisi_cabang'),
            'kode_asset' => $request->input('kode_asset'),
            'tgl_beli' => $request->input('tgl_beli'),
            'nama_barang' => $request->input('nama_barang'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi' => $request->input('spesifikasi'),
            'keluhan' => $request->input('keluhan'),
            'tanggal' => now()->format('Y-m-d'),
            'it' => $request->it,
            'date_it' =>1,
            'cek' => 1,
        ]);

        dd($request->all());

        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan.');
    }
}


