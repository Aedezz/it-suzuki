@include('layout.modul')

<div class="container mx-auto my-6 bg-white p-6 rounded-lg shadow-lg max-w-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">Edit Modul</h2>

    <form method="POST" action="{{ route('modul.update', $modul->id_modul) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Modul -->
        <div>
            <label for="nama_modul" class="block text-gray-700 font-medium">Nama Modul</label>
            <input 
                type="text" 
                id="nama_modul" 
                name="nama_modul" 
                value="{{ old('nama_modul', $modul->nama_modul) }}" 
                class="border w-full p-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" 
                required 
                placeholder="Masukkan Nama Modul">
            @error('nama_modul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori (Tidak Bisa Diubah) -->
        <div>
            <label for="kategori" class="block text-gray-700 font-medium">Kategori</label>
            <p class="p-3 bg-gray-100 border rounded-md text-gray-600">{{ $modul->nama_kategori }}</p>
        </div>

        <!-- Tombol Simpan Perubahan dan Tombol Return -->
        <div class="flex justify-end space-x-4">
            <!-- Tombol Simpan -->
            <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-md shadow-lg hover:bg-blue-500 transition duration-200">
                Simpan Perubahan
            </button>

            <!-- Tombol Kembali (Return) -->
            <a href="{{ route('modul.index') }}" class="bg-gray-600 text-white py-3 px-6 rounded-md shadow-lg hover:bg-gray-500 transition duration-200">
                Kembali
            </a>
        </div>
    </form>
</div>
