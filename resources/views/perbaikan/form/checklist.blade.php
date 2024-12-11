@extends('perbaikan.layout.layout-table')

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

@section('body')

    <link rel="icon" href="../images/perbaikan/logo-tab.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <div class="mt-10 w-full">
        <div id="tableContainer" class="transition-all duration-500 ease-in-out">
            <table id="example" class="display w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th></th>
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
                            <td><input type="checkbox" class="data-checkbox" value="{{ $data->id }}"></td>
                            <!-- Checkbox untuk setiap baris -->
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
    @push('script')
    <script>
     $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [ 10, 25, 50, 100 ],  // Menentukan jumlah data yang ditampilkan per halaman
        "searching": true,  // Memastikan pencarian aktif
        "paging": true,  // Memastikan paginasi aktif
        "info": true  // Menampilkan informasi jumlah data
    });
});

    
    </script>

<script>
    $(document).ready(function() {
        // Menggunakan event change pada checkbox
        $('.data-checkbox').on('change', function() {
            // Mendapatkan ID dari checkbox yang dicentang
            var id = $(this).val();

            // Mengirim request Ajax untuk memperbarui status
            $.ajax({
                url: '{{ route('updateStatus', ['id' => ':id']) }}'.replace(':id', id), // Route untuk update status
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Hapus baris tabel setelah status diperbarui
                    $('tr').has('input[value="' + id + '"]').remove();

                    // Tampilkan SweetAlert notifikasi sukses
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                        willClose: () => {
                            // Do nothing
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Tampilkan SweetAlert notifikasi error
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat memperbarui status.',
                        icon: 'error',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                        willClose: () => {
                            // Do nothing
                        }
                    });
                }
            });
        });
    });
</script>



    @endpush
@endsection


