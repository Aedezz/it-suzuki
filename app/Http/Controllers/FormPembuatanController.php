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
    $formUser = DB::table('form_user')->paginate(9000); // Menampilkan semua data dari tabel `form_user`
    $ceklist = DB::table('form_user')->paginate(9000); // Menampilkan semua data dari tabel `ceklist`
    $ceklistData = DB::table('form_user')->paginate(9000); // Menampilkan semua data dari tabel `ceklist`

    return view('form-pembuatan.index', compact('formUser', 'ceklist','ceklistData'));
    // Mengirimkan data ke view
    // return view('form-pembuatan.index', compact('formUser'));
    }
    

    // Menghapus data form
    public function destroy($id)
    {
        // Menghapus data form berdasarkan id menggunakan Query Builder
        DB::table('form_user')->where('id', $id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Menggunakan Query Builder untuk memperbarui kolom 'cek' menjadi 1 (selesai)
        DB::table('form_user')
            ->where('id', $id) // Pastikan 'id' adalah kolom utama pada tabel 'form_user'
            ->update(['cek' => 1]); // 1 menandakan status selesai
    
        // Mengirim pesan ke session untuk SweetAlert
        return redirect()->route('form-pembuatan.index')->with('success', 'Status berhasil diubah menjadi Selesai!');
    }
    

    public function updateStatusBatch(Request $request)
    {
        // Validasi input
        $request->validate([
            'year' => 'required|integer',
            'status' => 'required|in:selesai,belum',
        ]);
    
        $year = $request->input('year');
        $status = $request->input('status') == 'selesai' ? 1 : 0; // Mengonversi status ke 1 (selesai) atau 0 (belum)
    
        // Mengupdate status untuk semua data pada tahun yang dipilih
        DB::table('form_user')
            ->whereYear('tanggal', $year)  // Menggunakan kolom tanggal untuk memfilter berdasarkan tahun
            ->update(['cek' => $status]);
    
        // Memberikan feedback kepada user
        return redirect()->route('form-pembuatan.index')
                         ->with('statusUpdate', 'Status untuk tahun ' . $year . ' telah diperbarui menjadi ' . ($status == 1 ? 'Selesai' : 'Belum'));
    }
    

}