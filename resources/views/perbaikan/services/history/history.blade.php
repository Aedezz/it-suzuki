@extends('layout.service')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- jQuery (wajib untuk DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<link rel="icon" href="../images/perbaikan/logo-tab.png">

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
    <body class="bg-gray-50">
    @section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="relative w-full lg:w-11/12 xl:w-10/15 bg-white rounded-lg shadow-md p-6">
            <!-- Title -->
            <div class="flex justify-between items-center">
                <h2 class=" text-xl sm:text-2xl font-bold text-gray-800">
                    History Service
                  
                </h2>
                <!-- Create Button (positioned to the right) -->
                <a href="{{ route('history.create') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah
                </a>
                
            </div>
            <hr style="margin-top: 20px">
            <!-- Data Table -->
            <div class="mt-10 w-full">
                <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                    <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nomor</th>
                            <th class="px-8 py-2">Tanggal</th>
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
                                <td style="padding: 5px">{{ $data->tanggal }}</td>
                                <td>{{ $data->pegawai_nik }}</td>
                                <td style="padding: 20px">{{ $data->pegawai_nama }}</td>
                                <td>{{ $perangkat[$data->id_barang]->nama ?? 'Perangkat Tidak Ditemukan' }}</td>
                                <td>{{ $item[$data->id_item]->nama ?? 'Item Tidak Ditemukan' }}</td>
                                <td>{{ $data->sn }}</td>
                                <td style="text-align: center">{{ $data->keterangan }}</td>
                                <td class="flex justify-center space-x-1">
                                    {{-- <a href="#" title="Delete" onclick="confirmDelete('#')" class="relative w-8 h-8 rounded-lg bg-red-500 text-white flex justify-center items-center hover:bg-red-600" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a> --}}

                                    <!-- Tombol Print (tetap di kanan) -->
                                    <form action="{{ route('history.print', $data->id) }}" method="GET" target="_blank">
                                        <button class="bg-gray-500 text-white w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300 ml-auto" title="Print">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </form>

                                    {{-- <!-- Tombol Check -->
                                    @if ($data->status == 0)
                                    <form action="{{ route('history.check', $data->id) }}" method="POST">
                                        @csrf
                                        @if (Auth::user()->username == 'rawr')
                                            <button type="submit" class="bg-green-500 text-white w-8 h-8 rounded-md hover:bg-blue-600 transition duration-300 ml-auto" title="Approve (Wafi)">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        @elseif (Auth::user()->username == 'rawr1')
                                            <button type="submit" class="bg-green-500 text-white w-8 h-8 rounded-md hover:bg-green-600 transition duration-300 ml-auto" title="Approve (Awli)">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="bg-green-500 text-white w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300 ml-auto" title="Approve (Default)">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        @endif
                                    </form>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    </body>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    responsive: true,
                    pageLength: 10,
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
