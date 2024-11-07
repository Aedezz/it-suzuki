<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; // Import DomPDF

class perbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Generate PDF and download.
     */
    public function generatePDF()
    {
        try {
            $data = ['title' => 'Example PDF'];
            $pdf = PDF::loadView('pdf_view', $data);
            return $pdf->download('file.pdf');
        } catch (\Exception $e) {
            // Log error atau tampilkan pesan error
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
}
