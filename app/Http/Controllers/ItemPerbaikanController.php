<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemPerbaikanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    public function index()
    {
        // Mengambil semua data dari tabel item
        $item = DB::table('item')->get();
        
        // Mengirim data ke view
        return view('perbaikan.services.item.item', compact('item'));
    }

    // Menampilkan form untuk menambah data
    public function create()
    {
        return view('perbaikan.services.create');
    }

    // Menyimpan data ke tabel item
    public function store(Request $request)
    {
        // Validasi input nama
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Menyimpan data ke tabel item
        DB::table('item')->insert([
            'nama' => $request->nama,
        ]);

        // Redirect ke halaman index atau halaman lain setelah data disimpan
        return redirect()->route('item.index')->with('success', 'Item berhasil ditambahkan!');
    }

    public function edit($id)
{
    // Mengambil data item berdasarkan ID
    $item = DB::table('item')->where('id', $id)->first();
    
    // Jika item tidak ditemukan, arahkan ke halaman index
    if (!$item) {
        return redirect()->route('item.index')->with('error', 'Item tidak ditemukan!');
    }
    
    // Mengirim data item ke view untuk diedit
    return view('perbaikan.services.item.edit', compact('item'));
}

public function update(Request $request, $id)
{
    // Validasi input nama
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    // Memperbarui data item di tabel item berdasarkan ID
    $update = DB::table('item')
        ->where('id', $id)
        ->update([
            'nama' => $request->nama,
        ]);

    // Cek apakah update berhasil
    if ($update) {
        return redirect()->route('item.index')->with('success', 'Item berhasil diperbarui!');
    } else {
        return redirect()->route('item.index')->with('error', 'Item gagal diperbarui!');
    }
}

}
