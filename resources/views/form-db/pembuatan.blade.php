@include('layout.navbar')

<div class="container">
    <!-- Left Section - Form -->
    <div class="form-container">
        @if(session('data') == null)
        <h2 class="form-title">Form Pembuatan User Baru/Reset Password</h2>

        <form method="POST" action="{{ route('pembuatan.store') }}">
            @csrf
            <div class="form-card">
                <!-- Form Input Fields -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nik"><i class="fas fa-id-card"></i> Nomor Induk Karyawan</label>
                        <input type="text" id="nik" name="nik" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap"><i class="fas fa-user"></i> Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan"><i class="fas fa-briefcase"></i> Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="divisi_cabang"><i class="fas fa-building"></i> Divisi/Cabang</label>
                        <input type="text" id="divisi_cabang" name="divisi_cabang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-cogs"></i> Aplikasi</label><br>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="aplikasi[]" value="EMAIL"> EMAIL</label>
                            <label><input type="checkbox" name="aplikasi[]" value="SDMS"> SDMS</label>
                            <label><input type="checkbox" name="aplikasi[]" value="ITS"> ITS</label>
                            <label><input type="checkbox" name="aplikasi[]" value="HRIS"> HRIS</label>
                            <label><input type="checkbox" name="aplikasi[]" value="PURCHASE"> PURCHASE</label>
                            <label><input type="checkbox" name="aplikasi[]" value="ASET"> ASET</label>
                            <label><input type="checkbox" name="aplikasi[]" value="ATT"> ATT</label>
                            <label><input type="checkbox" name="aplikasi[]" value="INDENT"> INDENT</label>
                            <label><input type="checkbox" name="aplikasi[]" value="AUDIT"> AUDIT</label>
                            <label><input type="checkbox" name="aplikasi[]" value="E-PART"> E-PART</label>
                            <label><input type="checkbox" name="aplikasi[]" value="ACCESS DOOR"> ACCESS DOOR</label>
                            <label><input type="checkbox" name="aplikasi[]" value="INTERNET"> INTERNET</label>
                        </div>
                        <input type="text" class="form-control" name="aplikasi_lainnya" placeholder="Lainnya">
                    </div>

                    <div class="form-group">
                        <label for="modul"><i class="fas fa-cogs"></i> Modul</label>
                        <textarea id="modul" name="modul" class="form-control"></textarea>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="submit-btn">Save</button>
                </div>
            </div>
        </form>
        @else
        <h2 class="form-title">Data yang Baru Disimpan</h2>

        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nomor</td>
                        <td>{{ session('data')->nomor }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>{{ session('data')->tanggal }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>{{ session('data')->nik }}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>{{ session('data')->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>{{ session('data')->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Divisi/Cabang</td>
                        <td>{{ session('data')->divisi_cabang }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ session('data')->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Aplikasi</td>
                        <td>{{ session('data')->aplikasi }}</td>
                    </tr>
                    <tr>
                        <td>Modul</td>
                        <td>{{ session('data')->modul }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="action-buttons">
            <a href="#" class="print-btn">Print</a>
            <a href="{{ route('dashboard') }}" class="finish-btn">Finish</a>
        </div>
        @endif
    </div>

    <!-- Right Section for Sidebar - Only visible in Form Section -->
    @if(session('data') == null)
    <div class="sidebar">
        <h3>Cara Pengajuan Install Komputer/Laptop :</h3>
        
        <h3>1. Lengkapi <b>Form</b> dan klik tombol <b>Save</b></h3>
        <img src="images/pembuat-user/form_user.png" alt="Petunjuk Visual">

        <h3>2. Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b></h3>
        <img src="images/pembuat-user/cetak_user.png" alt="Petunjuk Visual">

        <h3>3. Tanda tangan <b>Pemohon</b> dan <b>Atasan</b></h3>
        <img src="images/pembuat-user/detail_user.png" alt="Petunjuk Visual">

        <h3>4. Serahkan Form ke IT</h3>
        <br>

        <p style="font-size: 14px; color: #555; margin-top: 10px;">
            Gambar ini menunjukkan langkah-langkah yang perlu diikuti untuk mengajukan instalasi komputer atau laptop.
        </p>
    </div>
    @endif
</div>

<style>
/* General Container */
.container {
    display: flex;
    justify-content: center;
    gap: 30px;
    padding: 20px;
    flex-wrap: wrap;
}

/* Form Section */
.form-container {
    flex: 1;
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 700px;
}

.form-title {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-family: 'Arial', sans-serif;
}

/* Form Card */
.form-card {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Form Grid */
.form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ddd;
    background-color: #f8f8f8;
    font-size: 14px;
    margin-top: 8px;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

/* Checkbox */
.checkbox-group label {
    display: inline-flex;
    align-items: center;
    margin-right: 15px;
}

.checkbox-group input {
    margin-right: 5px;
}

/* Submit Button */
.submit-btn {
    background-color: #28a745;
    color: white;
    padding: 12px 20px;
    border-radius: 6px;
    border: none;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    text-align: center;
}

.submit-btn:hover {
    background-color: #218838;
}

/* Sidebar Section */
.sidebar {
    display: none;
}

@media (min-width: 768px) {
    .sidebar {
        display: block;
        flex: 0.3;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .sidebar img {
        width: 100%;
        height: auto;
        border-radius: 6px;
        margin-top: 20px;
    }

    .sidebar h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }
}

/* Table Styles */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.styled-table th, .styled-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.styled-table th {
    background-color: #6A1E55;
    color: white;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Action Buttons */
.print-btn, .finish-btn {
    padding: 12px 20px;
    background-color: #28a745;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 16px;
}

.print-btn:hover, .finish-btn:hover {
    background-color: #218838;
}
</style>
