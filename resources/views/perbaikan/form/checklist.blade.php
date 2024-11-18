@extends('../dalam/layout')

@section('style')
    <style>
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
<link rel="icon" href="../images/perbaikan/logo-tab.png">

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

    @section('content')
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
            <!--Card-->
            <div id='recipients' class="p-3 mt-6 lg:mt-0 rounded shadow bg-white"
                style="width:165%; margin-left: -260px; margin-top: 22px;">
                <!-- Title and Menu Container -->
                <div class="flex justify-between items-center px-4 py-8">
                    <!-- Title -->
                    <h2 class="font-sans font-bold text-lg md:text-2xl" style="font-size: 20px; margin-top: -20px;">
                        FORM PERBAIKAN PERANGKAT
                    </h2>

                    <!-- Menu -->
                    <div class="flex space-x-6">
                        <a href="{{ route('form.index') }}"
                            class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Data</a>
                        <a href="{{ route('perbaikan.laporan') }}"
                            class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Laporan</a>
                        <a href="{{ route('checklist.index') }}"
                            class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Checklist</a>
                    </div>
                </div>



                <hr style="margin-top: -25px"><br>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr><th>Check</th>
                            <th data-priority="1">No Reg</th>
                            <th data-priority="2">Tanggal</th>
                            <th data-priority="3">NIK</th>
                            <th data-priority="4">Nama</th>
                            <th data-priority="5">Divisi</th>
                            <th data-priority="6">Kode Asset</th>
                            <th data-priority="7">Nama Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $data)
                 
                            <tr>
                                <td><input type="checkbox" class="data-checkbox" value="{{ $data->id }}"></td>  <!-- Checkbox untuk setiap baris -->
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->divisi_cabang }}</td>
                                <td>{{ $data->kode_asset }}</td>
                                <td>{{ $data->nama_barang }}</td>
                            </tr>
                  
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endsection

    @push('script')
        <!--DataTables JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "responsive": true
                });
            });

            // Menangkap elemen menu dan garis aktif
            const menuItems = document.querySelectorAll('.menu-item');
            const activeLine = document.getElementById('active-line');

            // Fungsi untuk memindahkan garis aktif
            function setActiveLine(target) {
                const rect = target.getBoundingClientRect();
                const containerRect = target.parentNode.getBoundingClientRect();
                activeLine.style.width = `${rect.width}px`;
                activeLine.style.left = `${rect.left - containerRect.left}px`;
            }

            // Menambahkan event listener ke setiap menu item
            menuItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    setActiveLine(item);

                    // Mengubah warna menu yang aktif
                    menuItems.forEach(menu => menu.classList.remove('text-blue-500'));
                    item.classList.add('text-blue-500');
                });
            });

            // Inisialisasi garis aktif pada menu pertama
            if (menuItems.length > 0) {
                setActiveLine(menuItems[0]);
                menuItems[0].classList.add('text-blue-500');
            }
        </script>
    @endpush
</body>
