@include('layout.navbar')

<style>

    
    /* Desktop view: menjaga susunan dua kolom seperti awal */
    @media (min-width: 769px) {
        form {
            display: flex;
            flex-direction: row; /* Susun secara horizontal pada desktop */
        }

        .form-left input {
        width: 100%; /* Field mengisi seluruh lebar yang tersedia */
        max-width: 500px; /* Maksimal lebar field pada desktop */
    }

        .form-left, .form-right {
            flex: 1;
            margin-right: 20px;
        }

        .form-left div {
            flex: 1;
            min-width: 45%;
            margin-bottom: 20px;
        }

        .form-left button {
            max-width: 20%;
        }

        .simpan:hover{
            background-color: 
            rgb(0, 68, 255)
        }
        .reset:hover{
            background-color: 
            red
        }

        /* Right section (image instructions) */
        .form-right {
            max-width: 300px;
            padding: 20px;
            background-color: #f8f8f8;
            text-align: center;
            border-radius: 4px;
        }

        .form-right img {
            width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .form-right h3 {
            font-size: 16px;
            margin-bottom: 15px;
        }
    }

    /* Mobile view: mengubah susunan menjadi vertikal */
    @media (max-width: 768px) {
        form {
            flex-direction: column; /* Susun vertikal pada mobile */
        }

        /* Bagian kiri form */
        .form-left {
            width: 100%;
            margin-right: 0;
        }

        .form-left div {
            width: 100%;
            margin-bottom: 15px;
        }

        .form-left input, .form-left label {
            font-size: 14px; /* Menyesuaikan font agar tidak terlalu besar di mobile */
        }

        .form-left button {
            width: 100%;
    max-width: 80%; /* Menentukan maksimal lebar tombol */
    margin: 0 auto; /* Membuat tombol berada di tengah */
    display: block; /* Mengubah tombol menjadi elemen blok */
    margin-bottom: 15px; /* Memberikan jarak antar tombol */
        }

        .simpan:hover{
            background-color: 
            rgb(0, 68, 255)
        }
        .reset:hover{
            background-color: 
            red
        }

        /* Right section: menyesuaikan lebar dan gambar */
        .form-right {
            width: 100%;
            margin-top: 20px;
        }

        .form-right img {
            width: 100%; /* Menyesuaikan gambar dengan lebar */
            height: auto;
        }

        /* Menyesuaikan margin dan padding */
        .form-left input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
        }
    }
</style>


<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px;">
    <div style="width: 100%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative; margin-top: -10px;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 21px; margin-top: -15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Perbaikan Perangkat
        </h2>

        <form method="POST" action="{{ route('perbaikan.store') }}">
            @csrf
            <div class="form-left">
                <div style="margin-bottom: 20px; padding-top: 20px;">
                    <label for="nik" style="display: block; font-weight: bold; font-size: 16px;">Nomor Induk Karyawan</label>
                    <input type="text" id="nik" name="nik" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('nik')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="nama_lengkap" style="display: block; font-weight: bold; font-size: 16px;">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('nama_lengkap')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="jabatan" style="display: block; font-weight: bold; font-size: 16px;">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="divisi_cabang" style="display: block; font-weight: bold; font-size: 16px;">Divisi/Cabang</label>
                    <input type="text" id="divisi_cabang" name="divisi_cabang" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('divisi_cabang')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="kode_asset" style="display: block; font-weight: bold; font-size: 16px;">Kode Asset</label>
                    <input type="text" id="kode_asset" name="kode_asset" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('kode_asset')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="tgl_beli" style="display: block; font-weight: bold; font-size: 16px;">Tanggal Beli</label>
                    <input type="date" id="tgl_beli" name="tgl_beli"
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('tgl_beli')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <script>
                    const today = new Date();
                    const formattedDate = today.toISOString().split('T')[0]; 
                    document.getElementById("tgl_beli").value = formattedDate;
                </script>

                <div style="margin-bottom: 20px;">
                    <label for="nama_barang" style="display: block; font-weight: bold; font-size: 16px;">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="jumlah" style="display: block; font-weight: bold; font-size: 16px;">Jumlah</label>
                    <input type="text" id="jumlah" name="jumlah" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="spesifikasi" style="display: block; font-weight: bold; font-size: 16px;">Spesifikasi</label>
                    <input type="text" id="spesifikasi" name="spesifikasi" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('spesifikasi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="keluhan" style="display: block; font-weight: bold; font-size: 16px;">Keluhan</label>
                    <input type="text" id="keluhan" name="keluhan" required
                        style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px;">
                    @error('keluhan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <button type="submit" class="simpan bg-blue-500 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    <button type="reset" class="reset bg-red-500 text-white font-bold py-2 px-4 rounded">Reset</button>
                </div>
            </div>
            
             {{-- Section 1 --}}
            <div class="form-right">
                <h3 style="font-size: 15px; margin-bottom: 15px;">Cara Pengajuan Perbaikan Perangkat:</h3>
                <h3 style="font-size: 14px;">1. Minta form disposisi dengan Purchasing. Isi, tanda tangan <b> Pemohon dan Atasan</b></h3>
                <img src="../images/perbaikan/disposisi.png" alt="Gambar Petunjuk">
                <br>
                <h3 style="font-size: 14px;">2. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
                <img src="../images/perbaikan/form_perangkat.png" alt="Gambar Petunjuk">
                <br>
                <h3 style="font-size: 14px;">3. Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b>.</h3>
                <img src="../images/perbaikan/detail_perangkat.png" alt="Gambar Petunjuk">
                <br>
                <h3 style="font-size: 14px;">4. Tanda tangan <b>Pemohon</b></h3>
                <img src="../images/perbaikan/cetak_perangkat.png" alt="Gambar Petunjuk">
                <br>
                <h3 style="font-size: 14px;">5. Serahkan <b>Form Disposisi dan Tanda Terima ke IT</b></h3>           
            </div>
        </form>
    </div>
</div>
