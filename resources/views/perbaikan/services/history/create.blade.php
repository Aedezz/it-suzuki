@extends('layout.service')

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
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
            <!--Card-->
            <div id='recipients' class="p-3 mt-6 lg:mt-0 rounded shadow bg-white"
                style="width:165%; margin-left: -260px; margin-top: 22px;">
                <!-- Title and Menu Container -->
                <div class="flex justify-between items-center px-4 py-8">
                    <!-- Title -->
                    <h2 class="font-sans font-bold text-lg md:text-2xl" style="font-size: 20px; margin-top: -20px;">
                        BUAT HISTORY SERVICE
                    </h2>
                </div>
                <hr style="margin-top: -25px"><br>

                <!-- Form Section -->
                <div class="container mt-4" style="margin-left: 25px; margin-top: -30px">
                    <div class="form-row flex flex-wrap -mx-2">
                        <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                        <form action="{{ route('history.store') }}" method="POST" class="w-full">
                            @csrf
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col">
                                    <label for="tanggal" class="text-sm text-gray-700 font-medium mb-2">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Nama Deskripsi" value="{{ old('tanggal') }}" />
                                </div>

                                <script>
                                    const today = new Date();
                                    const formattedDate = today.toISOString().split('T')[0];
                                    document.addEventListener("DOMContentLoaded", function () {
                                    const today = new Date();
                                    const formattedDate = today.toISOString().split('T')[0];
                                    document.getElementById("tanggal").value = formattedDate;
                                });
                                </script>

                                <div class="flex flex-col">
                                    <label for="nomor" class="text-sm text-gray-700 font-medium mb-2">No Reg</label>
                                    <input type="text" name="nomor" id="nomor"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan No Reg" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="nama" class="text-sm text-gray-700 font-medium mb-2">Pengguna</label>
                                    <select name="kode_pegawai" id="kode_pegawai" required
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                                        <option value="">Pilih Pengguna</option>
                                        @foreach($pegawaiData as $pegawai)
                                            <option value="{{ $pegawai->kode_pegawai }}" data-cabang="{{ $pegawai->kode_cabang }}" data-divisi="{{ $pegawai->kode_divisi }}">
                                                {{ $pegawai->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="kode_cabang" id="kode_cabang" />
                                    <input type="hidden" name="kode_divisi" id="kode_divisi" />
                                </div>
                                

                                <div class="flex flex-col">
                                    <label for="keterangan" class="text-sm text-gray-700 font-medium mb-2">Keterangan</label>
                                    <select id="keterangan" name="keterangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                        <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>
                                        <option value="SERVICE">SERVICE</option>
                                        <option value="RUSAK">RUSAK</option>
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="id_barang" class="text-sm text-gray-700 font-medium mb-2">Perangkat</label>
                                    <select name="id_barang" id="id_barang"
                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>
                                        @foreach ($perangkat as $cb)
                                        <option value="{{ $cb->id }}"
                                            {{ request('id') == $cb->id ? 'selected' : '' }}>
                                            {{ $cb->nama }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="id_item" class="text-sm text-gray-700 font-medium mb-2">Item</label>
                                    <select name="id_item" id="id_item"
                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>

                                        @foreach ($item as $cb)
                                        <option value="{{ $cb->id }}"
                                            {{ request('id') == $cb->id ? 'selected' : '' }}>
                                            {{ $cb->nama }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="sn" class="text-sm text-gray-700 font-medium mb-2">Tipe /
                                        Jenis</label>
                                    <input type="text" name="sn" id="sn"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Tipe" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="rekomendasi"
                                        class="text-sm text-gray-700 font-medium mb-2">Rekomendasi</label>
                                    <input type="text" name="rekomendasi" id="rekomendasi"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Rekomendasi" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="catatan" class="text-sm text-gray-700 font-medium mb-2">Catatan</label>
                                    <input type="text" name="catatan" id="catatan"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Catatan" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="no_po" class="text-sm text-gray-700 font-medium mb-2">No Purchase</label>
                                    <input type="text" name="no_po" id="no_po"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Deskripsi" />
                                </div>
                            </div>

                            <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <a href="{{ route('history.index') }}"
                                    class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

        <!--DataTables JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script>
            document.getElementById('kode_pegawai').addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const kodeCabang = selectedOption.getAttribute('data-cabang');
                const kodeDivisi = selectedOption.getAttribute('data-divisi');
        
                document.getElementById('kode_cabang').value = kodeCabang;
                document.getElementById('kode_divisi').value = kodeDivisi;
            });
        </script>        