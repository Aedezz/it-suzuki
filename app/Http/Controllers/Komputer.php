<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Komputer extends Controller
{
    // Display the list of "komputer" records with related data from "pegawai"
    public function index()
    {
        $komputer = DB::table('komputer')
            ->join('pegawai as kode_pegawai', 'komputer.kode_pegawai', '=', 'kode_pegawai.kode_pegawai')
            ->join('pegawai as kode_cabang', 'komputer.kode_cabang', '=', 'kode_cabang.kode_pegawai')
            ->join('pegawai as kode_divisi', 'komputer.kode_divisi', '=', 'kode_divisi.kode_pegawai')
            ->select(
                'komputer.*',
                'kode_pegawai.nik as nik',
                'kode_pegawai.nama as nama',
                'kode_cabang.cabang as cabang',
                'kode_divisi.divisi as divisi'
            )
            ->paginate(20);
    
        return view('komputer.datatable', compact('komputer'));
    }    

    public function create()
    {
        return view('komputer.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'tanggal' => 'required|date',
            'kode_pegawai' => 'required|exists:pegawai,kode_pegawai',
            'kode_cabang' => 'nullable|exists:pegawai,kode_pegawai', // Optional, can be null
            'kode_divisi' => 'nullable|exists:pegawai,kode_pegawai', // Optional, can be null
        ]);
    
        // Fetch related data for kode_pegawai to get kode_cabang and kode_divisi
        $pegawai = DB::table('pegawai')->where('kode_pegawai', $request->kode_pegawai)->first();
        $kode_cabang = $pegawai->kode_cabang ?? $request->kode_pegawai; // Default to kode_pegawai if not found
        $kode_divisi = $pegawai->kode_divisi ?? null; // Default to null if not found
    
        // Insert data into the komputer table
        DB::table('komputer')->insert([
            'tanggal' => $request->tanggal,
            'kode_pegawai' => $request->kode_pegawai,
            'kode_cabang' => $kode_cabang, // Use the fetched value
            'kode_divisi' => $kode_divisi, // Use the fetched value
        ]);
    
        return redirect()->route('komputer')->with('success', 'Data berhasil ditambahkan!');
    }     

    public function detail($id)
    {
        $komputer = DB::table('komputer')
            ->join('pegawai as kode_pegawai', 'komputer.kode_pegawai', '=', 'kode_pegawai.kode_pegawai')
            ->join('pegawai as kode_cabang', 'komputer.kode_cabang', '=', 'kode_cabang.kode_pegawai')
            ->join('pegawai as kode_divisi', 'komputer.kode_divisi', '=', 'kode_divisi.kode_pegawai')
            ->select(
                'komputer.*',
                'kode_pegawai.nik as nik',
                'kode_pegawai.nama as nama',
                'kode_cabang.cabang as cabang',
                'kode_divisi.divisi as divisi'
            )
            ->where('komputer.id', $id)
            ->first();

        return view('komputer.detail', compact('komputer'));
    }

    public function update(Request $request, $id)
    {
        // Update the komputer data
        DB::table('komputer')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'kode_pegawai' => $request->kode_pegawai,
            'kode_cabang' => $request->kode_cabang,
            'kode_divisi' => $request->kode_divisi,
        ]);

        return redirect()->route('komputer')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Delete the komputer record
        DB::table('komputer')->where('id', $id)->delete();
        return redirect()->route('komputer')->with('success', 'Data berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $users = DB::table('pegawai')
            ->where('nama', 'LIKE', "{$query}%")
            ->select('kode_pegawai', 'nama')
            ->get();
    
        return response()->json($users);
    }
}