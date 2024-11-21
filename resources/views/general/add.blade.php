@include('layout.menu-navbar')

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <h2 class="font-sans text-xl sm:text-2xl font-bold mb-6 text-gray-800">
            Tambah Cabang
        </h2>

        <!-- Form to add a new branch -->
        <form action="{{ route('branch.store') }}" method="POST">
            @csrf

            <!-- Nama Cabang Field -->
            <div class="mb-4">
                <label for="nama_cabang" class="block text-gray-700 font-semibold">Nama Cabang</label>
                <input type="text" id="nama_cabang" name="nama_cabang" required class="w-full px-4 py-2 border rounded-lg" placeholder="Masukkan Nama Cabang">
            </div>

            <!-- Combined Informasi and Perusahaan Fields -->
            <div class="mb-4">
                <!-- Informasi Field -->
                <label for="informasi" class="block text-gray-700 font-semibold">Informasi</label>
                <input type="text" id="informasi" name="informasi" required class="w-full px-4 py-2 border rounded-lg mt-2">
                
                <!-- Perusahaan Field -->
                <label for="perusahaan" class="block text-gray-700 font-semibold mt-4">Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" required class="w-full px-4 py-2 border rounded-lg mt-2">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Tambah</button>
            </div>
        </form>
    </div>
</div>
