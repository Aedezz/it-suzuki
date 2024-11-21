@extends('layout.modul')

@section('title', 'Daftar Modul')

@section('button')
<a href="{{ route('modul.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-500 transition duration-300">
    + Tambah Modul
</a>
@endsection

@section('filter')
<form method="GET" action="{{ route('modul.index') }}" class="flex flex-wrap items-center gap-4">
    <select name="id_kategori" class="border-gray-300 border p-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
        <option value="">Pilih Kategori</option>
        @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id_kategori }}" 
                {{ request('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                {{ $kategori->nama_kategori }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-500 transition duration-300">
        Filter
    </button>
</form>
@endsection

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
    @if ($moduls->isNotEmpty())
    <table class="w-full border-collapse border border-gray-200 rounded-lg">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left font-medium">No</th>
                <th class="px-4 py-3 text-left font-medium">Kategori</th>
                <th class="px-4 py-3 text-left font-medium">Nama Modul</th>
                <th class="px-4 py-3 text-left font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moduls as $modul)
            <tr class="hover:bg-green-100 transition duration-300">
                <td class="border-t px-4 py-3 text-gray-800">{{ $loop->iteration }}</td>
                <td class="border-t px-4 py-3 text-gray-800">{{ $modul->nama_kategori }}</td>
                <td class="border-t px-4 py-3 text-gray-800">{{ $modul->nama_modul }}</td>
                <td class="border-t px-4 py-3 flex space-x-2">
                    <!-- Tombol Edit -->
                    <a href="{{ route('modul.edit', $modul->id_modul) }}" class="text-green-600 hover:bg-green-200 rounded-full p-2" title="Edit Modul">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5l5 5M9 5l5-5"></path>
                        </svg>
                    </a>
                    
                    <!-- Tombol Hapus -->
                    <form action="{{ route('modul.destroy', $modul->id_modul) }}" method="POST" class="inline" title="Hapus Modul">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:bg-red-200 rounded-full p-2" onclick="return confirm('Yakin ingin menghapus modul ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center text-gray-500 mt-4">Tidak ada data untuk kategori yang dipilih.</p>
    @endif
</div>
@endsection
