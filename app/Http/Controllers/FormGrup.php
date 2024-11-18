<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormGrup extends Controller
{
    public function index()
    {
        $groups = DB::table('grup')->paginate(10); // Menambahkan pagination
        return view('group.index', compact('groups'));
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_grup' => 'required|string|max:100',
        ]);

        DB::table('grup')->insert([
            'nama_grup' => $request->input('nama_grup'),
        ]);

        return redirect()->route('group.index')->with('success', 'Grup berhasil ditambahkan');
    }

    public function edit($id)
    {
        $group = DB::table('grup')->where('id_grup', $id)->first();
        
        if (!$group) {
            return redirect()->route('group.index')->with('error', 'Grup tidak ditemukan');
        }

        return view('group.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_grup' => 'required|string|max:100',
        ]);

        DB::table('grup')->where('id_grup', $id)->update([
            'nama_grup' => $request->input('nama_grup'),
        ]);

        return redirect()->route('group.index')->with('success', 'Grup berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('grup')->where('id_grup', $id)->delete();
        return redirect()->route('group.index')->with('success', 'Grup berhasil dihapus');
    }
}
