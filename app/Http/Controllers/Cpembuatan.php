<?php

namespace App\Http\Controllers;

use App\Models\Muser;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Cpembuatan extends Controller
{
    
    private function generateNumber($prefix, $month, $year, $number) {
        return sprintf('%s/%02d/%02d/%06d', $prefix, $month, $year, $number);
    }
    public function index()
    {
       $pembuatan = Muser::get();
       return view('pembuatan.index', compact('pembuatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembuatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['tanggal' => Carbon::now()->toDateString()]);

        $request->validate([
            'nomor'=>'string|max:25',
            'tanggal'=>'date',
            'nik'=>'required|string|max:25',
            'nama_lengkap'=> 'required|string|max:100',
            'jabatan'=> 'required|string|max:100',
            'divisi_cabang'=> 'required|string|max:100',
            'keterangan'=> 'required|string|max:100',
            'aplikasi'=>'array',
            'modul'=> 'required|string|max:100',
            // 'aplikasi' => implode(separator: ',', $request->input('aplikasi', ['EMAIL',' SDMS ','ITS','HRIS','PURCHASE','ASET','ATT','INDENT','AUDIT','E-PART','ACCESS DOOR','INTERNET'])),

        ]);
        
   // Step 1: Define prefix and get current month and year
   $prefix = 'SLV';
   $month = date('m'); // Current month in two digits
   $year = date('y'); // Last two digits of the current year

   // Step 2: Get the last entry and increment the number
   $lastEntry = Muser::where('nomor', 'like', "{$prefix}/{$month }/{$year}/%")
                     ->orderBy('nomor', 'desc')
                     ->first();

   // Step 3: Determine the next increment number
   if ($lastEntry) {
       $lastNumber = (int) substr($lastEntry->nomor, -6); // Get last 6 digits
       $newNumber = $lastNumber + 1;
   } else {
       $newNumber = 1; // Start at 1 if no previous entries
   }

   // Step 4: Generate the formatted `nomor`
   $nomor = $this->generateNumber($prefix, $month, $year, $newNumber);

    // Store data, including the generated `nomor`
    Muser::create([
        'nomor' => $nomor,
        'tanggal' => $request->tanggal,
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap,
        'jabatan' => $request->jabatan,
        'divisi_cabang' => $request->divisi_cabang,
        'keterangan' => $request->keterangan,
        'aplikasi' => implode(',', $request->input('aplikasi', [])),
        'modul' => $request->modul,
    ]);

    return redirect()->route('pembuatan.index')->with('success', 'Data berhasil disimpan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}