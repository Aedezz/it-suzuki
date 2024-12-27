<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormPerbaikanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    public function index()
{
    // Mengambil semua data dari tabel form_perangkat dan menggabungkannya dengan tabel user berdasarkan kolom 'it' dan 'username'
    $form = DB::table('form_perangkat')
    ->leftJoin('user', 'form_perangkat.it', '=', 'user.username') // Menggunakan leftJoin agar semua data ditampilkan
    ->select('form_perangkat.*', 'user.nama', 'user.username')
    ->get();
    

    // Format tanggal pada setiap record
    foreach ($form as $d) {
        $d->formatted_tanggal = Carbon::parse($d->tanggal)->format('d-m-Y');
    }

    // Mengirim data ke view
    return view('perbaikan.form.form', compact('form'));
}
    

   // Fungsi untuk memperbarui status
public function updateStatus($id)
{
    // Mengambil data status (cek) berdasarkan id
    $data = DB::table('form_perangkat')->where('id', $id)->first();
    
    // Cek status saat ini, jika 0 (Belum) ubah menjadi 1 (Selesai), jika 1 (Selesai) ubah menjadi 0 (Belum)
    $newStatus = ($data->cek == 0) ? 1 : 0;

    // Update status di database
    DB::table('form_perangkat')->where('id', $id)->update(['cek' => $newStatus]);

    // Redirect kembali ke halaman index dengan pesan sukses dan status aksi
    return redirect()->route('form.index')->with('status', [
        'judul' => 'Berhasil',
        'pesan' => 'Status Berhasil Diubah!',
        'icon' => 'success',
        'aksi' => 'updateStatus' // Menambahkan informasi aksi
    ]);
}


    // Menampilkan form untuk mengedit form yang sudah ada
    public function edit($id)
    {
        // Menemukan data form berdasarkan id menggunakan Query Builder
        $formUser = DB::table('form_perangkat')->where('id', $id)->first();
        
        // Mengirim data formUser ke view
        return view('form-pembuatan.edit', compact('formUser'));
    }

    // Memperbarui data form
    public function update(Request $request, $id)
    {
        // Validasi input (menggunakan format yang sama dengan kode yang Anda berikan)
        $validated = $request->validate([
            'nomor' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'nik' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'divisi_cabang' => 'required|string|max:100',
            'kode_asset' => 'required|string|max:20',
            'tgl_beli' => 'required|date',
            'nama_barang' => 'required|string|max:100',
            'jumlah' => 'required|integer',
            'spesifikasi' => 'nullable|string',
            'keluhan' => 'nullable|string',
            'cek' => 'required|boolean',
        ]);

        // Memperbarui data formUser menggunakan Query Builder
        DB::table('form_perangkat')->where('id', $id)->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('form-pembuatan.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Berhasil Di Perbarui!', 'icon' => 'success']);
    }

    public function print($id)
{
    // Ambil data dari tabel form_perangkat berdasarkan ID dan gabungkan dengan data dari tabel user
    // $data = DB::table('form_perangkat')
    //     ->join('user', 'form_perangkat.it', '=', 'user.username') // Menghubungkan berdasarkan 'it' (di form_perangkat) dan 'username' (di user)
    //     ->select('form_perangkat.*', 'user.username', 'user.nama') // Memilih kolom yang dibutuhkan, termasuk 'username' dan 'nama' dari tabel user
    //     ->where('form_perangkat.id', $id)
    //     ->first(); // Mengambil hanya satu record berdasarkan ID
    
    $data = DB::table('form_perangkat')->where('id', $id)->first();
    // Load view untuk cetak dan pass data ke dalam view
    $pdf = Pdf::loadView('perbaikan.form.print_page', compact('data'));

    // Return file PDF untuk ditampilkan atau didownload
    return $pdf->stream('Form_Details.pdf'); // Menampilkan di browser
    // return $pdf->download('Form_Details.pdf'); // Untuk mendownload
}

    // Menghapus data form
   // Menghapus data form
public function destroy($id)
{
    // Menghapus data form berdasarkan id menggunakan Query Builder
    DB::table('form_perangkat')->where('id', $id)->delete();
    
    // Redirect ke halaman index dengan pesan sukses dan status aksi
    return redirect()->route('form.index')->with('status', [
        'judul' => 'Berhasil',
        'pesan' => 'Data Berhasil Di Hapus!',
        'icon' => 'success',
        'aksi' => 'delete' // Menambahkan informasi aksi
    ]);
}

}
