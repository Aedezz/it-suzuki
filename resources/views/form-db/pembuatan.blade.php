@include('layout.navbar')

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

    /* Memindahkan container dan mengatur flexbox */
    .container {
        display: flex;
        justify-content: flex-start; /* Menjaga form tetap di kanan */
        align-items: flex-start; /* Menjaga elemen-elemen di bagian atas */
        min-height: 100vh;
        padding: 30px;
        gap: 30px; /* Memberi jarak antara form dan instruksi */
    }

    .form-container {
        width: 100%;
        max-width: 900px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center; /* Memusatkan teks dalam form */
    }

    .form-grid,
    .form-grid-modul {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        align-items: center; /* Memusatkan input dan label */
    }

    input[type="text"],
    textarea {
        padding: 12px;
        font-size: 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        width: 100%;
        text-align: center; /* Memusatkan teks di dalam input */
    }

    textarea {
        height: 100px;
    }

    .instruction-section {
        flex: 1;
        max-width: 350px;
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 4px;
        border: 1px solid #ddd;
        text-align: center;
    }

    h3 {
        cursor: pointer;
        margin: 10px 0;
    }

    .instruction-section img {
        display: none;
        width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <!-- Main Form Section -->
    <div class="form-container">
        @if(session('data') == null)
            <h2 class="form-title" style="font-size: 26px; color: #333; font-weight: 600; margin-bottom: 30px;">
                Form Pembuatan User Baru/Reset Password
            </h2>

            <form method="POST" action="{{ route('pembuatan.store') }}">
                @csrf
                <div class="form-card">
                    <!-- Data Model Section -->
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nik" style="font-size: 14px; font-weight: 600; color: #333;">Nomor Induk Karyawan</label>
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan Nomor Induk Karyawan" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap" style="font-size: 14px; font-weight: 600; color: #333;">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan" style="font-size: 14px; font-weight: 600; color: #333;">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" required>
                        </div>

                        <div class="form-group">
                            <label for="divisi_cabang" style="font-size: 14px; font-weight: 600; color: #333;">Divisi/Cabang</label>
                            <input type="text" id="divisi_cabang" name="divisi_cabang" class="form-control" placeholder="Masukkan Divisi atau Cabang" required>
                        </div>
                    </div>

                    <!-- Modul & Keterangan Side by Side -->
                    <div class="form-grid-modul">
                        <div class="form-group">
                            <label for="modul" style="font-size: 14px; font-weight: 600; color: #333;">Modul</label>
                            <textarea id="modul" name="modul" class="form-control" placeholder="Deskripsikan modul yang dibutuhkan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" style="font-size: 14px; font-weight: 600; color: #333;">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Keterangan (optional)">
                        </div>
                    </div>

                    <!-- Aplikasi Section -->
                    <div class="form-group" style="margin-bottom: 30px;">
                        <label style="font-size: 14px; font-weight: 600; color: #333;">Aplikasi</label>
                        <div class="checkbox-group" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                            @foreach(['EMAIL', 'SDMS', 'ITS', 'HRIS', 'PURCHASE', 'ASET', 'ATT', 'INDENT', 'AUDIT', 'E-PART', 'ACCESS DOOR', 'INTERNET'] as $aplikasi)
                                <label><input type="checkbox" name="aplikasi[]" value="{{ $aplikasi }}" style="width: 16px; height: 16px;"> {{ $aplikasi }}</label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="submit-btn" style="padding: 12px 25px; background-color: #6A1E55; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; width: 200px; transition: background-color 0.3s;">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>

    <!-- Instruction Section -->
    <div class="instruction-section">
        <h3 style="font-size: 16px; margin-bottom: 15px;">Cara Pengajuan Perbaikan Perangkat <b>Silahkan Tekan Setiap Nomor Untuk Melihat Instruksi</b>:</h3>

        <!-- Instruction with clickable text -->
        <h3 onclick="toggleImage('image1')">1. Minta form disposisi dengan Purchasing. Isi, tanda tangan <b>Pemohon dan Atasan</b></h3>
        <img id="image1" src="../images/pembuat-user/detail_user.png" alt="Petunjuk Visual" style="display: none;">

        <h3 onclick="toggleImage('image2')">2. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
        <img id="image2" src="../images/pembuat-user/form_user.png" alt="Petunjuk Visual" style="display: none;">

        <h3 onclick="toggleImage('image4')">4. Tanda tangan <b>Pemohon</b></h3>
        <img id="image4" src="../images/pembuat-user/cetak_user.png" alt="Petunjuk Visual" style="display: none;">

        <h3 onclick="toggleImage('image5')">5. Serahkan <b>Form Disposisi dan Tanda Terima ke IT</b></h3>
    </div>
</div>

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
</script>
