@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px;">
    <div style="width: 70%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Install Komputer/Laptop
        </h2>

        <form style="display: flex;">
            <!-- Left section for form fields -->
            <div style="flex: 1; margin-right: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="no_induk" style="display: block; font-weight: bold; font-size: 16px;">Nomor Induk Karyawan</label>
                        <input type="text" id="no_induk" name="no_induk" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nama_leng" style="display: block; font-weight: bold; font-size: 16px;">Nama Lengkap</label>
                        <input type="text" id="nama_leng" name="nama_leng" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="jabatan" style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="divisi_cbg" style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                        <input type="text" id="divisi_cbg" name="divisi_cbg" style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="kode_ass" style="display: block; font-weight: bold; font-size: 16px;">Kode Asset</label>
                        <input type="text" id="kode_ass" name="kode_ass" style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>                    
                </div>

                <button type="submit" style="max-width: 20%; padding: 10px 20px; background-color: #6A1E55; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
                    Save
                </button>
            </div>

            <!-- Right section for image and heading -->
            <div style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
                <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Install Komputer/Laptop :</h3>
                
                {{-- Section 1 --}}
                <h3>1. Lengkapi Form dan klik tombol Save</h3>
                <img src="../images/installasi/form_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 2 --}}
                <h3>2. Setelah berhasil, klik tombol Print dan Cetak Dokumen.</h3>
                <img src="../images/installasi/detail_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 3 --}}
                <h3>3. Tanda tangan Pemohon (materai 6.0000) dan Atasan</h3>
                <img src="../images/installasi/cetak_install.png" alt="Petunjuk Visual" style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

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
