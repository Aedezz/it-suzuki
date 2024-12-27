{{-- @include('layout.navbar')
<style>
    /* CSS tambahan untuk menghilangkan ruang paling bawah */
    .slide-down {
        animation: slideDown 0.5s ease forwards;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Mengatur margin bawah pada seluruh elemen */
    form,
    .slide-down {
        margin-bottom: 0 !important;
    }
</style>

<div>
    <div style="display: flex; justify-content: center; padding: 20px; min-height: 50vh;">
        <div
            style="width: 100%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h2 class="font-sans text-2xl font-bold"
                style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                Form Perbaikan Perangkat
            </h2>
            <form style="display: flex;" method="POST" action="#">
                @csrf
                <!-- Left section for form fields -->
                <div style="flex: 1; margin-right: 20px; margin-bottom: 0%;">
                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <div style="flex: 1; min-width: 45%; margin-bottom: 10px; ">
                            <label for="nik" style="display: block; font-weight: bold; font-size: 16px;">Nomor
                                Induk
                                Karyawan</label>
                            <input type="text" id="nik" name="nik"
                                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('nik')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-bottom: 10px;">
                            <label for="nama_lengkap" style="display: block; font-weight: bold; font-size: 16px;">Nama
                                Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('nama_lengkap')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="jabatan"
                                style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan"
                                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('jabatan')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="divisi_cabang"
                                style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                            <input type="text" id="divisi_cabang" name="divisi_cabang"
                                style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('divisi_cabang')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Kode
                                Asset</label>
                            <input type="text" id="kode_asset" name="kode_asset"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('kode_asset')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="tgl_beli" style="display: block; font-weight: bold; font-size: 16px;">Tanggal
                                Beli</label>
                            <input type="date" id="tgl_beli" name="tgl_beli"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('tgl_beli')
                                {{ $message }}
                            @enderror
                        </div>

                        <script>
                            const today = new Date();
                            const formattedDate = today.toISOString().split('T')[0];
                            document.getElementById("tgl_beli").value = formattedDate;
                        </script>


                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="nama_barang" style="display: block; font-weight: bold; font-size: 16px;">Nama
                                Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('nama_barang')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="jumlah"
                                style="display: block; font-weight: bold; font-size: 16px;">Jumlah</label>
                            <input type="text" id="jumlah" name="jumlah"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('jumlah')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="spesifikasi"
                                style="display: block; font-weight: bold; font-size: 16px;">Spesifikasi</label>
                            <input type="text" id="spesifikasi" name="spesifikasi"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('spesifikasi')
                                {{ $message }}
                            @enderror
                        </div>

                        <div style="flex: 1; min-width: 45%; margin-top: -15px;">
                            <label for="keluhan"
                                style="display: block; font-weight: bold; font-size: 16px;">Keluhan</label>
                            <input type="text" id="keluhan" name="keluhan"
                                style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                            @error('keluhan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                        style="max-width: 20%; padding: 10px 20px; background-color: #6A1E55; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
                        SIMPAN
                    </button>
                </div>


                <!-- Gambar -->
                <div
                    style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px; margin-top: -15px;">
                    <div
                        style="width: 100%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">


                        @csrf
                        <!-- Left section for form fields -->
                        <!-- Form fields here (unchanged) -->

                        <!-- Right section with clickable instructions and hidden images -->
                        <div
                            style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
                            <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Perbaikan Perangkat
                                <b>Silahkan Tekan Setiap Nomor Untuk Melihat Instruksi</b>:
                            </h3>

                            <!-- Instruction with clickable text -->
                            <h3 onclick="toggleImage('image1')" style="cursor: pointer;">1. Minta form disposisi
                                dengan Purchasing. Isi, tanda tangan <b>Pemohon dan Atasan</b></h3>
                            <img id="image1" src="../images/perbaikan/disposisi.png" alt="Petunjuk Visual"
                                style="display: none; width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                            <h3 onclick="toggleImage('image2')" style="cursor: pointer;">2. Lengkapi <b>Form</b> dan
                                klik tombol <b>Save</b></h3>
                            <img id="image2" src="../images/perbaikan/form_perangkat.png" alt="Petunjuk Visual"
                                style="display: none; width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                            <h3 onclick="toggleImage('image3')" style="cursor: pointer;">3. Setelah berhasil, klik
                                tombol <b>Print</b> dan <b>Cetak Dokumen</b>.</h3>
                            <img id="image3" src="../images/perbaikan/detail_perangkat.png" alt="Petunjuk Visual"
                                style="display: none; width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                            <h3 onclick="toggleImage('image4')" style="cursor: pointer;">4. Tanda tangan
                                <b>Pemohon</b>
                            </h3>
                            <img id="image4" src="../images/perbaikan/cetak_perangkat.png" alt="Petunjuk Visual"
                                style="display: none; width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                            <h3 onclick="toggleImage('image5')" style="cursor: pointer;">5. Serahkan <b>Form
                                    Disposisi dan Tanda Terima ke IT</b></h3>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>



<!-- JavaScript for toggling images -->
<script>
    function toggleImage(imageId) {
        const img = document.getElementById(imageId);
        if (img.style.display === "none" || img.style.display === "") {
            img.style.display = "block";
            img.classList.add("slide-down");
        } else {
            img.style.display = "none";
            img.classList.remove("slide-down");
        }
    }
</script> --}}

@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 50vh; padding: 20px;">
    <div style="width: 70%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Perbaikan Perangkat
        </h2>

        <form action="{{ route('perbaikan.store') }}" method="POST" style="display: flex;">
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
                    
                    <!-- Kode Asset Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Kode Asset</label>
                        <input type="text" id="kode_asset" name="kode_asset" placeholder="Masukkan Kode Asset" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <!-- Tanggal Beli Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Tanggal Beli</label>
                        <input type="date" id="tgl_beli" name="tgl_beli" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <!-- Nama Barang Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <!-- Jumlah Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Jumlah</label>
                        <input type="text" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <!-- Spesifikasi Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Spesifikasi</label>
                        <input type="text" id="spesifikasi" name="spesifikasi" placeholder="Masukkan Spesifikasi" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <!-- Keluhan Field -->
                    <div style="flex: 1; min-width: 45%; margin-bottom: 3px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Keluhan</label>
                        <input type="text" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan" required style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
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
                <h3 style="font-size: 16px; margin-bottom: 15px;">Tata cara Pengajuan Perbaikan Perangkat :</h3>

                <!-- Section 1 -->
                <div onclick="toggleSection('section1')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">1. Minta form disposisi dengan Purchasing. Isi, tanda tangan <b>Pemohon dan Atasan</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow1" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section1" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/perbaikan/disposisi.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 2 -->
                <div onclick="toggleSection('section2')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">2. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow2" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section2" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/perbaikan/form_perangkat.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 3 -->
                <div onclick="toggleSection('section3')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">3. Setelah berhasil, klik
                        tombol <b>Print</b> dan <b>Cetak Dokumen</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow3" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section3" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/perbaikan/detail_perangkat.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 4 -->
                <div onclick="toggleSection('section4')" style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <!-- Title and SVG Arrow Icon -->
                    <h3 style="font-size: 14px; margin-right: 10px;">4. Tanda tangan
                        <b>Pemohon</b></h3>
                    <!-- Down Arrow Icon by default -->
                    <svg id="arrow3" class="w-6 h-6 text-gray-800 dark:text-white arrow down-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 10" style="transition: transform 0.3s ease;">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1.707 2.707 5.586 5.586a1 1 0 0 0 1.414 0l5.586-5.586A1 1 0 0 0 13.586 1H2.414a1 1 0 0 0-.707 1.707Z"/>
                    </svg>
                </div>
                <div id="section4" class="section-content" style="display: none; margin-bottom: 15px;">
                    <img src="../images/perbaikan/cetak_perangkat.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                </div>

                <!-- Section 5 -->
                <div style="cursor: pointer; margin-bottom: 10px; display: flex; align-items: center;">
                    <h3 style="font-size: 14px; margin-right: 10px;">5. Serahkan <b>Form ke IT</b></h3>
                </div>
                
                <p style="font-size: 14px; color: #555; margin-top: 10px;">
                    Gambar ini menunjukkan langkah-langkah yang perlu diikuti untuk mengajukan Perbaikan Perangkat.
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