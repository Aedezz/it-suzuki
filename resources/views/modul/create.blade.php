@include('layout.modul')

<div class="container mx-auto my-6 bg-white p-6 rounded-lg shadow-lg max-w-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">Tambah Modul Baru</h2>
    
    <!-- Formulir -->
    <form method="POST" action="{{ route('modul.store') }}" class="space-y-6">
        @csrf

        <!-- Input Nama Modul -->
        <div>
            <label for="nama_modul" class="block font-medium text-gray-700">Nama Modul</label>
            <input 
                type="text" 
                name="nama_modul" 
                id="nama_modul" 
                class="border w-full p-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
                value="{{ old('nama_modul') }}" 
                required
                placeholder="Masukkan Nama Modul">
            @error('nama_modul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dropdown Kategori -->
        <div>
            <label for="id_kategori" class="block font-medium text-gray-700">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="border w-full p-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="text-center space-x-4">
            <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-md shadow-lg hover:bg-blue-500 transition duration-200">
                Simpan
            </button>
            <!-- Tombol Return (Kembali) -->
            <a href="{{ route('modul.index') }}" class="bg-gray-600 text-white py-3 px-6 rounded-md shadow-lg hover:bg-gray-500 transition duration-200">
                Kembali
            </a>
        </div>
    </form>
</div>
