@include('layout.navbar')

<section class="container mx-auto p-6 font-sans">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg" style="margin-top: 20px">
        <div class="w-full overflow-x-auto">
            <style>
                .container {
                    height: auto;
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
                    width: 100%;
                    height: 100px;
                }

                td,
                th {
                    border: 2px solid #333;
                    text-align: left;
                    padding: 16px;
                    /* Mengatur padding untuk kontrol tinggi baris */
                    height: 20px;
                    /* Menetapkan tinggi tetap untuk setiap sel */
                }


                th {
                    background-color: #f4f4f4;
                    font-weight: bold;
                }

                tr:first-child td {
                    border-top: 3px solid #333;
                }

                tr:nth-child(even) {
                    background-color: #f5f5f5;
                }

                tr:nth-child(odd) {
                    background-color: #ffffff;
                }


                th {
                    background-color: #007bff;
                    a color: white;
                }

                .judul {
                    text-align: center;
                    margin-bottom: 25px;
                }

                @media (max-width: 768px) {

                    /* Mengatur tabel untuk responsif */
                    table {
                        width: 100%;
                        height: auto;
                        /* Membiarkan tinggi tabel menyesuaikan dengan konten */
                    }

                    td,
                    th {
                        padding: 8px;
                        /* Mengurangi padding untuk tampilan lebih compact */
                        font-size: 15px;
                    }

                    /* Mengurangi margin bawah pada judul */
                    .judul {
                        margin-bottom: 10px;
                        font-size: 20px
                    }

                    .flex {
                        flex-direction: column;
                        /* Mengatur elemen dalam flexbox ke kolom di mode kecil */
                    }

                    .w-full {
                        width: 100%;
                    }

                    /* Mengurangi padding dan margin pada elemen wrapper */
                    .w-full.max-w-8xl {
                        padding: 4px;
                        margin-bottom: 0;
                        /* Menghilangkan margin bawah */
                    }

                    .p-8 {
                        padding: 4px;
                        /* Mengurangi padding pada elemen yang memiliki kelas p-8 */
                    }

                    /* Mengatur container supaya tidak ada margin atau padding yang berlebihan */
                    .container {
                        padding: 0;
                        margin: 0;
                    }

                    /* Pastikan tidak ada margin atau padding pada elemen lain yang menyebabkan ruang kosong */
                    .container.mx-auto {
                        margin-bottom: 0;
                    }

                    /* Mengatur tinggi elemen form agar sesuai dengan konten */
                    .w-full {
                        height: auto;
                    }
                }
            </style>

            <div class="flex justify-center items-start p-8 bg-gray-50 rounded-lg shadow-md">
                <div class="w-full max-w-8xl bg-white p-6 rounded-lg shadow-md">
                    <h2 class="judul font-bold text-2xl mb-6 border-b-2 pb-4 text-gray-800">FORM PERBIKAN PERANGKAT</h2>

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
                                <tr class="text-gray-700" style="margin">
                                    <td class="px-4 py-3 border" style="background-color: white;">Action</td>
                                    <td class="px-4 py-3 text-md font-semibold border" style="background-color: white">
                                        <button type="submit"
                                            class="button1 px-6 py-2 bg-purple-700 text-white rounded-md font-semibold mx-1 mt-4 hover:bg-purple-800">PRINT</button>
                                        <button type="submit"
                                            class="button2 px-6 py-2 bg-green-600 text-white rounded-md font-semibold mx-1 mt-4 hover:bg-green-700">SELESAI</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
