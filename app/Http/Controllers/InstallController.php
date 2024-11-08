<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function fetchData($nik)
{
    // Retrieve data from 'it_2' database using 'nik'
    $data = DB::connection('it_2')
        ->table('form_install')
        ->where('nik', $nik)
        ->first();  // Get the first match

    if ($data) {
        return response()->json([
            'nama_lengkap' => $data->nama_lengkap,
            'jabatan' => $data->jabatan,
            'divisi_cabang' => $data->divisi_cabang,
            'kode_asset' => $data->kode_asset,
        ]);
    }

    return response()->json(['error' => 'Data not found'], 404);
}


    public function getNikData(Request $request)
    {
        $nik = $request->query('nik');
        
        // Query the database to get the data for the given NIK
        $data = DB::table('it_2')
                ->where('nik', $nik)
                ->first(['nama_lengkap', 'jabatan', 'divisi_cabang', 'kode_asset']); // Adjust fields as needed

        // Check if data exists
        if ($data) {
            return response()->json($data);
        }

        // Return empty response if no data found
        return response()->json([]);
    }
}
