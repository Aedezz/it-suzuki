@extends('layout.barang')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }
    
    /* No scrolling, just ensure it stays within the layout */
    #tableContainer {
        width: 100%;
    }
</style>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container relative w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold absolute top-6 left-7" style="color: rgb(45, 45, 45)">
            Daftar Barang
        </h2>

        <!-- Create Button -->
        {{-- <a href="{{ route('create') }}"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah
        </a> --}}

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="mt-16 w-full">
            <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-center">Nama Barang</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $index => $barang)
                            <tr>
                                <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $barang->nama }}</td>
                                <td class="flex justify-center space-x-2">
                                    <!-- Tombol Edit dengan Ikon -->
                                    <a href="{{ route('barang.edit', $barang->id) }}" 
                                        class="relative w-8 h-8 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600" title="Perbarui">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            responsive: true,
            pageLength: 25, // Show 25 rows by default
            lengthMenu: [10, 25, 50, 100] // Allow user to select rows displayed
        });
    });
</script>