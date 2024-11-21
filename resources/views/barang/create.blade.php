@extends('layout.barang')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-extrabold text-center mb-6 text-gray-800">Tambah Barang</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
        @csrf
        <div class="mb-6">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Barang</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="flex space-x-4 justify-start mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md shadow hover:bg-blue-600 transition duration-300 w-full sm:w-auto text-center">Simpan</button>
            <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-md shadow hover:bg-gray-600 transition duration-300 w-full sm:w-auto text-center ml-auto">Kembali</a>
        </div>
    </form>
</div>
@endsection
