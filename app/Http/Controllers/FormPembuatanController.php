<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPembuatanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    
    public function index()
{
    // Menggunakan Query Builder untuk pagination
    $formUser = DB::table('form_user')->paginate(10);

    // Mengirimkan data ke view
    return view('form-pembuatan.index', compact('formUser'));
}
    // Menampilkan form untuk membuat form baru
    // public function create()
    // {
    //     return view('form-pembuatan.create');
    // }

    // // Menyimpan data form baru
    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'nik' => 'required|string|max:20',
    //         'nama_lengkap' => 'required|string|max:100',
    //         'jabatan' => 'required|string|max:50',
    //         'divisi_cabang' => 'required|string|max:100',
    //         'keterangan' => 'nullable|string',
    //         'nomor' => 'required|string|max:20',
    //         'tanggal' => 'required|date',
    //     ]);

    //     // Menyimpan data form baru menggunakan Query Builder
    //     DB::table('form_user')->insert($validated);

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil dibuat.');
    // }

    // Menampilkan form untuk mengedit form yang sudah ada
    // public function edit($id)
    // {
    //     // Menggunakan Query Builder untuk mengambil data berdasarkan ID
    //     $formUser = DB::table('form_user')->where('id', $id)->first();
    
    //     // Jika data tidak ditemukan, kembalikan ke halaman 404
    //     if (!$formUser) {
    //         return abort(404);
    //     }
    
    //     return view('form-pembuatan.edit', compact('formUser'));
    // }
    

    // // Memperbarui data form
    // public function update(Request $request, $id)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'nik' => 'required|string|max:20',
    //         'nama_lengkap' => 'required|string|max:100',
    //         'jabatan' => 'required|string|max:50',
    //         'divisi_cabang' => 'required|string|max:100',
    //         'keterangan' => 'nullable|string',
    //         'nomor' => 'required|string|max:20',
    //         'tanggal' => 'required|date',
    //     ]);

    //     // Memperbarui data formUser menggunakan Query Builder
    //     DB::table('form_user')->where('id', $id)->update($validated);

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil diperbarui.');
    // }

    // Menghapus data form
    public function destroy($id)
    {
        // Menghapus data form berdasarkan id menggunakan Query Builder
        DB::table('form_user')->where('id', $id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil dihapus.');
    }

    public function updateStatus($id)
{
    // Cari data berdasarkan ID
    $formUser = DB::table('form_user')->where('id', $id)->first();

    if ($formUser) {
        // Update status (cek 0 ke 1, atau 1 ke 0)
        $newStatus = $formUser->cek == 0 ? 1 : 0;

        // Update status di database
        DB::table('form_user')
            ->where('id', $id)
            ->update(['cek' => $newStatus]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('form-pembuatan.index')
            ->with('success', 'Status berhasil diperbarui');
    } else {
        // Jika data tidak ditemukan, kembali ke halaman sebelumnya
        return redirect()->route('form-pembuatan.index')
            ->with('error', 'Data tidak ditemukan');
    }

}

}