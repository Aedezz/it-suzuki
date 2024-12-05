@extends('../dalam/layout')

@section('style')
    <style>
        #example {
            width: 100%;
            border-collapse: collapse;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        #example th,
        #example td {
            border: 1px solid #ddd;
            /* Light grey border for each cell */
            text-align: center;
            padding: 8px;
            /* Padding for better readability */
        }

        #example th {
            background-color: #f2f2f2;
            /* Light background for header */
            font-weight: bold;
        }

        #example tr:hover {
            background-color: #f5f5f5;
            /* Highlight row on hover */
        }

        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper {
            margin-top: 20px
        }

        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: 2px;
            /*pl-2*/
            padding-bottom: 2px;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #ececec;
            /*border-gray-200*/
            background-color: rgb(255, 255, 255);
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        /*  Make sure the table takes up the full available width */
        #example {
            width: 100% !important;
            table-layout: auto;
            /* Allow column widths to adjust based on content */
        }

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
            /* Mengubah ketebalan garis */
            background-color: #66cbea;
            /* Warna garis */
            transition: width 0.3s ease-in-out;
        }

        a:hover span {
            width: 100%;
            margin-top: 155px
        }
    </style>
@endsection

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

    @section('content')
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
            <!--Card-->
            <div id='recipients' class="p-3 mt-6 lg:mt-0 rou    nded shadow bg-white"
                style="width:165%; margin-left: -260px; margin-top: 22px;">
                <!-- Title and Menu Container -->
                <div class="flex justify-between items-center px-4 py-8">
                    <!-- Title -->
                    <h2 class="font-sans font-bold text-lg md:text-2xl" style="font-size: 20px; margin-top: -20px;">
                        Report Aktifitas
                    </h2>

                </div>
                <hr style="margin-top: -15px">
                <!-- Form Section -->
                <div class="container mt-4">
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

                                    <!-- Input Nama -->
                                    <div class="flex flex-col flex-1">
                                        <select name="nama" id="nama" required
                                            class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                                            <option value="">Semua Nama</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->username }}"
                                                    @if (request()->get('nama') == $item->username) selected @endif>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>

                            </div>
                            <div class="space-x-4 mt-8 flex justify-start" style="margin-left: 25px">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr style="margin-top: 25px;"><br>

                    <table id="example" class="stripe hover" style="display: none;  margin-left: 40px;">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th data-priority="2">Tanggal</th>
                                <th data-priority="3">Grup</th>
                                <th data-priority="4">Modul</th>
                                <th data-priority="5">Keterangan</th>
                                <th data-priority="6">Solusi</th>
                                <th data-priority="7">Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tgl_catatan }}</td>
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
        <!--DataTables JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        @push('script')
            <script>
                // Mendapatkan tanggal pertama bulan ini
                document.addEventListener("DOMContentLoaded", function() {
                    // Buat objek Date untuk mendapatkan bulan dan tahun sekarang
                    var date = new Date();
                    var year = date.getFullYear(); // Tahun sekarang
                    var month = date.getMonth() + 1; // Bulan sekarang (0-indexed, jadi ditambah 1)

                    // Format bulan dan tahun untuk sesuai dengan format input date (yyyy-mm-dd)
                    var firstDayOfMonth = year + '-' + (month < 10 ? '0' + month : month) + '-01';

                    // Menetapkan tanggal pertama bulan ini ke dalam input field
                    document.getElementById('tgl_awal').value = firstDayOfMonth;
                });

                document.addEventListener("DOMContentLoaded", function() {
                    // Mendapatkan tanggal hari ini
                    var today = new Date();
                    var year = today.getFullYear(); // Tahun sekarang
                    var month = today.getMonth() + 1; // Bulan sekarang (0-indexed, jadi ditambah 1)
                    var day = today.getDate(); // Tanggal hari ini

                    // Format tanggal hari ini ke yyyy-mm-dd
                    var formattedToday = year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day :
                        day);

                    // Menetapkan tanggal hari ini ke dalam input field tgl_akhir
                    document.getElementById('tgl_akhir').value = formattedToday;
                });

                document.addEventListener("DOMContentLoaded", function() {
                    // Menyembunyikan tabel saat halaman pertama dimuat
                    var table = document.getElementById('example');
                    table.style.display = 'none'; // Menyembunyikan tabel

                    // Mengecek apakah sudah ada parameter filter nama yang diterapkan
                    if (document.getElementById('nama').value != "") {
                        table.style.display = 'table'; // Menampilkan tabel jika ada filter
                    }

                    // Menampilkan tabel saat form disubmit
                    var form = document.querySelector('form');
                    form.addEventListener('submit', function() {
                        // Pastikan form sudah dipilih sebelum menampilkan tabel
                        if (document.getElementById('tgl_awal').value && document.getElementById('tgl_akhir')
                            .value) {
                            table.style.display = 'table'; // Menampilkan tabel
                        }
                    });
                });

                $(document).ready(function() {
                    $('#example').DataTable({
                        responsive: true, // Make the table responsive
                        stripeClasses: ['odd', 'even'], // Add striping to the table rows
                        hover: true // Add hover effect on rows
                    });
                });
            </script>
        @endpush

    @endpush
</body>
