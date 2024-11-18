<?php

namespace App\Http\Controllers;

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

        return view('form-instalasi.ceklist', compact('cekForm'));
    }
}
