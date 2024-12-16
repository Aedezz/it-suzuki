<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeriodePerbaikanController extends Controller
{
        // Menampilkan semua data periode menggunakan Query Builder
        public function index()
        {
            // Urutkan berdasarkan id_periode secara menurun
            $periode = DB::table('periode')->orderBy('id_periode', 'desc')->get(); 
            return view('perbaikan.general.periode.periode', compact('periode'));
        }
        
    
        public function create()
        {
            // Mengambil nama_periode terakhir dari tabel periode
            $lastPeriode = DB::table('periode')->orderBy('id_periode', 'desc')->first(); // Ambil data terakhir berdasarkan id_periode
            $lastNamaPeriode = $lastPeriode ? $lastPeriode->nama_periode : ''; // Jika tidak ada data, set ke string kosong
        
            // Kirim nama_periode terakhir ke view
            return view('perbaikan.general.periode.create', compact('lastNamaPeriode'));
        }
        
        

        public function store(Request $request)
        {
            // Menyimpan data periode baru ke database
            DB::table('periode')->insert([
                'nama_periode' => $request->nama_periode,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir,
            ]);
        
            // Redirect dengan pesan sukses
            return redirect()->route('periode.index')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Berhasil Di Perbarui!', 'icon' => 'success']);
        }


        
       // Fungsi untuk memperbarui status periode
       public function updateStatus($id_periode)
       {
           // Mengambil data status (cek) berdasarkan id_periode
           $data = DB::table('periode')->where('id_periode', $id_periode)->first();
           
           // Cek status saat ini, jika 0 (Belum) ubah menjadi 1 (Selesai), jika 1 (Selesai) ubah menjadi 0 (Belum)
           $newStatus = ($data->cek == 0) ? 1 : 0;
    
           // Update status di database
           DB::table('periode')->where('id_periode', $id_periode)->update(['cek' => $newStatus]);
    
           // Redirect kembali ke halaman index dengan pesan sukses dan status aksi
           return redirect()->route(route: 'periode.index')->with('status', [
               'judul' => 'Berhasil',
               'pesan' => 'Status Berhasil Diubah!',
               'icon' => 'success',
               'aksi' => 'updateStatus' // Menambahkan informasi aksi
           ]);
       }
    
       public function edit($id_periode)
       {
           // Ambil data periode berdasarkan id
           $periode = DB::table('periode')->where('id_periode', $id_periode)->first();
       
           // Ambil data nama periode terakhir
           $lastNamaPeriode = DB::table('periode')->orderBy('id_periode', 'desc')->value('nama_periode');
       
           // Kirim data periode dan nama periode terakhir ke view
           return view('perbaikan.general.periode.edit', compact('periode', 'lastNamaPeriode'));
       }
       
       

    
        // Memperbarui data periode
        public function update(Request $request, $id_periode)
        {
            // Validasi input
            $validated = $request->validate([
                'nama_periode' => 'required|string|max:10',
                'tgl_awal'    => 'required|date',
                'tgl_akhir'     => 'required|date',
            ]);
        
            // Memperbarui data periode
            DB::table('periode')
                ->where('id_periode', $id_periode)
                ->update([
                    'nama_periode' => $validated['nama_periode'],
                    'tgl_awal'    => $validated['tgl_awal'],
                    'tgl_akhir'     => $validated['tgl_akhir'],
                ]);
        
            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('periode.index')->with('status', [
                'judul' => 'Berhasil',
                'pesan' => 'Data Berhasil Di Perbarui!',
                'icon'  => 'success'
            ]);
        }
        
        
        
    
        // Menghapus data periode
        public function destroy($id_periode)
        {
            // Menghapus data periode berdasarkan id_periode menggunakan Query Builder
            DB::table('periode')->where('id_periode', $id_periode)->delete();
            
            // Redirect ke halaman index dengan pesan sukses dan status aksi
            return redirect()->route('periode.index')->with('status', [
                'judul' => 'Berhasil',
                'pesan' => 'Data Berhasil Di Hapus!',
                'icon' => 'success',
                'aksi' => 'delete' // Menambahkan informasi aksi
            ]);
        }
    }