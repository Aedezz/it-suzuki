<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Help extends Controller
{
    // public function index()
    // {
    //     $helps = DB::table('help')
    //         ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
    //         ->leftJoin('user', 'help.create_by', '=', 'user.username')
    //         ->select(
    //             'help.*',
    //             'kategori.nama_kategori',
    //             'user.nama',
    //         )
    //         ->get();

    //     return view('help.layout.index', compact('helps'));
    // }

    public function index()
    {
        // Filter berdasarkan id_kategori = 1 (SDMS)
        $helps = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 1) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.sdms', compact('helps'));
    }

    public function eoffice()
    {
        // Filter berdasarkan id_kategori = 2 (E-OFFICE)
        $helps_eoffice = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 2) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.e-office', compact('helps_eoffice'));
    }

    public function jaringan()
    {
        // Filter berdasarkan id_kategori = 3 (JARINGAN)
        $helps_jaringan = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 3) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.jaringan', compact('helps_jaringan'));
    }

    public function cctv()
    {
        $helps_cctv = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 4) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.cctv', compact('helps_cctv'));
    }

    public function its()
    {
        // Filter berdasarkan id_kategori = 5 (ITS)
        $helps_its = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 5) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.its', compact('helps_its'));
    }

    public function cs_aplly()
    {
        // Filter berdasarkan id_kategori = 6 (CS)
        $helps_cs = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 6) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.cs', compact('helps_cs'));
    }

    public function angket()
    {
        // Filter berdasarkan id_kategori = 7 (ANGKET)
        $helps_angket = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 7) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.angket', compact('helps_angket'));
    }

    public function email()
    {
        // Filter berdasarkan id_kategori = 8 (EMAIL)
        $helps_email = DB::table('help')
            ->join('kategori', 'help.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('user', 'help.create_by', '=', 'user.username')
            ->where('kategori.id_kategori', 8) // Gunakan id_kategori untuk filter
            ->select(
                'help.*',
                'kategori.nama_kategori',
                'user.nama',
            )
            ->get();

        return view('help.email', compact('helps_email'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $user = DB::table('user')->select('username', 'nama')->get();

        return view('help.create', compact('kategori', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required', 
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'required|array|max:5', // Pastikan beberapa file
            'lampiran.*' => 'file|mimes:pdf,docx,mp4,xls,xlsx|max:204800', // Validasi tiap file, maks 200 MB
        ]);
        
        // Ambil username dari sesi pengguna yang sedang login
        $createBy = auth()->user()->username;
    
        // Inisialisasi array kosong untuk nama file
        $fileNames = [];
        
        // Loop untuk setiap file yang diunggah
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                // Ambil nama asli file
                $originalFileName = $file->getClientOriginalName();
                // Simpan file di direktori 'uploads' dan ambil nama file saja
                $file->storeAs('uploads', $originalFileName, 'public');
                // Tambahkan nama asli file ke array
                $fileNames[] = $originalFileName;
            }
        }
    
        // Simpan data di database
        DB::table('help')->insert([
            'id_kategori' => $request->input('id_kategori'),
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            // Simpan nama file sebagai string yang dipisahkan koma
            'lampiran' => implode(',', $fileNames), 
            'create_by' => $createBy, // Simpan dari sesi login
            'create_date' => now(),
        ]);
    
        return redirect()->route('help')->with('success', 'Data telah ditambah!');
    }  

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required', 
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'required|lampiran',
            'create_by' => 'required|create_by',
        ]);

        DB::table('help')->where('id', $id)->update([
            'id_kategori' => $request->input('id_kategori'),
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'lampiran' => $request->input('lampiran'),
            'create_by' => $request->input('create_by'),
            'create_date' => now()
        ]);

        return redirect()->route('help')->with('success', 'Data telah di perbarui!');
    }

    public function destroy($id)
    {
        DB::table('help')->where('id', $id)->delete();

        return redirect()->route('help')->with('success', 'Data telah di hapus!');
    }
}