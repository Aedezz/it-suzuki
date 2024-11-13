<!-- DataTables and jQuery Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Table Container inside the rectangle, initially visible -->
<div id="tableContainer" class="mt-10 overflow-x-auto transition-all duration-500 ease-in-out">
    <!-- DataTable -->
    <table id="example" class="display w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">No Reg</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-left">NIK</th>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">Divisi/Cabang</th>
                <th class="px-4 py-2 text-left">Kode Asset</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewForm as $d)
            <tr>
                <td class="px-4 py-2">{{$d->nomor}}</td>
                <td class="px-4 py-2">{{$d->tanggal}}</td>
                <td class="px-4 py-2">{{$d->nik}}</td>   
                <td class="px-4 py-2">{{$d->nama_lengkap}}</td>
                <td class="px-4 py-2">{{$d->divisi_cabang}}</td>
                <td class="px-4 py-2">{{$d->kode_asset}}</td>
                <td class="px-4 py-2">{{ $d->cek == 1 ? 'Sudah' : 'Belum' }}</td> <!-- Display 'Sudah' or 'Belum' -->
                <td class="px-4 py-2">
                    <div class="flex items-center justify-center space-x-1">
                        <!-- Check Button with Icon Only on the Left -->
                        @if ($d->cek == 0) <!-- Show buttons jika 'cek' is 0 (Belum) -->
                        <form action="{{ route('pc.check', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="inline-block bg-green-500 text-white p-1 w-8 rounded-md hover:bg-green-600 transition duration-300" title="Check">
                                <i class="bi bi-check-circle"></i>
                            </button>
                        </form>
                        @endif
                    
                        <!-- Print Button with Icon Only in the Middle -->
                        <button class="inline-block bg-yellow-500 text-white p-1 w-8 rounded-md hover:bg-yellow-600 transition duration-300" title="Print">
                            <i class="bi bi-printer"></i>
                        </button>
                    
                        <!-- Delete Button with Icon Only on the Right -->
                        @if ($d->cek == 0) <!-- Show buttons jika 'cek' is 0 (Belum) -->
                        <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('pc.destroy', $d->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300" title="Hapus Data">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>                                                        
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- DataTables initialization script -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            responsive: true
        });
    });
</script>
