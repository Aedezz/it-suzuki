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
        <div class="flex justify-center items-center mt-10">
            <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                  Edit Periode
                </h2>
            <hr><hr>
                <!-- Form Section -->
                <div class="container mt-2">            
                    <div class="form-row flex flex-wrap -mx-2">
            <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
            <form action="{{ route('periode.update', $periode->id_periode) }}" method="POST" class="w-full">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk memperbarui data -->
                <div class="mt-8 grid lg:grid-cols-2 gap-6">
                    <!-- Nama Periode -->
                    <div class="flex flex-col" style="margin-left: 20px">
                        <label for="nama_periode" class="text-sm text-gray-700 font-medium mb-2">Nama Periode</label>
                        <input type="text" name="nama_periode" id="nama_periode"
                            class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                            placeholder="Enter your period name"
                        value="{{ $periode->nama_periode }}" />
                    </div>
    
                    <!-- Tanggal Awal -->
                    <div class="flex flex-col">
                        <label for="tgl_awal" class="text-sm text-gray-700 font-medium mb-2">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" value="{{ $periode->tgl_awal }}"
                            class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                            placeholder="(01/01/1993)" />
                    </div>
    
                    <!-- Tanggal Akhir -->
                    <div class="flex flex-col" style="margin-left: 20px">
                        <label for="tgl_akhir" class="text-sm text-gray-700 font-medium mb-2">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" value="{{ $periode->tgl_akhir }}"
                            class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                            placeholder="(01/01/1993)" />
                    </div>
                </div>
    
                <div class="space-x-4 mt-8 flex justify-end">
                    <!-- Simpan Button -->
                    <button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                        Simpan
                    </button>
                    
                    <!-- Kembali Button -->
                    <a href="{{ route('periode.index') }}" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                        Kembali
                    </a>
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
