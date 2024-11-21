@extends('layout.barang')

@section('content')
<div class="container mx-auto mt-10 px-6 max-w-screen-lg">
    <h1 class="text-4xl font-bold text-center mb-6 text-gray-800">Daftar Barang</h1>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Tambah Barang</a>
    </div>

    <!-- Tabel Daftar Barang -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full table-auto border-collapse text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left border-b-2 border-gray-300">No</th>
                    <th class="px-4 py-3 text-left border-b-2 border-gray-300">Nama Barang</th>
                    <th class="px-4 py-3 text-left border-b-2 border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $index => $barang)
                    <tr class="hover:bg-indigo-50 transition duration-300">
                        <td class="border-b-2 border-gray-200 px-4 py-3 text-left">{{ $index + 1 }}</td>
                        <td class="border-b-2 border-gray-200 px-4 py-3 text-left">{{ $barang->nama }}</td>
                        <td class="border-b-2 border-gray-200 px-4 py-3 text-left">
                            <!-- Tombol Edit dengan Ikon -->
                            <a href="{{ route('barang.edit', $barang->id) }}" 
                                class="bg-yellow-500 text-white w-8 h-8 flex items-center justify-center rounded-full shadow-md hover:bg-yellow-600 transition duration-300"
                                title="Edit Barang">
                                 <!-- Icon Pensil -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M16 3l5 5-11 11H5v-5L16 3z"></path>
                                 </svg>
                             </a>                                                       
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
