@extends('perbaikan.report.layout.layout')

@section('style')
    <style>
        #example {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
            margin-bottom: 1em;
        }

        #example th,
        #example td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }

        #example th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #example tr:hover {
            background-color: #f5f5f5;
        }

        /* DataTables customizations */
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 5px 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #667eea;
            color: #fff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #667eea;
            color: #fff;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #ddd;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea;
        }
    </style>
@endsection


<link rel="icon" href="../images/perbaikan/logo-tab.png">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

@section('body')
    <!-- Form Section -->
    <div class="container mt-7">
        <form method="GET" action="{{ route('aktifitas.preview') }}">
            <div class="form-row flex flex-wrap -mx-2">
                <div class="mt-8 grid lg:grid-cols-2 gap-6 w-full">
                    <div class="flex items-center space-x-4" style="margin-left: 20px">
                        <!-- Input Tanggal Awal -->
                        <div class="flex flex-col flex-1">
                            <input type="date" name="tgl_awal" id="tgl_awal"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                        </div>

                        <!-- Separator -->
                        <p class="text-gray-700 font-medium flex-shrink-0">-</p>

                        <!-- Input Tanggal Akhir -->
                        <div class="flex flex-col flex-1">
                            <input type="date" name="tgl_akhir" id="tgl_akhir"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                        </div>

                        <!-- Input Nama dan Tombol Preview -->
                        <div class="flex items-center space-x-4 flex-1">
                            <select name="nama" id="nama" required
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-60">
                                <option value="">Semua Nama</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->username }}" @if (request()->get('nama') == $item->username) selected @endif>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Tombol Preview -->
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </form>

        <div class="mt-10 w-full">
            <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Grup</th>
                            <th>Modul</th>
                            <th>Keterangan</th>
                            <th>Solusi</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="px-4 py-2" style="width: 100px; align-items: center">{{ $item->tgl_catatan }}</td>
                            <td>{{ $item->grup_nama }}</td>
                            <td>{{ $item->modul_nama }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->solusi }}</td>
                            <td>{{ $item->nama }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Tidak Ada Data Untuk Ditampilkan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        @endsection


        @push('script')
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
    responsive: true,
    autoWidth: false,
    fixedColumns: true, // Prevent layout shifting
    columnDefs: [
        {
            targets: [6],
            visible: true, // Pastikan kolom terlihat
        },
        {
            targets: "_all",
            className: "dt-center",
        },
    ],
});
            });
        </script>
        @endpush
