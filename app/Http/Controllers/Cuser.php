<?php

namespace App\Http\Controllers;

use App\Models\Muser;

use Illuminate\Http\Request;

class Cuser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $pembuatan = Muser::get();
       return view('pembuatan.index', compact('pembuatan'));
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
            'nik'=>'required|string|max:25',
            'nama_lengkap'=> 'required|string|max:100',
            'jabatan'=> 'required|string|max:100',
            'divisi_cabang'=> 'required|string|max:100',
            'keterangan'=> 'required|string|max:100',
            'aplikasi'=> 'string|max:100',
            'modul'=> 'required|string|max:100',
        ]);
        
        Muser::create([
         'nik'=> $request->nik,
         'nama_lengkap'=> $request->nama_lengkap,
         'jabatan'=> $request->jabatan,
         'divisi_cabang'=> $request->divisi_cabang,
         'keterangan'=> $request->keterangan,
         'aplikasi'=> $request->aplikasi,
         'modul'=> $request->modul,
        ]);

        return redirect()->route('pembuatan.index')->with('success', 'Data berhasil disimpan!');

        
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
