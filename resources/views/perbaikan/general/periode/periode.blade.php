@extends('perbaikan.general.periode.layout')

@section('style')

    <style>
        a.edit-btn:hover {
        background-color: #0f6f91 !important;
        /* Warna hover */
    }
        /*Overrides for Tailwind CSS */

        /* Form fields */
        .dataTables_wrapper {
            margin-top: 20px;
        }

        .rectangle-container {
            width: 100%;
            padding: 16px;
        }

        /* No scrolling, just ensure it stays within the layout */
        #tableContainer {
            width: 100%;
            overflow: hidden;
            /* Prevent horizontal scrolling */
        }

        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 2px;
            padding-bottom: 2px;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #ececec;
            background-color: rgb(255, 255, 255);
        }

        /* Row Hover */
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /* Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /* Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /* Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /* Change colour of responsive icon */
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
        }

        /* Make sure the table takes up the full available width */
        #example {
            width: 100% !important;
            table-layout: auto;
        }

        /* Style for Action Column */
        #example td:nth-child(9) {
            padding: 8px;
            text-align: center;
            max-width: 220px;
            /* Slightly wider for better button spacing */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Action buttons size */
        .w-10 {
            width: 32px;
            /* Reduced size */
            height: 32px;
            /* Reduced size */
        }

        .h-10 {
            height: 32px;
            /* Reduced size */
        }

        /* Tombol aksi */
        .flex.justify-center.space-x-2 button {
            width: 40px;
            /* Atur lebar tombol */
            height: 40px;
            /* Atur tinggi tombol */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            /* Ukuran ikon */
            padding: 0;
            /* Hapus padding bawaan */
            border-radius: 0.25rem;
            /* Sesuaikan dengan gaya lainnya */
            transition: background-color 0.3s ease;
        }

        /* Tambahkan aturan untuk tombol di dalam form */
        form button {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            padding: 0;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        /* Button Hover Effects */
        .hover\:bg-green-600:hover {
            background-color: #2d9c56;
        }

        .hover\:bg-red-600:hover {
            background-color: #d84f4f;
        }

        .hover\:bg-gray-600:hover {
            background-color: #2d6ca8;
        }

        /* Styling the menu item for hover effect */
        .menu-item {
            position: relative;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a span {
            display: block;
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 1px;
            background-color: #66cbea;
            transition: width 0.3s ease-in-out;
        }

        a:hover span {
            width: 100%;
            margin-top: 155px;
        }
    </style>
@endsection

<link rel="icon" href="../images/perbaikan/logo-tab.png">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    @if (session('status'))
        Swal.fire({
            title: '{{ session('status')['judul'] }}',
            text: '{{ session('status')['pesan'] }}',
            icon: '{{ session('status')['icon'] }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>

<!-- Form Content (Inside the form layout) -->
@section('body')
<a href="{{ route('periode.create') }}" class="inline-block">
    <button type="button" 
            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition duration-300 shadow-md"
            title="Tambah Data" style="margin-left: 1125px;">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah</span>
    </button>
</a>
<hr style="margin-top: 20px">
    <!--Container-->23
    <div class="mt-10 w-full">
        <div id="tableContainer" class="transition-all duration-500 ease-in-out">
            <table id="example" class="display w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th data-priority="1" class="text-center">No</th>
                        <th style="display: none;" data-priority="6">ID Periode</th> <!-- Kolom disembunyikan -->
                        <th data-priority="2" class="text-center">Nama Periode</th>
                        <th data-priority="3" class="text-center">Tanggal Awal</th>
                        <th data-priority="4" class="text-center">Tanggal Akhir</th>
                        <th data-priority="5" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td style="display: none;">{{ $data->id_periode }}</td>
                            <td class="text-center">{{ $data->nama_periode }}</td>
                            <td class="text-center">{{ $data->tgl_awal }}</td>
                            <td class="text-center">{{ $data->tgl_akhir }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Button Edit -->
                                    <a href="{{ route('periode.edit', $data->id_periode) }}"
                                        class="text-white p-1 w-8 rounded-md transition duration-300 edit-btn"
                                        title="Perbarui" style="background-color: #17a2b8; display: inline-flex; justify-content: center; align-items: center;">
                                        <i class="bi bi-pencil"></i>
                                    </a>                                    

                                    <!-- Tombol Hapus (Delete) -->
                                    <button type="button"
                                        onclick="confirmDelete('{{ route('periode.destroy', $data->id_periode) }}')"
                                        class="bg-red-500 text-white p-1 w-8 h-8 rounded-md hover:bg-red-600 transition duration-300"
                                        title="Hapus Data">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>5
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [0, 'asc']
                ], // Urutan berdasarkan nomor
                "columnDefs": [{
                    "targets": [1], // Kolom ID Periode (kolom kedua)
                    "visible": false, // Sembunyikan kolom
                    "searchable": false // Nonaktifkan pencarian di kolom ini
                }]
            });
        });
    </script>
@endpush
