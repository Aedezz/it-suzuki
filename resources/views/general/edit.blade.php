@include('layout.menu-navbar')

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <h2 class="font-sans text-xl sm:text-2xl font-bold mb-6 text-gray-800">
            Edit Cabang
        </h2>
        
        <form action="{{ route('branch.update', $branch->id_cabang) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nama_cabang" class="block text-gray-700 font-semibold">Nama Cabang</label>
                <input type="text" id="nama_cabang" name="nama_cabang" value="{{ $branch->nama_cabang }}" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            
            <div class="mb-4">
                <!-- Informasi Field -->
                <label for="informasi" class="block text-gray-700 font-semibold">Informasi</label>
                <input type="text" id="informasi" name="informasi" value="{{ old('informasi', $branch->informasi) }}" required class="w-full px-4 py-2 border rounded-lg mt-2">
                
                <!-- Perusahaan Field -->
                <label for="perusahaan" class="block text-gray-700 font-semibold mt-4">Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" value="{{ old('perusahaan', $branch->perusahaan) }}" required class="w-full px-4 py-2 border rounded-lg mt-2">
            </div>            
            
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>
