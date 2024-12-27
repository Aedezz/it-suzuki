{{-- @extends('layout.db-user')

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

@endsection --}}

@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 50vh; padding: 20px;">
    <div style="width: 70%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Pembuatan User Baru / Reset Password
        </h2>

        <form action="{{ route('pembuatan.store') }}" method="POST" style="display: flex;">
            <!-- Left section for form fields -->
            @csrf
            <div style="flex: 1; margin-right: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                    
                    <!-- NIK Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="nik" style="display: block; font-weight: bold; font-size: 16px;">Nomor Induk Karyawan</label>
                        <input type="text" id="nik" name="nik" required autocomplete="off" 
                            placeholder="Masukkan NIK Anda" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>
                    
                    <!-- Nama Lengkap Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="nama_lengkap" style="display: block; font-weight: bold; font-size: 16px;">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap Anda" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>
                    
                    <!-- Jabatan Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="jabatan" style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>
                    
                    <!-- Divisi/Cabang Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="divisi_cabang" style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                        <input type="text" id="divisi_cabang" name="divisi_cabang" placeholder="Masukkan Divisi/Cabang" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>
                    
                    <!-- Additional Fields -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-1">
                        <div>
                            <label for="modul" style="display: block; font-weight: bold; font-size: 16px;">Modul</label>
                            <textarea id="modul" name="modul" placeholder="Deskripsikan modul yang dibutuhkan" 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 h-24"></textarea>
                        </div>
                        <div>
                            <label for="keterangan" class="font-semibold" style="font-weight: bold">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan (optional)" 
                                class="w-full px-3 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        </div>
                    </div>

                    <!-- Aplikasi Section -->
                    <div class="mb-1">
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

                                    
                </div>
                
                <!-- Submit Button -->
                <button type="submit" 
                        style="max-width: 20%; padding: 10px 20px; background-color: #6A1E55; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
                    Simpan
                </button>
            </div>  

            <!-- Right section for image and heading -->
            <div style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
                <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Perbaikan Perangkat:</h3>

                <!-- Section 1 -->
                <div onclick="toggleSection('section1')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">1. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow1" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section1" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/pembuat-user/form_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 2 -->
                <div onclick="toggleSection('section2')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">2. Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen.</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow2" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section2" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/pembuat-user/cetak_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 3 -->
                <div onclick="toggleSection('section3')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">3. Tanda tangan dan Atasan</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow3" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section3" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/pembuat-user/detail_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 4 -->
                <div style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <h3 style="font-size: 14px; margin-right: 10px;">4. Serahkan <b>Form ke IT</b></h3>
                </div>
                
                <p style="font-size: 14px; color: #555; margin-top: 10px;">
                    Gambar ini menunjukkan langkah-langkah yang perlu diikuti untuk mengajukan pembuatan user.
                </p>
            </div>

            <!-- Add CSS for smoother animation -->
            <style>
                .section-content {
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.1s ease-out;
                }
                .section-content.show {
                    max-height: 500px; /* Adjust based on the content size */
                }

                .arrow {
                    transition: transform 0.2s ease;
                }

                .arrow.up {
                    transform: rotate(180deg);
                }

                .down-arrow {
                    transform: rotate(0deg); /* Ensure down arrow is facing down initially */
                }

                .up-arrow {
                    transform: rotate(180deg); /* Rotate to upward direction */
                }
            </style>

            <script>
            function toggleSection(sectionId) {
                const section = document.getElementById(sectionId);
                const arrow = document.getElementById("arrow" + sectionId.charAt(sectionId.length - 1));

                // Toggle the section visibility
                if (section.style.display === "none" || !section.classList.contains("show")) {
                    section.style.display = "block";
                    section.classList.add("show");  // Add class for transition effect
                    arrow.classList.remove("down-arrow");
                    arrow.classList.add("up-arrow");  // Rotate arrow to up position
                } else {
                    section.classList.remove("show");  // Remove class for transition effect
                    arrow.classList.remove("up-arrow");
                    arrow.classList.add("down-arrow");  // Reset arrow to down position
                    setTimeout(() => {
                        section.style.display = "none";
                    }, 500);  // Wait for animation to finish before hiding
                }
            }
            </script>
        </form>
    </div>
</div>
