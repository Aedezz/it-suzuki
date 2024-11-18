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

          <!-- Form Section -->
<div class="container mt-4">
    <div class="form-row flex flex-wrap -mx-2">
        <!-- Input Tahun -->
        <div class="form-group col-md-6 px-2 w-full md:w-1/2">
            <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
            <input type="number" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="tahun" name="tahun" value="2024" required>
        </div>

        <!-- Select IT -->
        <div class="form-group col-md-6 px-2 w-full md:w-1/2">
            <label for="it" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IT</label>
            <select id="it" name="it"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
                <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>
                <option value="11.11.259">EPA YUDA PURNAMA</option>
                <option value="22.02.2179">BAGUES PUTRA TAWAQQAL</option>
                <option value="22.02.2183">AGIL PUTRA DESALWA</option>
                <option value="22.11.2376">RIZQIE RAHMATILLAH</option>
                <option value="24.01.2779">HUSEIN ABBAS RUMAF</option>
                <option value="24.01.2793">MUHAMMAD ALWI</option>
                <option value="24.02.2827">BRILIAN SYUKRI RAMADHAN</option>
                <option value="24.09.3002">NUGROHO OKTARINDO</option>
            </select>
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-4 mt-4">
        <button type="submit" class="simpan bg-purple-500 text-white font-bold py-2 px-4 rounded">Print</button>
        <button type="reset" class="reset bg-red-500 text-white font-bold py-2 px-4 rounded">Pending</button>
    </div>
</div>




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

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }

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
