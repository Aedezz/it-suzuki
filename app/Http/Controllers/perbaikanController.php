<?php

namespace App\Http\Controllers;
use App\Models\Mperbaikan;
use Illuminate\Http\Request;

class perbaikanController extends Controller
{
    public function create()
    {
        return view('form-db.perbaikan');
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
    
        // Format nomor baru (SPP/11/24/0001)
        $formattedNumber = sprintf('SPP/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);
    
        // Simpan data ke database
        $data = Mperbaikan::create([
            'nomor' => $formattedNumber,
            'tanggal' => now()->format('Y-m-d'),
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'divisi_cabang' => $request->divisi_cabang,
            'kode_asset' => $request->kode_asset,
            'tgl_beli' => $request->tgl_beli,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'spesifikasi' => $request->spesifikasi,
            'keluhan' => $request->keluhan,
            'cek' => 0,
        ]);
    
        // Redirect ke route 'table_perbaikan' dengan data yang baru disimpan
        return redirect()->route('table_perbaikan', ['id' => $data->id])->with('success', 'Data berhasil disimpan');

    }

    public function show($id)
{
    // Ambil data berdasarkan ID
    $data = Mperbaikan::findOrFail($id);

    // Kirim data ke view
    return view('perbaikan.table_perbaikan', compact('data'));
}

    
    
}
