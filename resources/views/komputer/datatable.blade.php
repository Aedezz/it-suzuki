@extends('komputer.layout.index')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }
    #tableContainer {
        width: 100%;
        overflow: hidden; /* Prevent horizontal scrolling */
    }
</style>
@endpush

@section('body-komputer')
<div class="mt-10 w-full">
    <div id="tableContainer" class="transition-all duration-500 ease-in-out">
        <table id="example" class="display w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-center">No</th>
                    <th class="px-4 py-2 text-center">Tanggal</th>
                    <th class="px-4 py-2 text-center">NIK</th>
                    <th class="px-4 py-2 text-center">Nama</th>
                    <th class="px-4 py-2 text-center">Divisi</th>
                    <th class="px-4 py-2 text-center">Cabang</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($komputer as $d)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $d->tanggal }}</td>
                    <td class="px-4 py-2">{{ $d->nik}}</td>
                    <td class="px-4 py-2">{{ $d->nama}}</td>
                    <td class="px-4 py-2">{{ $d->divisi}}</td>
                    <td class="px-4 py-2">{{ $d->cabang}}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center space-x-1">
                            <a href="{{ route('komputer.detail', $d->id) }}" class="bg-blue-500 text-white w-8 h-8 flex justify-center items-center rounded-md hover:bg-blue-600 transition duration-300" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form onsubmit="return confirmDelete('{{ $d->id }}');" id="delete-form-{{ $d->id }}" method="POST" action="{{ route('komputer.destroy', $d->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="bg-red-500 text-white w-8 h-8 flex justify-center items-center rounded-md hover:bg-red-600 transition duration-300" title="Hapus Data" onclick="confirmDelete('{{ $d->id }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Display pagination links -->
        <div class="mt-4">
            {{ $komputer->links() }}
        </div>
    </div>
</div>
@endsection

@push('script')
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
@endpush
