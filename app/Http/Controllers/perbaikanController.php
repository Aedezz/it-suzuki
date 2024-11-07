<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor'         => 'required|string|max:255',
            'nama_lengkap'       => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'divisi_cabang'       => 'required|string|max:255',
            'fasilitas_ruangan'       => 'required|string|max:255',
            'kode_asset'         => 'required|string|max:255',
            'tgl_beli' => 'required|date',
            'nama_barang'         => 'required|string|max:255',
            'jumlah'         => 'required|string|max:255',
            'spesifikasi'         => 'required|string|max:255',
            'keluhan'         => 'required|string|max:255',
        ]);

        Mperbaikan::create([
            'nomor'               => $request->nomor,
            'nama_lengkap'             => $request->nama_lengkap,
            'jabatan'        => $request->jabatan,
            'divisi_cabang'         => $request->divisi_cabang,
            'kode_asset'        => $request->kode_asset,
            'tgl_beli'                      => $request->tgl_beli,
            'nama_barang'         => $request->nama_barang,
            'jumlah'         => $request->jumlah,
            'spesifikasi'         => $request->spesifikasi,
            'keluhan'         => $request->keluhan,
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
