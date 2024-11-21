<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeskripsiPerbaikanController extends Controller
{
    // Menampilkan data (Read)
    public function index(Request $request)
    {
        // Ambil daftar cabang untuk dropdown filter
        $cabang = DB::table('cabang')->select('id_cabang', 'nama_cabang')->get();
        
        // Daftar username ke nama
        $usernameToName = [
            '11.11.259' => 'Epayuda Purnama',
            '21.06.2046' => 'Alfian Rizaldi',
            '13.12.768' => 'Yoyon Eka Wahyudi',
            '12.07.471' => 'Hendra Pramuda Wathani',
            '12.01.326' => 'Mardi',
            '15.11.1217' => 'Hendrik Wijaya',
            '15.11.1219' => 'Fahlivius Paku Alamsyah',
            '16.08.1334' => 'Muhammad Khairullah',
            '17.03.1423' => 'Erikson Simanungkalit',
            '17.03.1422' => 'Mohamad Fagi Adetera',
            '11.04.184' => 'Komang Dedy Suryanegara',
            '18.03.1565' => 'Muhammad Zainal Fahmi',
            '18.03.1566' => 'Nur Khalik',
            '19.01.1696' => 'Azmi Pratama',
            '19.04.1769' => 'Daniel Anre Pasaribu',
            '22.02.2179' => 'Bagues Putra Tawaqqal',
            '21.07.2048' => 'Kurnia Sandy',
            '22.02.2183' => 'Agil Putra Desalwa',
            '22.07.2281' => 'Ida Bagus Purwo',
            '22.11.2376' => 'Rizqie Rahmatillah',
            '24.01.2793' => 'Muhammad Alwi',
            '24.01.2779' => 'Husein Abbas Rumaf',
            '24.02.2827' => 'Brilian Syukri Ramadhan',
            '24.09.3002' => 'Nugroho Oktarindo',
        ];

          // Daftar alias untuk tipe
    $tipeAlias = [
        1 => 'Moni',
        2 => 'Banu',
        3 => 'Qpage',
        // Tambahkan pemetaan sesuai dengan tipe yang ada
    ];
        
        // Ambil data deskripsi dengan relasi ke cabang
        $query = DB::table('deskripsi')
            ->join('cabang', 'deskripsi.id_cabang', '=', 'cabang.id_cabang')
            ->select('deskripsi.*', 'cabang.nama_cabang');
        
        // Filter berdasarkan id_cabang jika ada
        if ($request->has('id_cabang') && $request->id_cabang != '') {
            $query->where('deskripsi.id_cabang', $request->id_cabang);
        }
        
        // Filter berdasarkan username jika ada
        if ($request->has('username') && $request->username != '0') {
            $query->where('deskripsi.username', $request->username);
        }
        
        // Eksekusi query untuk mengambil data deskripsi
        $deskripsi = $query->get();
        
        // Kirim data ke view
        return view('perbaikan.general.deskripsi.deskripsi', compact('deskripsi', 'cabang', 'usernameToName'));
    }
    
    // Menampilkan form tambah data (Create)
    public function create(Request $request)
    {
        // Get 'id_cabang' from the query parameter
        $idCabang = $request->query('id_cabang');

        // Fetch the cabang data based on 'id_cabang'
        $cabang = DB::table('cabang')->where('id_cabang', $idCabang)->first();

        // If 'id_cabang' is not found, redirect with an error
        if (!$cabang) {
            return redirect()->back()->withErrors(['error' => 'Cabang not found.']);
        }

        // Pass 'cabang' to the view
        return view('perbaikan.general.deskripsi.create', compact('cabang'));
    }

    // Menyimpan data baru ke database (Store)
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_cabang' => 'required|integer|exists:cabang,id_cabang', // Pastikan ID cabang valid
            'tipe' => 'required|in:1,2,3', // Validasi tipe
            'nama_deskripsi' => 'required|string|max:50', // Validasi nama deskripsi
            'username' => 'required|string|max:50', // Validasi username
        ]);
    
        // Menyimpan data ke database
        DB::table('deskripsi')->insert([
            'id_cabang' => $request->id_cabang, // ID cabang yang valid
            'tipe' => $request->tipe, // Tipe yang dipilih
            'nama_deskripsi' => $request->nama_deskripsi, // Nama deskripsi
            'username' => $request->username, // Username yang dipilih
        ]);
    
        // Debug: cek data yang diterima dari form
        // dd($request->all());
    
        // Redirect setelah berhasil
        return redirect()->route('deskripsi.index')->with('success', 'Deskripsi berhasil ditambahkan!');
    }
    
    
    
    // Menampilkan form edit data (Edit)
    public function edit($id_deskripsi)
    {
        // Ambil data deskripsi berdasarkan id
        $deskripsi = DB::table('deskripsi')
            ->where('deskripsi.id_deskripsi', $id_deskripsi)
            ->first();
    
        if (!$deskripsi) {
            return redirect()->route('deskripsi.index')->with('error', 'Deskripsi tidak ditemukan.');
        }
    
        // Daftar username ke nama
        $usernameToName = [
            '11.11.259' => 'Epayuda Purnama',
            '21.06.2046' => 'Alfian Rizaldi',
            '13.12.768' => 'Yoyon Eka Wahyudi',
            '12.07.471' => 'Hendra Pramuda Wathani',
            '12.01.326' => 'Mardi',
            '15.11.1217' => 'Hendrik Wijaya',
            '15.11.1219' => 'Fahlivius Paku Alamsyah',
            '17.03.1423' => 'Erikson Simanungkalit',
            '16.08.1334' => 'Muhammad Khairullah',
            '17.03.1422' => 'Mohamad Fagi Adetera',
            '11.04.184' => 'Komang Dedy Suryanegara',
            '18.03.1565' => 'Muhammad Zainal Fahmi',
            '18.03.1566' => 'Nur Khalik',
            '19.01.1696' => 'Azmi Pratama',
            '19.04.1769' => 'Daniel Anre Pasaribu',
            '22.02.2179' => 'Bagues Putra Tawaqqal',
            '21.07.2048' => 'Kurnia Sandy',
            '22.02.2183' => 'Agil Putra Desalwa',
            '22.07.2281' => 'Ida Bagus Purwo',
            '22.11.2376' => 'Rizqie Rahmatillah',
            '24.01.2793' => 'Muhammad Alwi',
            '24.01.2779' => 'Husein Abbas Rumaf',
            '24.02.2827' => 'Brilian Syukri Ramadhan',
            '24.09.3002' => 'Nugroho Oktarindo',
        ];
    
        // Ambil nama alias dari username yang ada pada deskripsi
        $aliasUsername = $usernameToName[$deskripsi->username] ?? 'Nama Tidak Ditemukan';
    
        // Ambil data cabang berdasarkan id_cabang
        $cabang = DB::table('cabang')->where('id_cabang', $deskripsi->id_cabang)->first();
    
        // Kirim data ke view
        return view('perbaikan.general.deskripsi.edit', compact('deskripsi', 'usernameToName', 'aliasUsername', 'cabang'));
    }
    
    

   // Memperbarui data di database (Update)
