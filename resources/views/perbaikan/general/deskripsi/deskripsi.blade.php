@extends('../dalam/layout')

@section('style')
    <style>
        .form-inline {
            display: flex;
            /* Menyusun elemen secara horizontal */
            align-items: center;
            /* Menjaga semua elemen berada pada posisi vertikal tengah */
            justify-content: flex-start;
            /* Menyusun elemen-elemen ke kiri */
            gap: 10px;
            /* Menambah jarak antar elemen untuk membuatnya lebih rapi */
        }



        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Jarak antar elemen dalam grup */
        }

        select.form-control {
            height: 40px;
            /* Sesuaikan tinggi select */
            padding: 5px;
            /* Beri ruang di dalam select */
        }

        button {
            display: flex;

            align-items: center;
            justify-content: center;
            height: 40px;
            /* Sama tinggi dengan elemen select */
            padding: 15px;
            /* Tambahkan padding horizontal */
            font-size: 19px;
            border: none;
            cursor: pointer;
        }

        button i {
            margin-right: 5px;
            /* Jarak antara ikon dan teks (opsional) */
        }


        .form-control {
            border: 2px solid #e1e1e1;
            /* Border biru */
            border-radius: 4px;
            /* Membuat sudut sedikit membulat */
            padding: 5px;
            /* Memberikan ruang di dalam elemen */
            background-color: #fff;
            /* Warna latar belakang putih */
        }

        .form-control:focus {
            border-color: #e0e0e0;
            /* Warna saat elemen di klik (focus) */
            outline: none;
            /* Menghilangkan outline default */
            box-shadow: 0 0 5px rgba(183, 183, 183, 0.664);
            /* Efek bayangan saat fokus */
        }

        .btn {
            margin-left: 0;
            border: #667eea;
            /* Biarkan tombol tetap di sebelah kanan */
        }





        /* Menyelaraskan label dan select dalam satu baris */
        .form-inline .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        /* Menambahkan spasi antar elemen form */
        .form-inline .form-group label {
            margin-right: 10px;
        }

        /* Menambahkan padding untuk button agar terlihat lebih menarik */
        button[type="submit"] {
            padding: 10px 20px;
            margin-top: 20px;
        }

        /* Responsif - membuat elemen form lebih fleksibel pada layar kecil */
        @media (max-width: 768px) {
            .form-inline .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-inline .form-group label {
                margin-bottom: 5px;
            }

            button[type="submit"] {
                width: 100%;
            }
        }



        /*Overrides for Tailwind CSS */
        .dataTables_filter,
        .dataTables_length {
            display: none;
        }

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
            <
            script >
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
                        TABLE DESKRIPSI
                    </h2>

                    <a id="create-button" href="{{ route('deskripsi.create') }}" style="display: none;">
                        <button style="font-size: 16px" title="Tambah Data" type="button"
                            class="relative w-auto px-4 py-2 rounded-lg bg-blue-500 text-white flex justify-center items-center gap-2 hover:bg-blue-600">
                            <i class="fa-solid fa-plus" style="margin-top: 4px;"></i>
                            Tambah
                        </button>
                    </a>
                </div>
                <hr style="margin-top: -25px"><br>
                <form method="GET" action="{{ route('deskripsi.index') }}" class="form-inline" style="margin-left: 15px">
                    <div class="form-group mr-3">
                        <select name="id_cabang" id="id_cabang"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Semua Cabang</option>
                            @foreach ($cabang as $cb)
                                <option value="{{ $cb->id_cabang }}"
                                    {{ request('id_cabang') == $cb->id_cabang ? 'selected' : '' }}>
                                    {{ $cb->nama_cabang }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mr-3">
                       <!-- Dropdown untuk memilih username -->
                       <select name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="0">Pilih Username</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->username }}" {{ request('username') == $user->username ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                    
                        
                    </div>

                    <!-- Tombol Filter tanpa margin-top yang tidak diperlukan -->
                    <button title="Filter" type="submit" id="filter-button"
                        class="px-3 py-2 rounded-md bg-blue-500 text-white text-sm hover:bg-blue-600 transition duration-300"
                        style="margin-top: -13px">
                        Filter
                    </button>
                </form>
                <div id="dataContainer" style="display:none;">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="text-center">No</th>
                                <th data-priority="2" class="text-center">Cabang</th>
                                <th data-priority="3" class="text-center">Tipe</th>
                                <th data-priority="4" class="text-center">Nama Deskripsi</th>
                                <th data-priority="4" class="text-center">Username</th>
                                <th data-priority="9" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($deskripsi->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                                </tr>
                            @else
                            @foreach ($deskripsi as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->nama_cabang }}</td>
                                <td class="text-center">
                                    {{ $tipeAlias[$data->tipe] ?? 'Tipe Tidak Ditemukan' }}
                                </td>
                                <td class="text-center">{{ $data->nama_deskripsi }}</td>
                                <td class="text-center">
                                    {{ $data->nama ?? 'Nama Tidak Ditemukan' }}
                                </td>
                                <td class="text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('deskripsi.edit', $data->id_deskripsi) }}" title="Perbarui"
                                            class="relative w-10 h-10 rounded-lg bg-green-500 text-white flex justify-center items-center hover:bg-green-600">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button type="button"
                                            onclick="confirmDelete('{{ route('deskripsi.destroy', $data->id_deskripsi) }}')"
                                            class="relative w-10 h-10 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600">
                                            <i class="fa fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                            @endif
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

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "responsive": true,
                    "dom": '<"top"lf>rt<"bottom"ip>', // Menyembunyikan tombol search dan show entries
                });
            });

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
                        5
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

            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById('filterForm');
                const dataContainer = document.getElementById('dataContainer');

                // Sembunyikan data ketika halaman pertama kali dimuat
                dataContainer.style.display = 'none';

                form.addEventListener('submit', function(e) {
                    // Jika select cabang belum dipilih, jangan tampilkan data
                    const selectCabang = document.getElementById('id_cabang').value;

                    if (!selectCabang) {
                        // Jika select cabang kosong, jangan tampilkan data
                        e.preventDefault();
                        alert('Silakan pilih cabang terlebih dahulu!');
                        return;
                    }

                    // Jika cabang dipilih, tampilkan data
                    dataContainer.style.display = 'block';
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterDropdown = document.getElementById('id_cabang');
                const createButton = document.getElementById('create-button');

                // Function to update the "Create" button href
                function updateCreateButtonHref() {
                    const selectedIdCabang = filterDropdown.value; // Get selected value
                    const baseUrl = "{{ route('deskripsi.create') }}";

                    // If a cabang is selected, append it as a query parameter
                    createButton.href = selectedIdCabang ? `${baseUrl}?id_cabang=${selectedIdCabang}` : baseUrl;
                }

                // Initial call to set the href based on the current dropdown value
                updateCreateButtonHref();

                // Update the href whenever the dropdown value changes
                filterDropdown.addEventListener('change', updateCreateButtonHref);
            });

            document.addEventListener("DOMContentLoaded", function() {
                // Cek jika ada parameter di URL yang menunjukkan filter diterapkan
                const urlParams = new URLSearchParams(window.location.search);

                // Dapatkan elemen dataContainer dan tombol Tambah
                const dataContainer = document.getElementById("dataContainer");
                const createButton = document.getElementById("create-button");

                // Jika ada filter yang diterapkan, tampilkan data dan tombol Tambah
                if (urlParams.has('id_cabang') || urlParams.has('username')) {
                    dataContainer.style.display = "block";
                    createButton.style.display = "block";
                }

                // Tangani pengiriman form filter
                const filterForm = document.querySelector('form');
                filterForm.addEventListener('submit', function() {
                    // Tampilkan data dan tombol Tambah setelah filter disubmit
                    dataContainer.style.display = "block";
                    createButton.style.display = "block";
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const filterButton = document.getElementById('filter-button');
                const selectCabang = document.getElementById('id_cabang');
                const optionSemuaCabang = selectCabang.options[0]; // Opsi "Semua Cabang"

                // Event listener untuk tombol filter
                filterButton.addEventListener('click', function() {
                    // Nonaktifkan opsi "Semua Cabang" setelah tombol filter ditekan
                    if (selectCabang.value !== "") {
                        optionSemuaCabang.disabled = true;
                    }
                });

                // Cek jika halaman dimuat dengan parameter filter
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('id_cabang') && urlParams.get('id_cabang') !== "") {
                    optionSemuaCabang.disabled = true; // Nonaktifkan opsi jika filter diterapkan
                }

                // Reset opsi "Semua Cabang" jika filter dihapus
                selectCabang.addEventListener('change', function() {
                    if (selectCabang.value === "") {
                        optionSemuaCabang.disabled = false; // Aktifkan kembali jika opsi dikosongkan
                    }
                });
            });
        </script>
    @endpush
</body>
