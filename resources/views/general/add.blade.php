{{-- @include('layout.menu-navbar')

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <h2 class="font-sans text-xl sm:text-2xl font-bold mb-6 text-gray-800">
            Tambah Cabang
        </h2>

        <!-- Form to add a new branch -->
        <form action="{{ route('branch.store') }}" method="POST">
            @csrf

            <!-- Nama Cabang Field -->
            <div class="mb-4">
                <label for="nama_cabang" class="block text-gray-700 font-semibold">Nama Cabang</label>
                <input type="text" id="nama_cabang" name="nama_cabang" required class="w-full px-4 py-2 border rounded-lg" placeholder="Masukkan Nama Cabang">
            </div>

            <!-- Combined Informasi and Perusahaan Fields -->
            <div class="mb-4">
                <!-- Informasi Field -->
                <label for="informasi" class="block text-gray-700 font-semibold">Informasi</label>
                <input type="text" id="informasi" name="informasi" required class="w-full px-4 py-2 border rounded-lg mt-2">
                
                <!-- Perusahaan Field -->
                <label for="perusahaan" class="block text-gray-700 font-semibold mt-4">Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" required class="w-full px-4 py-2 border rounded-lg mt-2">
            </div>

            <!-- Submit Button -->
            <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50" id="submitBtn">
                    Simpan
                </button>
                <a href="{{ route('branch') }}" class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
            </div>
        </form>
    </div>
</div>

 --}}

@extends('layout.general')

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

    @section('content')
        <div class="flex justify-center items-center mt-10">
            <div
                class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                    Tambah Branch
                </h2>
                <hr>
                <hr>
                <div class="container mt-2">
                    <div class="form-row flex flex-wrap -mx-2">
                        <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                        <form action="{{ route('branch.store') }}" method="POST" class="w-full">
                            @csrf
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                               
                                <div class="flex flex-col">
                                    <label for="nama_cabang" class="text-sm text-gray-700 font-medium mb-2">Nama
                                        Cabang</label>
                                    <input type="text" name="nama_cabang" id="nama_cabang"
                                        required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="informasi" class="text-sm text-gray-700 font-medium mb-2">Informasi</label>
                                    <input type="text" name="informasi" id="informasi"
                                        required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="perusahaan" class="text-sm text-gray-700 font-medium mb-2">Perusahaan</label>
                                    <input type="text" name="perusahaan" id="perusahaan"
                                        required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                </div>
                            </div>

                            <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <a href="{{ route('branch') }}"
                                    class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection