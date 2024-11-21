<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // Menampilkan daftar semua grup
    public function index()
    {
        $barangs = DB::table('barang')->get(); // Ambil semua grup
        return view('barang.index', compact('barangs')); // Kirim ke view index
    }

    // Menampilkan form untuk menambahkan grup baru
    public function create()
    {
        return view('barang.create'); // Menampilkan form create
    }

    // Menyimpan grup baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        // Menambahkan grup baru
        DB::table('barang')->insert([
            'nama' => $request->input('nama'),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit grup
    public function edit($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan');
        }

        return view('barang.edit', compact('barang')); // Kirim data grup ke form edit
    }

    // Mengupdate informasi grup
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        DB::table('barang')->where('id', $id)->update([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }
}