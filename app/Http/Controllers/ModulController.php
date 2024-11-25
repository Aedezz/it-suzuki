<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulController extends Controller
{
    // Menampilkan data (Read)
    public function index(Request $request)
{
    $moduls = collect(); // Default data kosong
    $kategoris = DB::table('kategori')->get(); // Ambil daftar kategori untuk dropdown

    // Jika filter kategori diisi, jalankan query
    if ($request->has('id_kategori') && $request->id_kategori != '') {
        $moduls = DB::table('modul')
            ->join('kategori', 'modul.id_kategori', '=', 'kategori.id_kategori')
            ->select('modul.*', 'kategori.nama_kategori')
            ->where('modul.id_kategori', $request->id_kategori)
            ->get();
    }

    return view('modul.index', compact('moduls', 'kategoris'));
}


    public function create()
    {
        $kategoris = DB::table('kategori')->get(); // Ambil semua data kategori
        return view('modul.create', compact('kategoris'));
    }

    // Menyimpan data baru ke database (Store)
    public function store(Request $request)
{
    $request->validate([
        'nama_modul' => 'required|string|max:255',
        'id_kategori' => 'required|exists:kategori,id_kategori',
    ]);

    DB::table('modul')->insert([
        'nama_modul' => $request->nama_modul,
        'id_kategori' => $request->id_kategori,
    ]);

    // Redirect ke halaman modul.index dengan filter kategori yang sama
    return redirect()->route('modul.index', ['id_kategori' => $request->id_kategori])
                    ->with('success', 'Modul berhasil ditambahkan!');
}

public function edit($id_modul)
{
    $modul = DB::table('modul')
        ->join('kategori', 'modul.id_kategori', '=', 'kategori.id_kategori')
        ->select('modul.*', 'kategori.nama_kategori')
        ->where('modul.id_modul', $id_modul)
        ->first();

    if (!$modul) {
        return redirect()->route('modul.index')->with('error', 'Modul tidak ditemukan.');
    }

    // Kirim id_kategori ke view untuk digunakan kembali di formulir
    $id_kategori = $modul->id_kategori;

    return view('modul.edit', compact('modul', 'id_kategori'));
}

public function update(Request $request, $id_modul)
{
    $validated = $request->validate([
        'nama_modul' => 'required|string|max:255',
    ]);

    $modul = DB::table('modul')->where('id_modul', $id_modul)->first();

    if (!$modul) {
        return redirect()->route('modul.index')->with('error', 'Modul tidak ditemukan.');
    }

    DB::table('modul')
        ->where('id_modul', $id_modul)
        ->update([
            'nama_modul' => $request->nama_modul,
        ]);

    $id_kategori = $modul->id_kategori; // Tetap gunakan kategori asli

    return redirect()->route('modul.index', ['id_kategori' => $id_kategori])
                     ->with('success', 'Modul berhasil diperbarui!');
}

public function destroy($id_modul, Request $request)
{
    $modul = DB::table('modul')->where('id_modul', $id_modul)->first();

    if ($modul) {
        DB::table('modul')->where('id_modul', $id_modul)->delete();
    }

    $id_kategori = $modul->id_kategori; // Tetap gunakan kategori asli

    return redirect()->route('modul.index', ['id_kategori' => $id_kategori])
                     ->with('success', 'Modul berhasil dihapus.');
}


}


