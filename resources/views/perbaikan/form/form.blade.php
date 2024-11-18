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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
@if (session('status'))
    <script>
        Swal.fire({
            title: '{{ session('status')['judul'] }}',
            text: '{{ session('status')['pesan'] }}',
            icon: '{{ session('status')['icon'] }}',
            confirmButtonText: 'OK'
        });
    </script>
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
                        FORM PERBAIKAN PERANGKAT
                    </h2>

                    <!-- Menu -->
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Data</a>
                        <a href="{{ route('perbaikan.laporan') }}"
                            class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Laporan</a>
                        <a href="{{ route('checklist.index') }}"
                            class="text-gray-700 hover:text-indigo-500 transition-all duration-300">Checklist</a>
                    </div>
                </div>



                <hr style="margin-top: -25px"><br>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
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
                                <td>{{ $data->tanggal }}</td>
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
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-center space-x-2">
                                        @if ($data->cek == 0)
                                        <!-- Tombol Centang (Update Status) -->
                                        <button type="button" 
                                            onclick="confirmUpdateStatus('{{ route('form.updateStatus', $data->id) }}')"
                                            class="relative w-10 h-10 rounded-lg bg-green-500 text-white flex justify-center items-center hover:bg-green-600">
                                            <i class="fa-solid fa-check-to-slot"></i>
                                        </button>
                                        
                                        <!-- Tombol Hapus (Delete) -->
                                        <button type="button" 
                                            onclick="confirmDelete('{{ route('form.destroy', $data->id) }}')"
                                            class="relative w-10 h-10 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    @endif
                                    
                                    
                                                                 
                                        <!-- Tombol Print -->
                                        @if ($data->cek == 1)
                                            <div class="flex justify-center w-full">
                                                <button
                                                    class="relative w-10 h-10 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600">
                                                    <i class="fa-solid fa-print"></i>
                                                </button>
                                            </div>
                                        @else
                                            <button
                                                class="relative w-10 h-10 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600">
                                                <i class="fa-solid fa-print"></i>
                                            </button>
                                        @endif
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

 // Fungsi untuk konfirmasi Update Status
function confirmUpdateStatus(url) {
    Swal.fire({
        title: 'Apa Anda Yakin?',
        text: "Ini Akan Menandai Status Selesai.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Perbarui Data!',
        cancelButtonText: 'Batal Perbarui',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Membuat form untuk submit POST ke URL
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;

            // Menambahkan CSRF Token
            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}'; // Pastikan ini dapat dieksekusi dalam Blade template
            form.appendChild(csrfField);

            // Submit form untuk update status
            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Fungsi untuk konfirmasi Delete
function confirmDelete(url) {
    Swal.fire({
        title: 'Apa Anda Yakin?',
        text: "Data Tidak Dapat Dikembalikan Setelah Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus Data!',
        cancelButtonText: 'Jangan Dihapus!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Membuat form untuk submit DELETE ke URL
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;

            // Menambahkan CSRF Token
            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}'; // Pastikan ini dapat dieksekusi dalam Blade template
            form.appendChild(csrfField);

            // Menambahkan Method DELETE
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            // Submit form untuk delete data
            document.body.appendChild(form);
            form.submit();
        }
    });
}

        </script>
    @endpush
</body>
