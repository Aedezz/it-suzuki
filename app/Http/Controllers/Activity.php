<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Activity extends Controller
{
    // Display a list of all activities
    public function index(Request $request)
    {
        $query = DB::table('kegiatan')
            ->join('cabang', 'kegiatan.id_cabang', '=', 'cabang.id_cabang')
            ->join('grup', 'kegiatan.id_grup', '=', 'grup.id_grup')
            ->leftJoin('user', 'kegiatan.username', '=', 'user.username')
            ->select(
                'kegiatan.*',
                'cabang.nama_cabang',
                'grup.nama_grup',
                'user.nama'
            );
    
        // Cek apakah filter diterapkan
        $filterApplied = false;
    
        if ($request->has('nama_cabang') && $request->nama_cabang != '') {
            $query->where('cabang.nama_cabang', $request->nama_cabang);
            $filterApplied = true;
        }
    
        if ($request->has('nama') && $request->nama != '') {
            $query->where('user.nama', $request->nama);
            $filterApplied = true;
        }
    
        // Jika filter diterapkan, ambil data, jika tidak kosongkan
        $viewActivity = $filterApplied ? $query->get() : collect();
    
        // Pass cabangs dan users untuk dropdown filter
        $cabangs = DB::table('cabang')->get();
        $users = DB::table('user')->get();
    
        return view('activity.home', compact('viewActivity', 'cabangs', 'users'));
    }
    

    // Display the create form
    public function create(Request $request)
    {
        // Ambil data cabang, grup, dan users
        $cabang = DB::table('cabang')->get();
        $grup = DB::table('grup')->get();
        $users = DB::table('user')->get();
    
        // Ambil parameter dari URL (dikirim dari tombol filter)
        $selectedCabang = $request->query('nama_cabang', '');
        $selectedUser = $request->query('nama', '');
    
        return view('activity.add', compact('cabang', 'grup', 'users', 'selectedCabang', 'selectedUser'));
    }
    
    

    // Store the new Activity in the database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_grup' => 'required|exists:grup,id_grup',
            'username' => 'required|exists:user,username',
        ]);
    
        // Menyimpan data ke tabel kegiatan
        DB::table('kegiatan')->insert([
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'id_cabang' => $request->input('id_cabang'),
            'id_grup' => $request->input('id_grup'),
            'username' => $request->input('username'),
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('home-activity')->with('success', 'Activity berhasil ditambahkan!');
    }
    
    
    

    // Display the edit form with current data
    public function edit($id_kegiatan)
    {
        $activity = DB::table('kegiatan')
            ->leftJoin('cabang', 'kegiatan.id_cabang', '=', 'cabang.id_cabang')
            ->leftJoin('grup', 'kegiatan.id_grup', '=', 'grup.id_grup')
            ->leftJoin('user', 'kegiatan.username', '=', 'user.username')
            ->select(
                'kegiatan.*',
                'cabang.nama_cabang',
                'grup.nama_grup',
                'user.nama'
            )
            ->where('id_kegiatan', $id_kegiatan)
            ->first();

        if (!$activity) {
            return redirect()->route('home-activity')->withErrors("Data tidak ditemukan.");
        }

        $cabang = DB::table('cabang')->get();
        $grup = DB::table('grup')->get();
        $users = DB::table('user')->get();

        return view('activity.edit', compact('activity', 'cabang', 'grup', 'users'));
    }

    // Update the Activity in the database
    public function update(Request $request, $id_kegiatan)
    {
        // Validate the input
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_grup' => 'required|exists:grup,id_grup',
            'username' => 'required|exists:user,username', // Ensure it checks the 'username' field in the 'user' table
        ]);

        // Update the Activity in the database
        DB::table('kegiatan')
            ->where('id_kegiatan', $id_kegiatan)
            ->update([
                'nama_kegiatan' => $request->input('nama_kegiatan'),
                'id_cabang' => $request->input('id_cabang'),
                'id_grup' => $request->input('id_grup'),
                'username' => $request->input('username'),
            ]);

        return redirect()->route('home-activity')->with('success', "Nama activity berhasil diubah menjadi = {$request->input('nama_kegiatan')}!");
    }

    // Delete the activity from the database
    public function destroy($id_kegiatan)
    {
        $record = DB::table('kegiatan')->where('id_kegiatan', $id_kegiatan)->first();

        if ($record) {
            DB::table('kegiatan')->where('id_kegiatan', $id_kegiatan)->delete();
            return redirect()->route('home-activity')->with('success', "Nama activity = {$record->nama_kegiatan}, berhasil dihapus!");
        }

        return redirect()->route('home-activity')->withErrors("Data tidak ditemukan.");
    }
}