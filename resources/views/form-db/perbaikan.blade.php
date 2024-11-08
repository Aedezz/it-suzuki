@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px;">
    <div
        style="width: 100%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold"
            style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Perbaikan Perangkat
        </h2>

        <form style="display: flex;"  method="POST" action="{{ route('perbaikan.store') }}">
            <!-- Left section for form fields -->
            <div style="flex: 1; margin-right: 20px;">
                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nomor" style="display: block; font-weight: bold; font-size: 16px;">Nomor Induk
                            Karyawan</label>
                        <input type="text" id="nomor" name="nomor"
                            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nama_lengkap" style="display: block; font-weight: bold; font-size: 16px;">Nama
                            Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="jabatan"
                            style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan"
                            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="divisi_cabang"
                            style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                        <input type="text" id="divisi_cabang" name="divisi_cabang"
                            style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Kode
                            Asset</label>
                        <input type="text" id="kode_asset" name="kode_asset"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="tgl_beli" style="display: block; font-weight: bold; font-size: 16px;">Tanggal
                            Beli</label>
                        <input type="date" id="tgl_beli" name="tgl_beli"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <script>
                        const today = new Date();
                        const formattedDate = today.toISOString().split('T')[0]; 
                        document.getElementById("tgl_beli").value = formattedDate;
                    </script>


                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="nama_barang" style="display: block; font-weight: bold; font-size: 16px;">Nama
                            Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="jumlah" style="display: block; font-weight: bold; font-size: 16px;">Jumlah</label>
                        <input type="text" id="jumlah" name="jumlah"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="spesifikasi"
                            style="display: block; font-weight: bold; font-size: 16px;">Spesifikasi</label>
                        <input type="text" id="spesifikasi" name="spesifikasi"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>

                    <div style="flex: 1; min-width: 45%; margin-bottom: 20px;">
                        <label for="keluhan"
                            style="display: block; font-weight: bold; font-size: 16px;">Keluhan</label>
                        <input type="text" id="keluhan" name="keluhan"
                            style="width: 100%; max-width: 290px; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    </div>
                </div>

                <button type="submit"
                    style="max-width: 20%; padding: 10px 20px; background-color: #6A1E55; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
                    SIMPAN
                </button>
            </div>

            <!-- Right section for image and heading -->
            <div
                style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
                <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Install Komputer/Laptop :</h3>

                {{-- Section 1 --}}
                <h3>1. Minta form disposisi dengan Purchasing. Isi, tanda tangan <b>Pemohon dan Atasan</b></h3>
                <img src="../images/perbaikan/disposisi.png" alt="Petunjuk Visual"
                    style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 2 --}}
                <h3>2. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
                <img src="../images/perbaikan/form_perangkat.png" alt="Petunjuk Visual"
                    style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 3 --}}
                <h3>3. Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b>.</h3>
                <img src="../images/perbaikan/detail_perangkat.png" alt="Petunjuk Visual"
                    style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">

                {{-- Section 4 --}}
                <h3>4. Tanda tangan <b>Pemohon</b> </h3>
                <img src="../images/perbaikan/cetak_perangkat.png" alt="Petunjuk Visual"
                    style="width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px;">
                <br>
                <h3>5. Serahkan <b>Form Disposisi dan Tanda Terima ke IT</b> </h3>

            </div>
        </form>
    </div>
</div>
