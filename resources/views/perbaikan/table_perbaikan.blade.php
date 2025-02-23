@include('layout.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbaikan Perangkat View</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Main Content Section -->
    <div class="flex justify-center mt-9">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg border border-gray-300 mb-10">
            <h1 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Data Perbaikan Perangkat</h1>
            <hr class=" border-gray-300" style="margin-bottom: 25px; margin-top: -20px">
            <!-- Table with borders -->
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">No.Reg</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->nomor }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Tanggal</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->tanggal }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Nomor Induk Karyawan</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->nik }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Nama Lengkap</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->nama_lengkap }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Jabatan</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->jabatan }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Divisi / Cabang</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->divisi_cabang }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Kode Asset</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->kode_asset }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Nama Barang</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->nama_barang }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Jumlah</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->jumlah }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Spesifikasi</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->spesifikasi }}</td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Keluhan</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">{{ $data->keluhan }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Actions :</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">
                            <div class="flex justify-start gap-4">
                                <form action="{{ route('perbaikan.print', $data->id) }}" method="GET" target="_blank">
                                    <button type="submit" class="text-white py-1 px-3 rounded-md hover:bg-gray-600 transition duration-300 border border-gray-600 text-sm" style="background-color: #6A1E55">
                                        Print
                                    </button>
                                </form>
                                <form action="{{ route('dashboard') }}" method="get">
                                    <button type="submit" class="text-white py-1 px-3 rounded-md hover:bg-blue-600 transition duration-300 border border-blue-600 text-sm" style="background-color: #45a049">
                                        Finish
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- End of table wrapper -->
    </div>
</body>
