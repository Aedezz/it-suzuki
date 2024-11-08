<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Cpembuatan extends Controller
{
    private function generateNumber($prefix, $month, $year, $number) {
        return sprintf('%s/%02d/%02d/%06d', $prefix, $month, $year, $number);
    }

    public function create()
    {
        return view('pembuatan.create');
    }

    public function store(Request $request)
    {
        $request->merge(['tanggal' => Carbon::now()->toDateString()]);

        $request->validate([
            'nomor' => 'string|max:25',
            'tanggal' => 'date',
            'nik' => 'required|string|max:25',
            'nama_lengkap' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'divisi_cabang' => 'required|string|max:100',
            'keterangan' => 'required|string|max:100',
            'aplikasi' => 'array',
            'modul' => 'required|string|max:100',
        ]);

        // Step 1: Define prefix and get current month and year
        $prefix = 'SLV';
        $month = date('m'); // Current month in two digits
        $year = date('y'); // Last two digits of the current year

        // Simulate last entry check with a session variable (alternative to model-based logic)
        $lastNumber = session('last_number', 0); // Default to 0 if not set
        $newNumber = $lastNumber + 1;

        // Step 2: Generate the formatted `nomor`
        $nomor = $this->generateNumber($prefix, $month, $year, $newNumber);

        // Step 3: Save data in session or file (for testing)
        $data = [
            'nomor' => $nomor,
            'tanggal' => $request->tanggal,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'divisi_cabang' => $request->divisi_cabang,
            'keterangan' => $request->keterangan,
            'aplikasi' => implode(',', $request->input('aplikasi', [])),
            'modul' => $request->modul,
        ];

        // Store in session for testing purposes
        session(['last_number' => $newNumber, 'data' => $data]);

        return redirect()->route('pembuatan.index')->with('success', 'Data berhasil disimpan!');
    }
}
