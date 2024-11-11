<?php

namespace App\Http\Controllers;

use App\Models\MInstal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function create()
    {
        return view('form-db.pc');
    }

    public function store(Request $request)
    {
        $currentMonth = date('m');  // Current month
        $currentYear = date('y');   // Current year

        // Retrieve the entry with the highest numeric part of `nomor`
        $lastEntry = MInstal::select('nomor')
            ->whereRaw('SUBSTRING(nomor, -6) REGEXP "^[0-9]+$"')
            ->orderBy(DB::raw('CAST(SUBSTRING(nomor, -6) AS UNSIGNED)'), 'desc')
            ->first();

        // Determine the next number
        if ($lastEntry) {
            // Extract the last 6 digits and increment
            $lastNumber = (int) substr($lastEntry->nomor, -6);
            $nextNumber = $lastNumber + 1;
        } else {
            // If no entries, start from 1
            $nextNumber = 1;
        }

        // Format the new number as `STD/MM/YY/XXXXXX`
        $formattedNumber = sprintf('STD/%s/%s/%06d', $currentMonth, $currentYear, $nextNumber);

        // Save the new data
        MInstal::create([
            'nik' => $request->input('nik'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jabatan' => $request->input('jabatan'),
            'divisi_cabang' => $request->input('divisi_cabang'),
            'kode_asset' => $request->input('kode_asset'),
            'nomor' => $formattedNumber,
            'cek' => 0,  // Set `cek` to 0
            'tanggal' => now()->format('Y-m-d')  // Set `tanggal` to today
        ]);

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
    }
}
