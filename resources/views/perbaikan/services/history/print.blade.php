<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Details for {{ $history->pegawai_nik }} - {{ $history->pegawai_nama }}</title>
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
            margin-bottom: 21px;
        }

        .info-text p {
            font-size: 0.86em; /* Make the text smaller */
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

        .history {
            flex-grow: 1;
            padding-left: 10px; /* Adds space between " : " symbol and history */
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
            margin-top: 75px;
        }

        .date-line {
            margin-top: 5px;
            text-align: left;
            display: block;
        }

        .table-container {
            margin: 20px 0;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
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
                <h1>SURAT REKOMENDASI</h1>
            </div>
            
            <!-- Information Section with Individual Margin -->
            <div class="info-text">
                <p>No : {{ $history->nomor }}</p>
                <p>Revisi : 1</p>
                <p>Tgl Eff : {{ date('d F Y', strtotime($history->tanggal)) }}</p>
                <p>Halaman : 1 dari 1</p>
            </div>
        </div>
    </div>

    <div class="description-container">
    <!-- Register number (outside and centered below the form layout) -->
    <p style="text-align: center; margin-bottom: 1mm; font-size: 13px; margin-right:0.1em; margin-top: 1px;">
        No. Register: {{ $history->nomor }} - {{ date('d F Y', strtotime($history->tanggal)) }}
    </p>
     
    <ul class="isi-desc pl-2">
        <p><span class="label">DIVISI</span>: <span class="history">{{ $history->divisi }}</span></p>
        <p><span class="label">PENGGUNA</span>: <span class="history">{{ $history->pegawai_nama }}</span></p>
        <p><span class="label">CABANG</span>: <span class="history">{{ $history->cabang }}</span></p>
    </ul>

    <!-- Table Section -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PERANGKAT</th>
                    <th>KETERANGAN</th>
                    <th>TIPE/JENIS/MERK</th>
                    <th>REKOMENDASI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $history->barang }}</td>
                    <td>{{ $history->keterangan }}</td>
                    <td>{{ $history->sn}}</td>
                    <td>{{ $history->rekomendasi}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Link diawah table --}}
    <p style="margin-right:40px; margin-left:40px; margin-top:10px; font-size:1.08em">
        Link History Perbaikan : http://117.102.165.39/it/history.php?nik=15.03.1057
    </p>

    <!-- Signature Section (Merged Inside Description Container) -->
    <div class="signature-section">
        <div class="signature-column">
            <p>Diperiksa Oleh (STAFF IT)</p>
            <p class="signature-line">________________________________</p>
            <p class="date-line">TGL: {{ date('d F Y', strtotime($history->tanggal)) }}</p>
        </div>
        <div class="signature-column">
            <p>Disetujui Oleh (ASS/MANAGER IT)</p>
            <p class="signature-line">________________________________</p>
            <p class="date-line">TGL: {{ date('d F Y', strtotime($history->tanggal)) }}</p>
        </div>
    </div>
</body>
</html>