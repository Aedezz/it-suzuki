<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perbaikanController extends Controller
{

    // public function index()
    // {
    //     $perbaikan = Mperbaikan::get();
    //     return view('form-db.perbaikan', compact('perbaikan')); 
    // }


    public function create()
    {
        return view('perbaikan');
    }
        public function store(Request $request)
        {
            $currentMonth = date('m');
            $currentYear = date('y');
    
            $lastEntry = DB::table('form_perangkat')
                            ->whereMonth('tanggal', $currentMonth)
                            ->whereYear('tanggal', $currentYear)
                            ->orderBy('id', 'desc')
                            ->first();
    
            $nextNumber = $lastEntry ? ((int) substr($lastEntry->nomor, -4)) + 1 : 1;
            $nomor = sprintf('SPP/%s/%s/%04d', $currentMonth, $currentYear, $nextNumber);
            

            DB::table('form_perangkat')->insert([
                'nomor' => $nomor,
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
                'tanggal' => now()->format('Y-m-d'),
                'it' => $request->it,
                // 'date_it' =>1,
                'cek' => 1,
            ]);

            dd($request->all());

            return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan.');
        }
}
