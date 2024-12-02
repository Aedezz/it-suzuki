<?php

namespace App\Http\Controllers;

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
                'pegawai.nik as pegawai_nik', 
                'pegawai.nama as pegawai_nama'
            )
            ->orderBy('service.id', 'desc') // Mengurutkan berdasarkan ID secara menurun
            ->get();
        
        // Mengubah koleksi perangkat menjadi array dengan 'id' sebagai kunci
        $perangkat = DB::table('barang')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengubah koleksi item menjadi array dengan 'id' sebagai kunci
        $item = DB::table('item')->select('id', 'nama')->get()->keyBy('id');
        
        // Mengirim data ke view
        return view('perbaikan.services.history.history', compact('history', 'perangkat', 'item'));
    }
    

    
    
    
    public function searchPegawai(Request $request)
    {
        $query = $request->get('query');

        if (empty($query)) {
            return response()->json([]); // Jika query kosong, kembalikan array kosong
        }

        // Ambil data pegawai yang cocok dengan nama
        $pegawai = DB::table('pegawai')
            ->select('kode_pegawai', 'nama', 'kode_divisi', 'kode_cabang')
            ->where('nama', 'like', '%' . $query . '%')
            ->get();

        return response()->json($pegawai); // Kembalikan data sebagai JSON
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
            ->select('service.*', 'pegawai.nama as nama_pegawai')
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
    

}
