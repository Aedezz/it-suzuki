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
                        Buat Deskripsi
                    </h2>
                </div>
                <hr style="margin-top: -25px"><br>

                <!-- Form Section -->
                <div class="container mt-4" style="margin-left: 25px">
                    <div class="form-row flex flex-wrap -mx-2">
                        <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                        <form action="{{ route('deskripsi.update', $deskripsi->id_deskripsi) }}" method="POST"
                            class="w-full">
                            @csrf
                            @method('PUT')

                            <!-- ID Cabang -->
                            <!-- ID Cabang -->
<div class="flex flex-col">
    <label for="id_cabang" class="text-sm text-gray-700 font-medium mb-2">Nama Cabang</label>
    
    <!-- Input untuk menampilkan nama cabang (read-only) -->
    <input type="text" name="nama_cabang" id="nama_cabang" 
        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
        placeholder="Nama Cabang" readonly
        value="{{ $cabang ? $cabang->nama_cabang : '' }}" />

    <!-- Hidden input untuk mengirimkan id_cabang -->
    <input type="hidden" name="id_cabang" id="id_cabang" value="{{ $cabang ? $cabang->id_cabang : '' }}" />
</div>

                            


                            <!-- Tipe -->
                            <div class="flex flex-col mt-4">
                                <label for="tipe" class="text-sm text-gray-700 font-medium mb-2">Tipe</label>
                                <select id="tipe" name="tipe"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ $deskripsi->tipe == 1 ? 'selected' : '' }}>Moni</option>
                                    <option value="2" {{ $deskripsi->tipe == 2 ? 'selected' : '' }}>Banu</option>
                                    <option value="3" {{ $deskripsi->tipe == 3 ? 'selected' : '' }}>Qpage</option>
                                </select>
                            </div>

                            <!-- Nama Deskripsi -->
                            <div class="flex flex-col mt-4">
                                <label for="nama_deskripsi" class="text-sm text-gray-700 font-medium mb-2">Nama Deskripsi</label>
                                <input type="text" name="nama_deskripsi" id="nama_deskripsi"
                                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    value="{{ old('nama_deskripsi', $deskripsi->nama_deskripsi) }}">
                            </div>
                            

                            <!-- Username -->
                            <!-- Username Select -->
                            <div class="flex flex-col">
                                <label for="username" class="text-sm text-gray-700 font-medium mb-2">Username</label>
                                <select id="username" name="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>
                                    @foreach ($usernameToName as $username => $name)
                                        <option value="{{ $username }}"
                                            {{ old('username', $deskripsi->username) == $username ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="flex justify-end mt-6 space-x-4">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700">Simpan</button>
                                <a href="{{ route('deskripsi.index') }}"
                                    class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
                            </div>
                        </form>


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

        @push('script')
            <script>
                @if (session('success'))
                    let timerInterval;
                    Swal.fire({
                        title: "Berhasil!",
                        html: "{{ session('success') }}",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    });
                @endif
            </script>
        @endpush

    @endpush
</body>
