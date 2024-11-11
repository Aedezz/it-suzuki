@include('layout.navbar')

<div class="container">
    <div class="form-container">
        <!-- Form Input Data -->
        @if(session('data') == null) <!-- Tampilkan form jika data belum ada -->
        <h2 class="form-title">Form Pembuatan User Baru/Reset Password</h2>

        <form method="POST" action="{{ route('pembuatan.store') }}">
            @csrf
            <div class="form-grid">
                <!-- Input Field 1 -->
                <div class="form-group">
                    <label for="nik"><i class="fas fa-id-card"></i> Nomor Induk Karyawan</label>
                    <input type="text" id="nik" name="nik" class="form-control" required>
                </div>

                <!-- Input Field 2 -->
                <div class="form-group">
                    <label for="nama_lengkap"><i class="fas fa-user"></i> Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                </div>

                <!-- Input Field 3 -->
                <div class="form-group">
                    <label for="jabatan"><i class="fas fa-briefcase"></i> Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" class="form-control" required>
                </div>

                <!-- Input Field 4 -->
                <div class="form-group">
                    <label for="divisi_cabang"><i class="fas fa-building"></i> Divisi/Cabang</label>
                    <input type="text" id="divisi_cabang" name="divisi_cabang" class="form-control" required>
                </div>

                <!-- Input Field 5 -->
                <div class="form-group">
                    <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control">
                </div>

                <!-- Aplikasi Checkboxes -->
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

                <!-- Modul Input -->
                <div class="form-group">
                    <label for="modul"><i class="fas fa-cogs"></i> Modul</label>
                    <textarea id="modul" name="modul" class="form-control"></textarea>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="submit-btn">Save</button>
            </div>
        </form>
        @else <!-- Tampilkan data yang sudah disimpan jika ada -->
        <h2 class="form-title">Data yang Baru Disimpan</h2>

        <!-- Tabel Menampilkan Data -->
        <div class="table-container">
            <table class="table">
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
            <a heff="#" class="print-btn">Print</button>
            <a href="{{ route('dashboard') }}" class="finish-btn">Finish</a>
        </div>

        @endif
    </div>
</div>

<style>
/* Form Container */
.container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    height: 100vh;
    padding: 20px;
}

.form-container {
    width: 100%;
    max-width: 1000px;
    background-color: #f5f5f5;
    border-radius: 8px;
    padding: 40px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: left;
    position: relative;
}

/* Form Title */
.form-title {
    font-size: 22px;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

/* Form Section */
.form-section {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Mengatur dua kolom */
    gap: 20px;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 5px;
}

/* Form Control */
.form-control {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 14px;
    box-sizing: border-box;
}


/* Checkbox Group */
.checkbox-group label {
    display: inline-flex;
    align-items: center;
    margin-right: 15px;
}
/* Submit Button */
.submit-btn {
    background-color: #6A1E55;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    width: auto;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #8c3360;
}

/* Button Container */
.button-container {
    display: flex;
    justify-content: flex-start;
    margin-top: 20px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    justify-content: flex-start;
    margin-top: 20px;
}

.print-btn, .finish-btn {
    background-color: #6A1E55;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 10px;
    transition: background-color 0.3s;
}

.print-btn:hover, .finish-btn:hover {
    background-color: #8c3360;
}

/* Table Styles */
.table-container {
    margin-top: 30px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.table td {
    background-color: #fff;
}

.table tr:hover {
    background-color: #f5f5f5;
}

/* Sidebar */
.sidebar {
    flex: 1;
    max-width: 300px;
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 4px;
    border: 1px solid #ddd;
    text-align: center;
}

.sidebar h3 {
    font-size: 16px;
    margin-bottom: 15px;
}

.sidebar img {
    width: 100%;
    height: auto;
    border-radius: 4px;
    margin-bottom: 10px;
}

.sidebar p {
    font-size: 14px;
    color: #555;
    margin-top: 10px;
}

</style>
