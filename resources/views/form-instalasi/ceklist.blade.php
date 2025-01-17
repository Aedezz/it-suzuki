@extends('form-instalasi.layout.form')
@section('body')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="mt-10 w-full">
    <div id="tableContainer" class="transition-all duration-500 ease-in-out">
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
                @foreach ($cekForm as $d)
                <tr>
                    <td class="px-4 py-2">{{$d->nomor}}</td>
                    <td class="px-4 py-2" style="width: 100px; align-items: center">
                        {{ $d->formatted_tanggal }}
                    </td>
                    
                    <td class="px-4 py-2">{{$d->nik}}</td>
                    <td class="px-4 py-2">{{$d->nama_lengkap}}</td>
                    <td class="px-4 py-2">{{$d->divisi_cabang}}</td>
                    <td class="px-4 py-2">{{$d->kode_asset}}</td>
                    <td>
                        @if ($d->cek == 1)
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
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center space-x-1">
                            @if ($d->cek == 0)
                            <form action="{{ route('pc.check', $d->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white p-1 w-8 rounded-md hover:bg-green-600 transition duration-300" title="Check">
                                    <i class="bi bi-check-circle"></i>
                                </button>
                            </form>
                            @endif
                            <button class="bg-gray-500 text-white p-1 w-8 rounded-md hover:bg-gray-600 transition duration-300" title="Print">
                                <i class="bi bi-printer"></i>
                            </button>
                            @if ($d->cek == 0)
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('pc.destroy', $d->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300" title="Hapus Data">
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
</div>

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

<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }
    
    /* No scrolling, just ensure it stays within the layout */
    #tableContainer {
        width: 100%;
        overflow: hidden; /* Prevent horizontal scrolling */
    }
</style>
@endsection