public function update(Request $request, $id_deskripsi)
{
    // Validasi input
    $request->validate([
        'id_cabang' => 'required|integer|exists:cabang,id_cabang', // Validasi id_cabang
        'tipe' => 'required|in:1,2,3',
        'nama_deskripsi' => 'required|string|max:50',
        'username' => 'required|string|max:50',
    ]);
    

    // Cari data deskripsi berdasarkan id_deskripsi
    $deskripsi = DB::table('deskripsi')->where('id_deskripsi', $id_deskripsi)->first();

    if (!$deskripsi) {
        return redirect()->route('deskripsi.index')->with('error', 'Deskripsi tidak ditemukan.');
    }

    // Proses update data deskripsi
    DB::table('deskripsi')
        ->where('id_deskripsi', $id_deskripsi)
        ->update([
            'id_cabang' => $request->id_cabang,
            'tipe' => $request->tipe,
            'nama_deskripsi' => $request->nama_deskripsi,
            'username' => $request->username,
        ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('deskripsi.index')->with('success', 'Deskripsi berhasil diperbarui.');
}



    // Menghapus data dari database (Delete)
    public function destroy($id_deskripsi)
    {
        $deleted = DB::table('deskripsi')->where('id_deskripsi', $id_deskripsi)->delete();
        
        if ($deleted) {
            return redirect()->route('deskripsi.index')->with('success', 'Deskripsi berhasil dihapus!');
        }
    
        return redirect()->route('deskripsi.index')->with('error', 'Gagal menghapus deskripsi.');
    }
    
    
    
}