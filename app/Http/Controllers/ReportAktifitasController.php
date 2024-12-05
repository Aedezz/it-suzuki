<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportAktifitasController extends Controller
{
    private function dateID($tanggal)
    {
        if (empty($tanggal) || $tanggal == '0000-00-00') {
            return '-';
        }

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei',
            'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    

        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function index()
    {
        // Ambil data user
        $users = DB::table('user')->select('id', 'username', 'nama')->get();
        
        // Mengembalikan data ke tampilan
        return view('perbaikan.report.aktifitas.aktifitas', compact('users'));
    }
    
    public function previewReport(Request $request)
    {
        $tglawal = $request->query('tgl_awal');
        $tglakhir = $request->query('tgl_akhir');
        $nama = $request->query('nama');
        
        // Ambil data user
        $users = DB::table('user')->select('id', 'username', 'nama')->get();
        
        $namapegawai = DB::table('user')->where('username', $nama)->value('nama');
        
        // Pastikan format tanggal sesuai dengan yang diinginkan
        $tglawalFormatted = $this->dateID($tglawal);
        $tglakhirFormatted = $this->dateID($tglakhir);
        
        // Query untuk mengambil data catatan
        $data = DB::table('catatan')
            ->join('grup', 'catatan.id_grup', '=', 'grup.id_grup')
            ->join('modul', 'catatan.id_modul', '=', 'modul.id_modul')
            ->join('user', 'catatan.create_by', '=', 'user.username')
            ->select(
                'catatan.id_catatan',
                'catatan.tgl_catatan',
                'catatan.keterangan',
                'catatan.solusi',
                'grup.nama_grup as grup_nama',
                'modul.nama_modul as modul_nama',
                'user.nama'
            )
            ->whereBetween('catatan.tgl_catatan', [$tglawal, $tglakhir])
            ->where('catatan.create_by', $nama)
            ->get();
        
        // Mengembalikan data ke tampilan
        return view('perbaikan.report.aktifitas.aktifitas', compact('data', 'tglawalFormatted', 'tglakhirFormatted', 'namapegawai', 'nama', 'users'));
    }
    
    
    
    
}
