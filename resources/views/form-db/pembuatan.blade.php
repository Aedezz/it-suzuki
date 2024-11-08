@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px;">
    <div style="width: 100%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Pembuatan User Baru/Reset Password
        </h2>

        <form style="display: flex;" method="POST" action="#">
            @csrf
            <!-- Left section for form fields -->
            <div style="flex: 1; margin-right: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nik" style="display: block; font-weight: bold; font-size: 16px;">Nomor Induk Karyawan</label>
                        <input type="text" id="nikk" name="nik" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required>
                        @error('nik') {{ $message }} @enderror
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nama_lengap" style="display: block; font-weight: bold; font-size: 16px;">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required>
                        @error('nama_lengkap') {{ $message }} @enderror
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="jabatan" style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required>
                        @error('jabatan') {{ $message }} @enderror
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="divisi_cabang" style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                        <input type="text" id="divisi_cabang" name="divisi_cabang" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required>
                        @error('divisi_cabang') {{ $message }} @enderror
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="keterangan" style="display: block; font-weight: bold; font-size: 16px;">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;"></textarea>
                        <input type="text" id="keterangan" name="keterangan" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required>
                        @error('keterangan') {{ $message }} @enderror
                    </div>
                </div>

                <!-- Wrapper div for aplikasi section -->
                <div style="margin-top: 20px;">
                    <label class="block text-gray-700">Aplikasi</label>
                    <p>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="EMAIL" class="form-checkbox text-blue-600"> EMAIL</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="SDMS" class="form-checkbox text-blue-600"> SDMS</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="ITS" class="form-checkbox text-blue-600"> ITS</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="HRIS" class="form-checkbox text-blue-600"> HRIS</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="PURCHASE" class="form-checkbox text-blue-600"> PURCHASE</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="ASET" class="form-checkbox text-blue-600"> ASET</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="ATT" class="form-checkbox text-blue-600"> ATT</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="INDENT" class="form-checkbox text-blue-600"> INDENT</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="AUDIT" class="form-checkbox text-blue-600"> AUDIT</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="E-PART" class="form-checkbox text-blue-600"> E-PART</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="ACCESS DOOR" class="form-checkbox text-blue-600"> ACCESS DOOR</label>
                        <label class="inline-flex items-center mr-6"><input type="checkbox" name="aplikasi[]" value="INTERNET" class="form-checkbox text-blue-600"> INTERNET</label>
                        <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="aplikasi_lainnya" placeholder="Lainnya">
                    </p>
                </div>

                 <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                    <label for="keterangan" style="display: block; font-weight: bold; font-size: 16px;">Modul</label>
                    <textarea name="modul" id="modul" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;" required></textarea>
                    @error('modul') {{ $message }} @enderror
                </div>
            

                 <!-- Save button moved here -->
                 <button type="submit" style="max-width: 20%; padding: 10px 20px; background-color: #6A1E55; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
                    Save
                </button>
            </div>

            <!-- Right section for image and heading -->
            <div style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
                <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Install Komputer/Laptop :</h3>
                
                {{-- Section 1 --}}
                <h3>1. Lengkapi <b>Form</b> dan klik tombol <b>Save</b</h3>
                <img src="images/pembuat-user/form_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 2 --}}
                <h3>2. Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b></h3>
                <img src="images/pembuat-user/cetak_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 3 --}}
                <h3>3. Tanda tangan <b>Pemohon</b> dan <b>Atasan</b></h3>
                <img src="images/pembuat-user/detail_user.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 4 --}}
                <h3>4. Serahkan Form ke IT</h3>
                <br>

                <p style="font-size: 14px; color: #555; margin-top: 10px;">
                    Gambar ini menunjukkan langkah-langkah yang perlu diikuti untuk mengajukan instalasi komputer atau laptop.
                </p>
            </div>
        </form>
    </div>
</div>
