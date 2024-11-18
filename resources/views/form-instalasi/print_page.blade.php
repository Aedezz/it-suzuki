<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Details for {{ $data->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 1em; /* Reduce font size slightly */
            padding: 20px;
        }
        /* Header Section */
        .header-container { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            gap: 16px;
            height: 100px;
        }
        .logo {
            display: inline-block;
            padding: 10px;
            margin-top: 45px;
            margin-bottom: 50px;
            margin-right: 20px;
            margin-left: 8px;
        }
        .logo img { 
            max-height: 35px;
            width: auto;
        }
        .title {
        display: inline-block;
        padding: 46px; /* Reduced padding to better fit */
        text-align: center;
        margin-bottom: 13px; /* Reduced margin to keep it within layout */
        border: 1px solid #000;
        box-sizing: border-box; /* Includes padding in element's size */
        max-width: 100%; /* Ensures it doesn't exceed layout width */
        }
        .title h1 {
        font-size: 1em;
        font-weight: bold;
        margin: 0;
        }
        .info-text {
            display: inline-block;
            padding: 10px;
            text-align: left;
            margin-bottom: 12px;
        }

        .info-text p {
            font-size: 0.90em; /* Make the text smaller */
            margin: 2px 0; /* Reduced space between paragraphs */
        }
        .form-container {
            border: 5% solid #000;
            padding: 5px; /* Reduced padding for compactness */
        }
        .register-number {
            text-align: center;
            font-size: 0.75em;
            margin-top: 5px;
        }

        /* Main Section */
        .description-container {
            border: 5% solid #000;
            padding: 10px; /* Less padding for a more compact feel */
            font-size: 0.79em;
        }

        .isi-desc p {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px; /* Add a bit of space between lines */
        }

        .label {
        display: inline-block;
        width: 120px; /* Set to a width that fits your labels */
        }

        .data {
            flex-grow: 1;
            padding-left: 10px; /* Adds space between " : " symbol and data */
        }

        /* Signature Section */
        .signature-section {
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        .signature-column {
            display: inline-block;
            width: 22%; /* Reduce the width of each signature column */
            text-align: center;
            font-size: 0.75em; /* Smaller font */
            margin-right: 15px; /* Reduced space between columns */
            vertical-align: bottom;
        }

        .signature-column:last-child {
            margin-right: 0;
        }

        .signature-line {
            margin-top: 10px;
        }

        .signature-line-2 {
            margin-top: 75px;
        }

        .date-line {
            margin-top: 5px;
            text-align: left;
            display: block;
        }

        .materai-box {
        border: 1px solid #000; /* Border around the box */
        width: 80px; /* Width of the box */
        height: 55px; /* Height of the box */
        /* display: flex;
        align-items: center;
        justify-content: center; */
        font-size: 1.2em; /* Font size to fit inside the box */
        }
    </style>
</head>
<body class="p-8">
    <!-- Entire form with border -->
    <div class="form-container">
        <!-- Header Section with Borders, Side by Side -->
        <div class="header-container">
            <!-- Logo Section with Individual Margin -->
            <div class="logo">
                <img src="images/login/mitra.png" alt="Logo">
            </div>
            
            <!-- Title Section with Individual Margin -->
            <div class="title">
                <h1>SURAT PERNYATAAN</h1>
            </div>
            
            <!-- Information Section with Individual Margin -->
            <div class="info-text">
                <p>No : {{ $data->nomor }}</p>
                <p>SURAT PERNYATAAN</p>
                <p>Revisi : 1</p>
                <p>Tgl Eff : {{ $data->tanggal }}</p>
                <p>Halaman : 1 dari 1</p>
            </div>
        </div>
    </div>

    <div class="description-container">
    <!-- Register number (outside and centered below the form layout) -->
    <p style="text-align: center; margin-bottom: 1mm; font-size: 13px; margin-right:0.1em; margin-top: 1px;">
        No. Register: {{ $data->nomor }} - {{ date('d F Y', strtotime($data->tanggal)) }}
    </p>
     
    <ul class="isi-desc pl-2">
        <p><span class="label">NIK</span>: <span class="data">{{ $data->nik }}</span></p>
        <p><span class="label">Nama Lengkap</span>: <span class="data">{{ $data->nama_lengkap }}</span></p>
        <p><span class="label">Jabatan</span>: <span class="data">{{ $data->jabatan }}</span></p>
        <p><span class="label">Divisi/Cabang</span>: <span class="data">{{ $data->divisi_cabang }}</span></p>
        <p><span class="label">Kode Asset</span>: <span class="data">{{ $data->kode_asset }}</span></p>
    </ul>    
    <!-- Description Section with border -->
    <p style="margin-right:40px; margin-left:40px; margin-top:20px">Telah mengerti dan memahami bahwa aplikasi yang terinstall pada komputer yang saya gunakan sudah sesuai dengan standar aplikasi yang diperbolehkan oleh perusahaan, yang antara lain meliputi:</p>
    <ul class="isi-desc pl-2">
        <p><span class="label">Operating System</span> : <span class="data">Linux Mint/Deepin</span></p>
        <p><span class="label">Office Suite</span> : <span class="data">WPS</span></p>
        <p><span class="label">Compressor</span> : <span class="data">Compress</span></p>
        <p><span class="label">PDF Reader</span> : <span class="data">WPS PDF</span></p>
        <p><span class="label">Email Client</span> : <span class="data">Thunderbird</span></p>
        <p><span class="label">Browser</span> : <span class="data">Google Chrome</span></p>
        <p><span class="label">Remote Client</span> : <span class="data">Teamviewer</span></p>
        <p><span class="label">RDP</span> : <span class="data">Remmina</span></p>
        <p><span class="label">Aplikasi Internal</span> : <span class="data">SDMS, EOFFICE</span></p>
        <p><span class="label">Lain-lain (Freeware)</span> : <span class="data">.........................................................</span></p>
        <p><span class="label">Lain-lain (Berlisensi)</span> : <span class="data">.........................................................</span></p>
    </ul>    
    <p style="margin-right:40px; margin-left:40px; margin-top:10px; font-size:1.08em">
        Dan menyadari jika, baik secara disengaja atau tidak disengaja melakukan penambahan (menginstall) aplikasi yang bukan
        rekomendasi perusahaan seperti yang disebutkan diatas, atau yang bersifat illegal, maka saya dapat dikenakan UU RI No. 19
        tahun 2002 tentang Hak atas Kekayaan Intelektual dengan hukuman 5 (lima) tahun penjara dan/atau denda Rp. 500.000.000
        (lima ratus juta rupiah), yang semuanya akan menjadi tanggung jawab saya selaku pengguna komputer.
        Jika masih ada aplikasi yang bukan rekomendasi dari perusahaan atau bersifat illegal, sebagaimana yang telah dilaksanakan
        pada hari ini, akan segera di-uninstall/dihapus. Saya akan menjaga & merawat perangkat komputer, apabila terjadi kelalaian
        yang mengakibatkan kerusakan maka menjadi tanggung jawab saya.
    </p>

    <!-- Signature Section (Merged Inside Description Container) -->
    <div class="signature-section">
        <div class="signature-column">
            <p>PENGGUNA KOMPUTER (USER)</p>
            <div class="materai-box">Materai 6000</div> <!-- Box for Materai 6000 -->
            <p class="signature-line">________________________________</p>
            <p class="date-line">TGL:</p>
        </div>        
        <div class="signature-column">
            <p>ATASAN</p>
            <p class="signature-line-2">________________________________</p>
            <p class="date-line">TGL:</p>
        </div>
        <div class="signature-column">
            <p>DIPERIKSA OLEH (IT)</p>
            <p class="signature-line-2">________________________________</p>
            <p class="date-line">TGL:</p>
        </div>
        <div class="signature-column">
            <p>SUPERVISOR IT</p>
            <p class="signature-line-2">________________________________</p>
            <p class="date-line">TGL:</p>
        </div>
    </div>
    </div>
</body>
</html>
