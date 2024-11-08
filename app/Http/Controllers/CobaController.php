<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    public function create()
    {
        return view('coba');
    }

    public function store(Request $request)
    {
        $currentMonth = date('m');
        $currentYear = date('y');

        $lastEntry = DB::table('data_coba')
                        ->whereMonth('tanggal', $currentMonth)
                        ->whereYear('tanggal', $currentYear)
                        ->orderBy('id', 'desc')
                        ->first();

        $nextNumber = $lastEntry ? ((int) substr($lastEntry->nomor, -4)) + 1 : 1;
        $formattedNumber = sprintf('SLV/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);

        DB::table('data_coba')->insert([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'nomor' => $formattedNumber,
            'cek' => 0, // Set nilai cek ke 0
            'tanggal' => now()->format('Y-m-d') // Set tanggal ke hari ini
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
    }
}
