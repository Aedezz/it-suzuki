<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Laporan extends Controller
{
    public function index()
    {
        // Fetch distinct years from the 'tanggal' field in 'form_install' table
        $years = DB::table('form_install')
            ->select(DB::raw('YEAR(tanggal) as year'))
            ->distinct()
            ->orderBy('year', 'asc') // Optional: Order years from oldest to newest
            ->get();

        return view('form-instalasi.laporan', compact('years'));
    }
}
