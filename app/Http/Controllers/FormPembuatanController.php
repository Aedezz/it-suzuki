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
    $ceklistData = DB::table('form_user')->paginate(9000); // Menampilkan semua data dari tabel `ceklist`

    return view('form-pembuatan.index', compact('formUser', 'ceklistData'));
    // Mengirimkan data ke view
    // return view('form-pembuatan.index', compact('formUser'));
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