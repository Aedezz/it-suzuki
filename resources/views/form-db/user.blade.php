@include("layout.navbar")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h3 class="text-2xl font-bold mb-6 text-center">Form Pembuatan User Baru/Reset Password</h3>
    <div class="max-w-lg mx-auto">
        <form method="post" action="page2/user/proses.php?act=create" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700">Nomor Induk Karyawan</label>
                    <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="nik" id="user" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="block text-gray-700">Nama Lengkap</label>
                    <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="nama_lengkap" id="nama_lengkap" readonly>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label class="block text-gray-700">Jabatan</label>
                    <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="jabatan" id="jabatan" readonly>
                </div>
                <div class="form-group">
                    <label class="block text-gray-700">Divisi/Cabang</label>
                    <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="divisi_cabang" id="divisi_cabang" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="block text-gray-700">Keterangan</label>
                <input type="text" class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="keterangan">
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="block text-gray-700">Modul</label>
                <textarea class="form-control block w-full mt-1 p-2 border-2 border-gray-500 rounded-md shadow-sm focus:ring focus:ring-blue-300" name="modul" placeholder="isi menu yang ingin diakses" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-info bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Save Form ?')">Save</button>
        </form>
    </div>
    <div class="max-w-lg mx-auto mt-10">
        <p class="text-gray-700">Cara Pengajuan Pembuatan User Baru/Reset Password :</p>
        <ol class="list-decimal list-inside">
            <li>Lengkapi <b>Form</b> dan klik tombol <b>Save</b></li> 
            <img src="images/form_user.png" class="mt-4" height="200px" width="300px" alt="Form Pembuatan User">
            <li>Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b></li>
            <img src="images/detail_user.png" class="mt-4" height="200px" width="300px" alt="Detail User">
            <li>Tanda tangan <b>Pemohon</b> dan <b>Atasan</b></li>
            <img src="images/cetak_user.png" class="mt-4" height="200px" width="300px" alt="Cetak User">
            <li>Serahkan <b>Form ke IT</b></li>
        </ol>
    </div>
</body>
</html>
