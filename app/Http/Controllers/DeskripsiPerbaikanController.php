<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeskripsiPerbaikanController extends Controller
{
    // Menampilkan data (Read)
    public function index(Request $request)
    {
        // Ambil daftar cabang untuk dropdown filter
        $cabang = DB::table('cabang')->select('id_cabang', 'nama_cabang')->get();
    
        // Ambil data username dan nama dari tabel user
        $users = DB::table('user')->select('id', 'username', 'nama')->get();
    
        // Query utama untuk data deskripsi
        $query = DB::table('deskripsi')
            ->join('cabang', 'deskripsi.id_cabang', '=', 'cabang.id_cabang')
            ->join('user', 'deskripsi.username', '=', 'user.username') // Relasi diperbaiki
            ->select(
                'deskripsi.id_deskripsi',
                'deskripsi.id_cabang',
                'deskripsi.tipe',
                'deskripsi.nama_deskripsi',
                'deskripsi.username',
                'cabang.nama_cabang',
                'user.nama'
            )
            ->distinct();
    
        // Cek apakah filter diterapkan
        $filterApplied = false;
    
        if ($request->has('id_cabang') && $request->id_cabang != '') {
            $query->where('deskripsi.id_cabang', $request->id_cabang);
            $filterApplied = true;
        }
    
        if ($request->has('username') && $request->username != '') {
            $query->where('user.username', $request->username);
            $filterApplied = true;
        }
    
        // Jika filter diterapkan, ambil data, jika tidak tampilkan semua
        $viewActivity = $filterApplied ? $query->get() : $query->get();
    
        // Eksekusi query
        $deskripsi = $query->get();
    
        $tipeAlias = [
            '1' => 'Moni',
            '2' => 'Banu',
            '3' => 'QPage',
        ];
    
        return view('perbaikan.general.deskripsi.deskripsi', compact('deskripsi', 'viewActivity', 'cabang', 'users', 'tipeAlias', 'filterApplied'));

    }
    
    

    // Menampilkan form tambah data (Create)
    public function create(Request $request)
    {
        $idCabang = $request->query('id_cabang');
        $cabang = DB::table('cabang')->where('id_cabang', $idCabang)->first();

        if (!$cabang) {
            return redirect()->back()->withErrors(['error' => 'Cabang not found.']);
        }

        $users = DB::table('user')->select('id', 'username', 'nama')->distinct()->get();
        return view('perbaikan.general.deskripsi.create', compact('cabang', 'users'));
    }

    // Menyimpan data baru ke database (Store)
    public function store(Request $request)
    {
        $request->validate([
            'id_cabang' => 'required',
            'tipe' => 'required',
            'nama_deskripsi' => 'required',
            'username' => 'required',
        ]);
    
        // Cek apakah data sudah ada di database
        $exists = DB::table('deskripsi')->where([
            ['id_cabang', '=', $request->id_cabang],
            ['tipe', '=', $request->tipe],
            ['nama_deskripsi', '=', $request->nama_deskripsi],
            ['username', '=', $request->username],
        ])->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'Data sudah ada!');
        }
    
        // Simpan data jika belum ada
        DB::table('deskripsi')->insert([
            'id_cabang' => $request->id_cabang,
            'tipe' => $request->tipe,
            'nama_deskripsi' => $request->nama_deskripsi,
            'username' => $request->username,
        ]);
    
        return redirect()->route('deskripsi.index')->with('success', 'Data berhasil disimpan!');
    }
    

    // Menampilkan form edit data (Edit)
    public function edit($id_deskripsi)
    {
        $deskripsi = DB::table('deskripsi')->where('id_deskripsi', $id_deskripsi)->first();

        if (!$deskripsi) {
            return redirect()->route('deskripsi.index')->with('error', 'Deskripsi tidak ditemukan.');
        }

        $cabang = DB::table('cabang')->where('id_cabang', $deskripsi->id_cabang)->first();
        if (!$cabang) {
            return redirect()->route('deskripsi.index')->with('error', 'Cabang tidak ditemukan.');
        }

        $users = DB::table('user')->select('id', 'username', 'nama')->distinct()->get();

        $tipeAlias = [
            '1' => 'Moni',
            '2' => 'Banu',
            '3' => 'QPage',
        ];

        return view('perbaikan.general.deskripsi.edit', compact('deskripsi', 'cabang', 'users', 'tipeAlias'));
    }

    // Memperbarui data di database (Update)
    public function update(Request $request, $id_deskripsi)
    {
        $request->validate([
            'id_cabang' => 'required|integer|exists:cabang,id_cabang',
            'tipe' => 'required|in:1,2,3',
            'nama_deskripsi' => 'required|string|max:50',
            'username' => 'required|string|max:50',
        ]);

        $deskripsi = DB::table('deskripsi')->where('id_deskripsi', $id_deskripsi)->first();

        if (!$deskripsi) {
            return redirect()->route('deskripsi.index')->with('error', 'Deskripsi tidak ditemukan.');
        }

        DB::table('deskripsi')
            ->where('id_deskripsi', $id_deskripsi)
            ->update([
                'id_cabang' => $request->id_cabang,
                'tipe' => $request->tipe,
                'nama_deskripsi' => $request->nama_deskripsi,
                'username' => $request->username,
            ]);

        return redirect()->route('deskripsi.index')->with('success', 'Deskripsi berhasil diperbarui.');
    }

    // Menghapus data dari database (Delete)
    public function destroy($id_deskripsi)
    {
        $deleted = DB::table('deskripsi')->where('id_deskripsi', $id_deskripsi)->limit(1)->delete();

        if ($deleted) {
            return redirect()->route('deskripsi.index')->with('success', 'Deskripsi berhasil dihapus!');
        }

        return redirect()->route('deskripsi.index')->with('error', 'Gagal menghapus deskripsi.');
    }
}
