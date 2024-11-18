<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Branch extends Controller
{
    public function index()
    {
        $viewBranch = DB::table('cabang')->get(); 
        return view('general.branch', compact('viewBranch'));
    }

    // Display the create form
    public function create()
    {
        return view('general.add');
    }

    // Store the new branch in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'informasi' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
        ]);

        // Insert the new branch into the database
        DB::table('cabang')->insert([
            'nama_cabang' => $request->input('nama_cabang'),
            'informasi' => $request->input('informasi'),
            'perusahaan' => $request->input('perusahaan'),
        ]);

        // Redirect with a success message
        return redirect()->route('branch')->with('success', 'Cabang berhasil ditambahkan!');
    }

    public function edit($id_cabang)
    {
        $branch = DB::table('cabang')->where('id_cabang', $id_cabang)->first();
        if (!$branch) {
            return redirect()->route('branch')->withErrors("Data tidak ditemukan.");
        }
        return view('general.edit', compact('branch'));
    }    

    public function update(Request $request, $id_cabang)
    {
    // Validate the input
    $request->validate([
        'nama_cabang' => 'required|string|max:255',
        'informasi' => 'required|string|max:255',
        'perusahaan' => 'required|string|max:255',
    ]);

    // Update the branch in the database
    DB::table('cabang')
        ->where('id_cabang', $id_cabang)
        ->update([
            'nama_cabang' => $request->input('nama_cabang'),
            'informasi' => $request->input('informasi'),
            'perusahaan' => $request->input('perusahaan'),
        ]);

    return redirect()->route('branch')->with('success', "Nama Cabang berhasil diubah menjadi = {$request->input('nama_cabang')}!");
    }

    public function destroy($id_cabang)
    {
        $record = DB::table('cabang')->where('id_cabang', $id_cabang)->first();
        DB::table('cabang')->where('id_cabang', $id_cabang)->delete();
        
        return redirect()->route('branch')->with('success', "Nama Cabang = {$record->nama_cabang}, berhasil dihapus!");
    }
}