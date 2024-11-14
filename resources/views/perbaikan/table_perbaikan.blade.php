@include('layout.navbar')

<section class="container mx-auto p-6 font-sans">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg" style="margin-top: -5px">
        <div class="w-full overflow-x-auto">
            <style>
                .container {
                    padding: 0;
                    margin: 0;
                }

                .button1:hover {
                    background-color: rgb(139, 0, 139);
                    transition: background-color 0.5s;
                }

                .button2:hover {
                    background-color: rgb(0, 153, 28);
                    transition: background-color 0.5s;
                }

                .table {
                    border-collapse: collapse;
                    width: 100%; /* Lebar tabel mengikuti lebar kontainer */
                    table-layout: fixed; /* Menghindari tabel dari overflow */
                }

                td,
                th {
                    border: 2px solid #333;
                    text-align: left;
                    padding: 16px;
                    height: auto;
                }

                th {
                    background-color: #007bff;
                    color: white;
                    font-weight: bold;
                }

                tr:nth-child(even) {
                    background-color: #f5f5f5;
                }

                tr:nth-child(odd) {
                    background-color: #ffffff;
                }

                tr:first-child td {
                    border-top: 3px solid #333;
                }

                .judul {
                    text-align: center;
                    margin-bottom: 25px;
                }

                .button-container {
                    text-align: center;
                    padding-top: 20px;
                }

                /* Menambahkan styling agar tabel berada di tengah */
                .table-wrapper {
                    width: 100%; /* Memastikan wrapper tabel memenuhi lebar layar */
                    overflow-x: auto;
                    margin-left: 0;
                    margin-right: 0;
                }

                /* Responsif: pastikan tabel lebar penuh pada perangkat kecil */
                @media (max-width: 768px) {
                    .table-wrapper {
                        padding-left: 0;
                        padding-right: 0;
                        margin-left: 0;
                        margin-right: 0;
                    }

                    .table {
                        width: 100%;
                        table-layout: fixed; /* Memastikan kolom-kolom tidak terlalu lebar */
                    }

                    td,
                    th {
                        padding: 10px; /* Mengurangi padding untuk tampilan lebih compact */
                        font-size: 14px; /* Ukuran font lebih kecil pada perangkat kecil */
                    }

                    .judul {
                        margin-bottom: 10px;
                        font-size: 20px;
                    }

                    /* Mengatur ukuran tombol agar lebih kompak */
                    .button1,
                    .button2 {
                        width: 100%;
                        font-size: 14px;
                        padding: 12px;
                        margin-top: 10px;
                    }
                }

                /* Menambahkan aturan untuk desktop agar tabel tidak terlalu lebar */
                @media (min-width: 769px) {
                    .table-wrapper {
                        width: 80%; /* Membatasi lebar tabel pada desktop */
                        margin-left: auto;
                        margin-right: auto; /* Menjaga agar tabel tetap di tengah */
                    }

                    .table {
                        width: 100%; /* Tetap menjaga lebar tabel 100% di dalam wrapper */
                        table-layout: fixed; /* Menghindari overflow */
                    }

                    td,
                    th {
                        padding: 16px; /* Padding tetap lebih besar pada desktop */
                        font-size: 16px; /* Ukuran font normal untuk desktop */
                    }
                }
            </style>
                <div class="w-full max-w-8xl bg-white p-6 rounded-lg shadow-md" style="width: 100%">
                    <h2 class="judul font-bold text-2xl mb-6 border-b-2 pb-4 text-gray-800">FORM PERBAIKAN PERANGKAT</h2>

                    <!-- Wrapper untuk menempatkan tabel di tengah -->
                    <div class="table-wrapper">
                        <table class="table w-full table-auto text-left">
                            <tbody class="bg-white">
                                @csrf
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">No.Reg</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->nomor }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Tanggal</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->tanggal }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Nomor Induk Karyawan</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->nik }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Nama Lengkap</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->nama_lengkap }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Jabatan</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->jabatan }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Divisi / Cabang</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->divisi_cabang }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Kode Asset</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->kode_asset }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Nama Barang</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->nama_barang }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Jumlah</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->jumlah }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Spesifikasi</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->spesifikasi }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">Keluhan</td>
                                    <td class="px-4 py-3 text-md border">{{ $data->keluhan }}</td>
                                </tr>
                                <form action="{{ route('dashboard') }}" method="GET">
                                    <tr class="text-gray-700" style="background-color: white;">
                                        <td class="px-4 py-3 border">Action</td>
                                        <td class="px-4 py-3 text-md font-semibold border" sty>
                                            <div class="button-container" style="margin-top: -30px;">
                                                <button type="submit"
                                                    class="button1 px-6 py-2 bg-purple-700 text-white rounded-md font-semibold mx-1 mt-4 hover:bg-purple-800"    onclick="window.print();">PRINT</button>
                                                <button type="submit"
                                                    class="button2 px-6 py-2 bg-green-600 text-white rounded-md font-semibold mx-1 mt-4 hover:bg-green-700">SELESAI</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                    <!-- End of table wrapper -->
                </div>
         
        </div>
    </div>
</section>


