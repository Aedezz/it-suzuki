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

<body class="bg-gray-50 text-gray-900 tracking-wider leading-normal">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('status'))
            <
            script >
                Swal.fire({
                    title: '{{ session('status')['judul'] }}',
                    text: '{{ session('status')['pesan'] }}',
                    icon: '{{ session('status')['icon'] }}',
                    confirmButtonText: 'OK'
                }); <
            />
        @endif
    </script>

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
                        PREVIEW REPORT CEKLIS
                    </h2>

                    <a id="create-button" href="{{ route('aktifitas.index') }}">
                        <button style="font-size: 16px" title="Tambah Data" type="button"
                            class="relative w-auto px-4 py-2 rounded-lg bg-blue-500 text-white flex justify-center items-center gap-2 hover:bg-blue-600">
                            Kembali
                        </button>
                    </a>
                </div>

                <div class="px-4 py-2 bg-gray-100 rounded-lg shadow mb-4">
                    <p><strong>Tanggal:</strong> {{ $tanggal ?? 'Tidak Ada Data' }}</p>
                    <p><strong>Nama:</strong> {{ $nama ?? 'Tidak Ada Data' }}</p>
                </div>


                <hr style="margin-top: -25px"><br>

                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="text-center">No</th>
                            <th data-priority="2" class="text-center">Cabang</th>
                            <th data-priority="3" class="text-center">Kegiatan</th>
                            <!-- Kolom untuk tanggal -->
                            <th data-priority="4" class="text-center" id="tanggal-header"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_cabang }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <!-- Kolom untuk checkbox dinamis -->
                                <td id="checkboxes-{{ $item->id_kegiatan }}"></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data Untuk Ditampilkan</td>
                            </tr>
                        @endforelse
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
                    "responsive": true,
                    "dom": 'rt<"bottom"ip>', // Hanya tabel + informasi & pagination
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

            / Fungsi untuk menghitung jumlah hari dalam suatu bulan

            function getDaysInMonth(month, year) {
                return new Date(year, month, 0).getDate();
            }

            // Menampilkan tanggal (checkbox) pada thead dan tbody sesuai bulan dan tahun
            function generateDateCheckboxes(month, year) {
                const totalDays = getDaysInMonth(month, year);

                // Menambahkan tanggal pada thead
                let headerHTML = '';
                for (let i = 1; i <= totalDays; i++) {
                    headerHTML += `<th class="text-center">${i}</th>`;
                }
                document.getElementById('tanggal-header').innerHTML = headerHTML;

                // Menambahkan checkbox pada tbody untuk setiap kegiatan
                @foreach ($data as $item)
                    let checkboxesHTML = '';
                    for (let i = 1; i <= totalDays; i++) {
                        checkboxesHTML += `
                <label>
                    <input type="checkbox" name="tanggal[${$item->id_kegiatan}][]" value="${i}">
                    ${i}
                </label><br>
            `;
                    }
                    document.getElementById('checkboxes-{{ $item->id_kegiatan }}').innerHTML = checkboxesHTML;
                @endforeach
            }

            // Menentukan bulan dan tahun saat ini
            const currentMonth = 12; // Misal: bulan Desember (12)
            const currentYear = 2024; // Misal: tahun 2024

            // Panggil fungsi untuk menghasilkan tanggal dan checkbox
            generateDateCheckboxes(currentMonth, currentYear);
        </script>
        </script>
    @endpush
</body>
