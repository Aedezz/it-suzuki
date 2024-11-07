{{-- 
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
    <!-- Fixed Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        @include("layout.navbar")
    </nav>
    <!-- Add padding to avoid content being hidden behind the navbar -->
    <div class="pt-16">
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
        <div style="flex: 1; max-width: 300px; background-color: #f8f8f8; padding: 20px; border-radius: 4px; border: 1px solid #ddd; text-align: center;">
            <p class="text-gray-700">Cara Pengajuan Pembuatan User Baru/Reset Password :</p>
            <ol class="list-decimal list-inside ">
                <li>Lengkapi <b>Form</b> dan klik tombol <b>Save</b></li>
                <img src="images/pembuat-user/form_user.png" class="mt-4" height="200px" width="300px" alt="Form Pembuatan User">
                <li>Setelah berhasil, klik tombol <b>Print</b> dan <b>Cetak Dokumen</b></li>
                <img src="images/pembuat-user/cetak_user.png" class="mt-4" height="200px" width="300px" alt="Detail User">
                <li>Tanda tangan <b>Pemohon</b> dan <b>Atasan</b></li>
                <img src="images/pembuat-user/detail_user.png" class="mt-4" height="200px" width="300px" alt="Cetak User">
                <li>Serahkan <b>Form ke IT</b></li>
            </ol>
        </div>
    </div>
</body>
</html> --}}

@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; padding: 20px;">
    <div style="width: 70%; max-width: 1000px; background-color: #f5f5f5; border-radius: 8px; padding: 40px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: left; position: relative;">
        <h2 class="font-sans text-2xl font-bold" style="font-size: 22px; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            Form Pembuatan User Baru/Reset Password
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
                </div>

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
