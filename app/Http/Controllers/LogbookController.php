<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogbookController extends Controller
{
    public function index(Request $request)
{
    // Ambil tahun sekarang
    $currentYear = date('Y');

    // Ambil data periode yang sesuai dengan tahun sekarang
    $periode = DB::table('periode')
        ->whereYear('tgl_awal', '=', $currentYear)
        ->whereYear('tgl_akhir', '=', $currentYear)
        ->get();

    // Ambil ID periode dari request, jika ada
    $selectedPeriode = $request->input('nama_periode');
    
    // Query catatan dengan urutan terbaru di atas (by date)
    $query = DB::table('catatan')
        ->join('cabang2', 'catatan.id_cabang', '=', 'cabang2.kode')
        ->join('modul', 'modul.id_modul', '=', 'catatan.id_modul')
        ->join('grup', 'grup.id_grup', '=', 'catatan.id_grup')
        ->join('kategori', 'modul.id_kategori', '=', 'kategori.id_kategori')
        ->select(
            'catatan.id_catatan',
            'catatan.tgl_catatan',
            'catatan.keterangan',
            'catatan.solusi',
            'cabang2.nama as nama_cabang',
            'modul.nama_modul',
            'grup.nama_grup',
            'kategori.nama_kategori',
            'catatan.create_by'
        )
        ->orderBy('catatan.tgl_catatan', 'desc'); // Urutkan berdasarkan tanggal (desc)

    // Filter berdasarkan tanggal jika ada input search
    if ($request->filled('search_date')) {
        $query->whereDate('catatan.tgl_catatan', '=', $request->search_date);
    }

    // Filter berdasarkan kode cabang jika ada
    if ($request->filled('kode_cabang2')) {
        $query->where('catatan.id_cabang', '=', $request->kode_cabang2);
    }

    // Filter berdasarkan periode jika ada
    if ($selectedPeriode) {
        $periodeData = DB::table('periode')
            ->where('nama_periode', '=', $selectedPeriode)
            ->first();

        if ($periodeData) {
            $query->whereBetween('catatan.tgl_catatan', [$periodeData->tgl_awal, $periodeData->tgl_akhir]);
        }
    }

    $catatan = $query->get();

    // Ambil data grup, modul, dan kategori
    $grup = DB::table('grup')->select('id_grup', 'nama_grup')->get();
    $modul = DB::table('modul')->select('id_modul', 'nama_modul', 'id_kategori')->get();
    $kategori = DB::table('kategori')->select('id_kategori', 'nama_kategori')->get();
    $cabang2 = DB::table('cabang2')->select('kode', 'nama')->get();
    
    // Ambil nama pengguna yang sedang login (auth())
    $loggedInUserName = auth()->user()->name; // atau auth()->user()->username jika menggunakan username

    return view('logbook.index', [
        'catatan' => $catatan,
        'periode' => $periode, // Data periode
        'search_date' => $request->search_date,
        'kode_cabang2' => $request->kode_cabang2, // Filter cabang
        'nama_periode' => $selectedPeriode, // Filter periode
        'grup' => $grup,
        'modul' => $modul,
        'kategori' => $kategori,
        'cabang2' => $cabang2, // Data cabang
        'loggedInUserName' => $loggedInUserName // Kirimkan nama pengguna yang login
    ]);
}



public function store(Request $request)
{
    // Ambil tanggal dari form
    $tgl_catatan = $request->tgl_catatan;

    // Mengambil bulan dan tahun dari tanggal
    $bulan = date('m', strtotime($tgl_catatan));
    $tahun = date('Y', strtotime($tgl_catatan));

    // Tentukan nama periode berdasarkan bulan dan tahun
    $nama_periode = "{$bulan}-{$tahun}"; // Format bisa disesuaikan, misalnya: '01-2024'

    // Lakukan insert ke database
    DB::table('catatan')->insert([
        'tgl_catatan' => $tgl_catatan,
        'id_grup' => $request->id_grup,
        'id_modul' => $request->id_modul,
        'id_kategori' => DB::table('modul')->where('id_modul', $request->id_modul)->value('id_kategori'),
        'keterangan' => $request->keterangan,
        'solusi' => $request->solusi,
        'id_cabang' => 1, // Sesuaikan dengan kebutuhan
        'nama_periode' => $nama_periode, // Gunakan nama_periode yang dihitung
        'create_by' => auth()->user()->username, // Menyimpan username sebagai create_by
        'status' => 0, // Status default
    ]);

    return redirect()->route('logbook.index')->with('success', 'Catatan berhasil ditambahkan.');
}


    public function destroy($id_catatan)
    {
        $catatan = DB::table('catatan')->where('id_catatan', $id_catatan)->first();

        if ($catatan) {
            DB::table('catatan')->where('id_catatan', $id_catatan)->delete();
            return redirect()->route('logbook.index')->with('success', 'Catatan berhasil dihapus.');
        }

        return redirect()->route('logbook.index')->with('error', 'Catatan tidak ditemukan.');
    }
}
