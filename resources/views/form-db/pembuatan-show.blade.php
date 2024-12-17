@extends('layout.db-user')

@section('content')
    <!-- Data Tabel Section -->
    @if($data)
    <div class="bg-gray-100 p-6 rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Data Hasil Input</h2>

        <!-- Table with borders -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-0 flex justify-center">
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Nomor:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->nomor }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Tanggal:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->tanggal }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">NIK:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Nama:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Jabatan:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->jabatan }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Divisi/Cabang:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->divisi_cabang }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Modul:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->modul }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Keterangan:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->keterangan }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-gray-700">Aplikasi:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">{{ $data->aplikasi }}</td>
                    </tr>

                    <!-- Action Title Row -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-medium text-gray-700">Actions:</td>
                        <td class="border border-gray-300 px-4 py-2 text-gray-600">
                            <div class="flex justify-start gap-4">
                                <!-- Tombol Print -->
                                    <button type="button" 
    class="text-white py-1 px-3 rounded-md hover:bg-gray-600 transition duration-300 border border-gray-600 text-sm" 
    style="background-color: #6A1E55" 
    onclick="window.print();">
    Print
</button>

                                

                                <!-- Tombol Kembali ke Dashboard -->
                                <form action="{{ route('dashboard') }}" method="GET">
                                    <button type="submit" class="text-white py-1 px-3 rounded-md hover:bg-blue-600 transition duration-300 border border-blue-600 text-sm" style="background-color: #45a049">
                                        Kembali ke Dashboard
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
