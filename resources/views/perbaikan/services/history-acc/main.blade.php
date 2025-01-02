@extends('../dalam/layout')

<!-- Styles -->
<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }

    #tableContainer {
        max-height: 70vh; /* Atur tinggi maksimal agar tidak terlalu panjang */
    }

    table.dataTable {
        width: 100% !important;
        table-layout: fixed; /* Fixed layout for more control over column width */
    }

    table.dataTable th,
    table.dataTable td {
        white-space: normal; /* Allows text to wrap */
        word-wrap: break-word; /* Breaks long words onto the next line */
        text-align: center; /* Centers text for better alignment */
        padding: 4px 8px; /* Reduced padding for tighter cells */
        font-size: 14px; /* Optional: Reduce font size for tighter appearance */
    }

    table.dataTable th:last-child,
    table.dataTable td:last-child {
        width: 130px; /* Adjust width of the "Aksi" column */
    }
    
    table.dataTable td div {
        display: inline-block;
        text-align: left;
        word-break: break-word;
    }
    table.dataTable td span.text-sm {
        font-size: 12px;
        color: #6b7280; /* Tailwind Gray-500 */
    }

    .add-button-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 16px; /* Space between button and table */
    }

    .dataTables_length, .dataTables_filter {
        padding: 8px;
        border-radius: 8px;
    }

    .dataTables_length select, .dataTables_filter input {
        border: 1px solid #e2e8f0;
        padding: 4px 8px;
        border-radius: 4px;
    }
</style>

{{-- Logo --}}
<link rel="icon" href="../images/perbaikan/logo-tab.png">

<!-- Body -->
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!-- SweetAlert Status Message -->
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

    <!-- Container -->
    <div class="flex justify-center items-center mt-10">
        <div class="relative w-full lg:w-11/12 xl:w-10/12 bg-white rounded-lg shadow-md p-6">

            <!-- Title -->
            <div class="flex justify-between items-center">
                <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                    History - Approve
                </h2>
                <hr>
            </div>

            <!-- Data Table -->
            <div id="tableContainer" class="mt-6 w-full">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nomor</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">NIK</th>
                            <th class="px-4 py-2">Pengguna</th>
                            <th class="px-4 py-2">Perangkat</th>
                            <th class="px-4 py-2">Item</th>
                            <th class="px-4 py-2">Tipe</th>
                            <th class="px-4 py-2">Keterangan</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->pegawai_nik }}</td>
                                <td>{{ $data->pegawai_nama }}</td>
                                <td>{{ $perangkat[$data->id_barang]->nama ?? 'Perangkat Tidak Ditemukan' }}</td>
                                <td>{{ $item[$data->id_item]->nama ?? 'Item Tidak Ditemukan' }}</td>
                                <td>{{ $data->sn }}</td>
                                <td>
                                    <div>
                                        {{ $data->keterangan }}
                                        <br>
                                        @if ($data->spv_status == 1)
                                            <span class="text-sm text-gray-500 block">Done!</span>
                                        @else
                                            <span class="text-sm text-gray-500 block">Approve by STAFF IT</span>
                                        @endif
                                    </div>
                                </td>                                

                                <td class="flex justify-center space-x-1">
                                    <!-- Tombol Print (tetap di kanan) -->
                                    <form action="{{ route('history.print2', $data->id) }}" method="GET" target="_blank">
                                        <button class="bg-gray-500 text-white w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300 ml-auto" title="Print">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </form>

                                    @if ($data->spv_status == 0)
                                    <form action="{{ route('history.full-acc', $data->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white w-8 h-8 rounded-md hover:bg-green-600 transition duration-300 ml-auto" title="Approve">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @push('script')

        <!-- jQuery & DataTables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    responsive: true, 
                    pageLength: 25,
                    lengthMenu: [10, 25, 50, 100]
                });
            });

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
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;

                        const csrfField = document.createElement('input');
                        csrfField.type = 'hidden';
                        csrfField.name = '_token';
                        csrfField.value = '{{ csrf_token() }}';
                        form.appendChild(csrfField);

                        const methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';
                        form.appendChild(methodField);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</body>