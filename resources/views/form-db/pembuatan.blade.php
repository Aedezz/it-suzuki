@extends('layout.db-user')

@section('content')
<div class="bg-gray-100 min-h-screen py-6 flex justify-center items-start">        
        <!-- Form Section -->
        <div class="w-full bg-white rounded-lg p-6 shadow-lg">
                <form method="POST" action="{{ route('pembuatan.store') }}">
                    @csrf
                    <div class="text-center font-semibold text-xl mb-6">
                        <h2>Form Pembuatan User Baru / Reset Password</h2>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="nik" class="font-semibold">Nomor Induk Karyawan</label>
                            <input type="text" id="nik" name="nik" placeholder="Masukkan Nomor Induk Karyawan" required 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                        <div>
                            <label for="nama_lengkap" class="font-semibold">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                        <div>
                            <label for="jabatan" class="font-semibold">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" required 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                        <div>
                            <label for="divisi_cabang" class="font-semibold">Divisi/Cabang</label>
                            <input type="text" id="divisi_cabang" name="divisi_cabang" placeholder="Masukkan Divisi atau Cabang" required 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                    </div>

                    <!-- Additional Fields -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="modul" class="font-semibold">Modul</label>
                            <textarea id="modul" name="modul" placeholder="Deskripsikan modul yang dibutuhkan" 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 h-24"></textarea>
                        </div>
                        <div>
                            <label for="keterangan" class="font-semibold">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan (optional)" 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                    </div>

                    <!-- Aplikasi Section -->
                    <div class="mb-6">
                        <label class="font-semibold block mb-2">Aplikasi</label>
                        <div class="flex flex-wrap gap-4">
                            @foreach(['EMAIL', 'SDMS', 'ITS', 'HRIS', 'PURCHASE', 'ASET', 'ATT', 'INDENT', 'AUDIT', 'E-PART', 'ACCESS DOOR', 'INTERNET'] as $aplikasi)
                                <label class="inline-flex items-center text-sm">
                                    <input type="checkbox" name="aplikasi[]" value="{{ $aplikasi }}" 
                                        class="form-checkbox text-indigo-600">
                                    <span class="ml-2">{{ $aplikasi }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" 
                            class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            Simpan
                        </button>
                    </div>
                </form>
        </div>

        <!-- Instructions Section -->
            <div class="w-full bg-white rounded-lg p-6 shadow-lg mt-6">
                <h3 class="text-center font-semibold text-lg mb-4">Cara Pengajuan Perbaikan Perangkat:</h3>
                <div class="space-y-4">
                    
                    <!-- Step 1 -->
                    <div class="cursor-pointer">
                        <h3 onclick="toggleImage('image1')" class="text-sm">1. Minta form disposisi dengan Purchasing. Isi, tanda tangan Pemohon dan Atasan</h3>
                        <img id="image1" src="{{ asset('images/pembuat-user/form_user.png') }}" alt="Petunjuk Visual" 
                            class="hidden mt-2 w-full max-w-xs mx-auto rounded-lg">
                    </div>

                    <!-- Step 2 -->
                    <div class="cursor-pointer">
                        <h3 onclick="toggleImage('image2')" class="text-sm">2. Lengkapi Form dan klik tombol Save</h3>
                        <img id="image2" src="{{ asset('images/pembuat-user/cetak_user.png') }}" alt="Petunjuk Visual" 
                            class="hidden mt-2 w-full max-w-xs mx-auto rounded-lg">
                    </div>

                    <!-- Step 3 -->
                    <div class="cursor-pointer">
                        <h3 onclick="toggleImage('image4')" class="text-sm">3. Tanda tangan Pemohon</h3>
                        <img id="image4" src="{{ asset('images/pembuat-user/detail_user.png') }}" alt="Petunjuk Visual" 
                            class="hidden mt-2 w-full max-w-xs mx-auto rounded-lg">
                    </div>

                    <!-- Step 4 -->
                    <div>
                        <h3 class="text-sm">4. Serahkan Form Disposisi dan Tanda Terima ke IT</h3>
                    </div>
                </div>
            </div>
</div>

<script>
    function toggleImage(id) {
        const image = document.getElementById(id);
        image.style.display = image.style.display === 'none' ? 'block' : 'none';
    }
</script>

@endsection
