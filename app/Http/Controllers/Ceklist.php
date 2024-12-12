<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ceklist extends Controller
{
    public function index()
    {
        // Filter to only get the rows where the is_checked column equals 1
        $cekForm = DB::table('form_install')
                    ->where('cek', 1)
                    ->get();

                      // Format tanggal pada setiap record
        foreach ($cekForm as $d) {
            $d->formatted_tanggal = Carbon::parse($d->tanggal)->format('d-m-Y');
        }

        return view('form-instalasi.ceklist', compact('cekForm'));
    }
}
