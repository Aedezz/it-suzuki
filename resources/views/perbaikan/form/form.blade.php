@extends('perbaikan.layout.layout-table')

@section('style')
<style>
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
    <!--Container-->
    <div class="mt-10 w-full">
        <div id="tableContainer" class="transition-all duration-500 ease-in-out">
            <table id="example" class="display w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th data-priority="1">No Reg</th>
                        <th data-priority="2">Tanggal</th>
                        <th data-priority="3">NIK</th>
                        <th data-priority="4">Nama</th>
                        <th data-priority="5">Divisi</th>
                        <th data-priority="6">Kode Asset</th>
                        <th data-priority="7">Nama Barang</th>
                        <th data-priority="8">Status</th>
                        <th data-priority="9">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form as $data)
                        <tr>
                            <td>{{ $data->nomor }}</td>
                            <td class="px-4 py-2" style="width: 100px; align-items: center" data-order="{{ strtotime($data->tanggal) }}">{{ $data->formatted_tanggal }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->divisi_cabang }}</td>
                            <td>{{ $data->kode_asset }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>
                                @if ($data->cek == 1)
                                    <div class="w-max">
                                        <div
                                            class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-600 py-1 px-2 text-xs rounded-md">
                                            Sudah
                                        </div>
                                    </div>
                                @else
                                    <div class="w-max">
                                        <div
                                            class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-red-500/20 text-red-600 py-1 px-2 text-xs rounded-md">
                                            Belum
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="p-4 border-b border-gray-gray-50">
                                <div class="flex justify-center space-x-2">
                                    @if ($data->cek == 0)
                                        <!-- Tombol Centang (Update Status) -->
                                        <button type="button"
                                            onclick="confirmUpdateStatus('{{ route('form.updateStatus', $data->id) }}')"
                                            class="bg-green-500 text-white p-1 w-8 h-8 rounded-md hover:bg-green-600 transition duration-300"
                                            title="Check">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                        <!-- Tombol Hapus (Delete) -->
                                        <button type="button"
                                            onclick="confirmDelete('{{ route('form.destroy', $data->id) }}')"
                                            class="bg-red-500 text-white p-1 w-8 h-8 rounded-md hover:bg-red-600 transition duration-300"
                                            title="Hapus Data">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                            
                                    <!-- Tombol Print -->
                                    <form action="{{ route('perbaikan.print', $data->id) }}" method="GET" target="_blank">
                                        <button class="bg-gray-500 text-white p-1 w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300"
                                            title="Print">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </form>
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
    <script>
      $(document).ready(function() {
    $('#example').DataTable({
        "order": [[1, "desc"]], // Sesuaikan dengan indeks kolom tanggal
        "columnDefs": [{ 
            "targets": 8, 
            "visible": true
        }]
    });
});

    </script>
@endpush
