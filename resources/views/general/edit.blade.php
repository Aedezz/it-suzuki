@include('layout.menu-navbar')

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
          Edit Cabang
        </h2>
    <hr><hr>
        <!-- Form Section -->
        <div class="container mt-2">            
            <div class="form-row flex flex-wrap -mx-2">
    <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
    <form action="{{ route('branch.update', $branch->id_cabang) }}" method="POST" class="w-full">
        @csrf
        @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk memperbarui data -->
        <div class="mt-8 grid lg:grid-cols-2 gap-6">
            <!-- Nama Periode -->
            <div class="flex flex-col" style="margin-left: 20px">
                <label for="nama_cabang" class="text-sm text-gray-700 font-medium mb-2">Nama Periode</label>
                <input type="text" name="nama_cabang" id="nama_cabang"
                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                    placeholder="Enter your period name"
                value="{{ $branch->nama_cabang }}" />
            </div>

            <div class="flex flex-col" style="margin-left: 20px">
                <label for="informasi" class="text-sm text-gray-700 font-medium mb-2">Informasi</label>
                <input type="text" name="informasi" id="informasi"
                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                    placeholder="Enter your period name"
                    value="{{ old('informasi', $branch->informasi) }}" />
            </div>

            <div class="flex flex-col" style="margin-left: 20px">
                <label for="perusahaan" class="text-sm text-gray-700 font-medium mb-2">Nama Periode</label>
                <input type="text" name="perusahaan" id="perusahaan"
                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                    placeholder="Enter your period name"
                    value="{{ old('perusahaan', $branch->perusahaan) }}" />
            </div>
         
        </div>

        <div class="space-x-4 mt-8 flex justify-end">
            <!-- Simpan Button -->
            <button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                Simpan
            </button>
            <!-- Kembali Button -->
            <a href="{{ route('branch') }}" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                Kembali
            </a>
        </div>
    </form>
</div>