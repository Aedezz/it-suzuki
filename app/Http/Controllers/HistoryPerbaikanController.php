<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryPerbaikanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    public function index()
    {
        // Mengambil data dari tabel service dan mengurutkannya berdasarkan id (terbaru di atas)
        $history = DB::table('service')
            ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
            ->select(
                'service.id', 
                'service.nomor', 
                'service.tanggal', 
                'service.id_barang', 
                'service.id_item', 
                'service.sn', 
                'service.keterangan',
                'service.status',

                'pegawai.nik as pegawai_nik', 
                'pegawai.nama as pegawai_nama'
            )
            ->orderBy('service.status', 'desc')
            ->orderBy('service.id', 'desc') // Mengurutkan berdasarkan status secara ascending
            ->get();
        
        // Mengubah koleksi perangkat menjadi array dengan 'id' sebagai kunci
        $perangkat = DB::table('barang')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengubah koleksi item menjadi array dengan 'id' sebagai kunci
        $item = DB::table('item')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengirim data ke view
        return view('perbaikan.services.history.history', compact('history', 'perangkat', 'item'));
    }

    public function create()
    {
        // Ambil data pegawai
        $pegawaiData = DB::table('pegawai')
            ->select('kode_pegawai', 'nama', 'kode_divisi', 'kode_cabang')
            ->get();

        // Ambil data service
        $serviceData = DB::table('service')
            ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
            ->join('divisi', 'service.kode_divisi', '=', 'divisi.kode')
            ->join('cabang2', 'service.kode_cabang', '=', 'cabang2.kode')
            ->select(
                'service.*', 'pegawai.nama as nama_pegawai',
                'divisi.divisi as divisi',
                'cabang2.nama as cabang',
            )
            ->get();

        $item = DB::table('item')->select('id', 'nama')->get();
        $perangkat = DB::table('barang')->select('id', 'nama')->get();
        // Mengirimkan data ke view
        return view('perbaikan.services.history.create', compact('serviceData', 'pegawaiData', 'perangkat', 'item'));
    }
    
    public function store(Request $request)
    {
    
        // Simpan data ke tabel service
        DB::table('service')->insert([
            'tanggal' => $request['tanggal'],
            'nomor' => $request['nomor'],
            'kode_pegawai' => $request['kode_pegawai'],
            'kode_cabang' => $request['kode_cabang'],
            'kode_divisi' => $request['kode_divisi'],
            'id_barang' => $request['id_barang'],
            'id_item' => $request['id_item'],
            'sn' => $request['sn'],
            'keterangan' => $request->keterangan,
            'rekomendasi' => $request['rekomendasi'],
            'catatan' => $request['catatan'],
            'no_po' => $request['no_po'],
            'status' => 0,
        ]);
    
        // Redirect ke route history.index dengan pesan sukses
        return redirect()->route('history.index')->with('success', 'Data berhasil disimpan!');
    }
    
    public function print($id)
    {
        // Fetch a single record by its ID
        $history = DB::table('service')
            ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
            ->join('divisi', 'service.kode_divisi', '=', 'divisi.kode')
            ->join('cabang2', 'service.kode_cabang', '=', 'cabang2.kode')
            ->join('barang', 'service.id_barang', '=', 'barang.id')
            ->select(
                'service.id',
                'service.nomor',
                'service.tanggal',
                'service.id_barang',
                'service.id_item',
                'service.sn',
                'service.keterangan',
                'service.rekomendasi',

                'pegawai.nik as pegawai_nik',
                'pegawai.nama as pegawai_nama',
                'pegawai.cabang as cabang',

                'divisi.divisi as divisi',
                'cabang2.nama as cabang',
                'barang.nama as barang',
            )
            ->where('service.id', $id) // Filter by the provided ID
            ->first(); // Fetch the single record
    
        // Check if the record exists
        if (!$history) {
            abort(404, 'Data not found');
        }
    
        // Load the 'print' view and pass the history to it
        $pdf = Pdf::loadView('perbaikan.services.history.print', compact('history'));
    
        // Return the generated PDF
        return $pdf->stream('Form_Details.pdf');
    }

    public function check($id)
    {
    // Retrieve the record with a join to get the 'pegawai_nama' field
        $record = DB::table('service')
            ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
            ->where('service.id', $id)
            ->select(
                'service.id',
                'service.status',
                'pegawai.nama as pegawai_nama' // Get pegawai_nama
            )
            ->first();
    
        // Check if the record exists
        if (!$record) {
            return redirect()->route('history.index')->with('error', 'Data tidak ditemukan.');
        }
    
        // Update status to 'Sudah' (set cek to 1)
        DB::table('service')->where('id', $id)->update(['status' => 1]);
    
        // Redirect with a success message including the 'pegawai_nama'
        return redirect()->route('history.index')->with('success', "Status untuk pengguna = {$record->pegawai_nama}, berhasil diubah!");
    }    

    public function halamanAcc ()
    {
    // Mengambil data dari tabel service dan mengurutkannya berdasarkan id (terbaru di atas)
        $history = DB::table('service')
            ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
            ->where('service.status', 1)
            ->select(
                'service.id', 
                'service.nomor', 
                'service.tanggal', 
                'service.id_barang', 
                'service.id_item', 
                'service.sn', 
                'service.keterangan',
                'service.status',
                'service.spv_status',

                'pegawai.nik as pegawai_nik', 
                'pegawai.nama as pegawai_nama',
            )
            ->orderBy('service.spv_status', 'asc') // Mengurutkan berdasarkan spv_status secara ascending
            ->orderBy('service.id', 'desc')
            ->get();
        
        // Mengubah koleksi perangkat menjadi array dengan 'id' sebagai kunci
        $perangkat = DB::table('barang')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengubah koleksi item menjadi array dengan 'id' sebagai kunci
        $item = DB::table('item')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengirim data ke view
        return view('perbaikan.services.history-acc.main', compact('history', 'perangkat', 'item'));
    }

    public function print2($id)
    {
    // Fetch a single record by its ID
    $history = DB::table('service')
        ->join('pegawai', 'service.kode_pegawai', '=', 'pegawai.kode_pegawai')
        ->join('divisi', 'service.kode_divisi', '=', 'divisi.kode')
        ->join('cabang2', 'service.kode_cabang', '=', 'cabang2.kode')
        ->join('barang', 'service.id_barang', '=', 'barang.id')
        ->select(
            'service.id',
            'service.nomor',
            'service.tanggal',
            'service.id_barang',
            'service.id_item',
            'service.sn',
            'service.keterangan',
            'service.rekomendasi',
            'service.spv_status',

            'pegawai.nik as pegawai_nik',
            'pegawai.nama as pegawai_nama',
            'pegawai.cabang as cabang',

            'divisi.divisi as divisi',
            'cabang2.nama as cabang',
            'barang.nama as barang',
        )
        ->where('service.id', $id) // Filter by the provided ID
        ->first(); // Fetch the single record

        // Check if the record exists
        if (!$history) {
            abort(404, 'Data not found');
        }

        // Load the 'print' view and pass the history to it
        $pdf = Pdf::loadView('perbaikan.services.history-acc.print', compact('history'));

        // Return the generated PDF
        return $pdf->stream('Form_Details.pdf');
    }

    public function accTerakhir($id)
    {
        // Get the logged-in user's username
        $username = auth()->user()->username; // Ensure the `auth()` helper is used for logged-in user

        // Find the record by ID
        $record = DB::table('service')
            ->where('service.id', $id)
            ->select('service.id', 'service.spv_status')
            ->first();

        // Check if the record exists
        if (!$record) {
            return redirect()->route('history.approve')->with('error', 'Data tidak ditemukan.');
        }

        // Update the spv_status, spv (username), and spv_approve (current datetime)
        DB::table('service')->where('id', $id)->update([
            'spv_status' => 1,
            'spv' => $username, // Assuming `spv` is the column for the username
            'spv_approve' => now(), // Laravel's helper for the current datetime
        ]);

        // Redirect with a success message
        return redirect()->route('history.approve')->with('success', "Berhasil di centang!");
    }

}
