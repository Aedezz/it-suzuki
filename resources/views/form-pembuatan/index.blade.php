    @extends('form-pembuatan.layout.layout')
    @section('body')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!--Container-->
        <div class="mt-10 w-full">
            <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                        <th  data-priority="1">No.</th>
                        <th  data-priority="2" >NIK</th>
                        <th  data-priority="3">Nomor</th>
                        <th  data-priority="4">Tanggal</th>
                        <th  data-priority="5">Nama Lengkap</th>
                        <th  data-priority="6">Jabatan</th>
                        <th  data-priority="7">Divisi Cabang</th>
                        <th  data-priority="8">Keterangan</th>
                        <th  data-priority="9">Status</th>
                        <th  data-priority="10">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formUser as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nomor }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->divisi_cabang }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                                    @if ($data->cek == 1)
                                        <div class="w-max">
                                            <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-600 py-1 px-2 text-xs rounded-md">
                                                Sudah
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-max">
                                            <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-red-500/20 text-red-600 py-1 px-2 text-xs rounded-md">
                                                Belum
                                            </div>
                                        </div>
                                    @endif
                                </td>
                        
                                <td class="p-4 border-b border-gray-gray-50">
                            <div class="flex justify-center space-x-2">
                            <!-- Tombol Status (Update) -->
                            @if ($data->cek == 0)
                     
                            <!-- Tombol Centang (Update Status) -->
                            <button type="button" onclick="confirmUpdateStatus('{{ route('form-pembuatan.updateStatus', $data->id) }}')" 
                                class="bg-green-500 text-white p-1 w-8 rounded-md hover:bg-green-600 transition duration-300" title="Check">
                                <i class="bi bi-check-circle"></i>
                            </button>
                        
                            <button type="button" onclick="confirmDelete('{{ route('form-pembuatan.destroy', $data->id) }}')" class="bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300" title="Hapus Data">
                                <i class="bi bi-trash"></i>
                            </button>
                            @endif

                            <!-- Tombol Print -->
                            @if ($data->cek == 1)
                            <form action="{{ route('form-pembuatan.print', $data->id) }}" method="GET" target="_blank">
                                <button class="bg-gray-500 text-white p-1 w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300"
                                    title="Print">
                                    <i class="bi bi-printer"></i>
                                </button>
                            </form>
                        @else
                        <form action="{{ route('form-pembuatan.print', $data->id) }}" method="GET" target="_blank">
                            <button class="bg-gray-500 text-white p-1 w-8 h-8 rounded-md hover:bg-gray-600 transition duration-300"
                                title="Print">
                                <i class="bi bi-printer"></i>
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


    @push('script')
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "columnDefs": [
                {
                    "targets": 8,  // Mengatur agar kolom Aksi (kolom ke-9) tidak disembunyikan
                    "visible": true,  // Pastikan kolom Aksi terlihat
                }
            ]
        });
    });

    </script>
    @endpush

    @endsection


