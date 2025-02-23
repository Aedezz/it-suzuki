@extends('layout.service')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    .rectangle-container {
        width: 100%;
        padding: 16px;
    }
    
    /* No scrolling, just ensure it stays within the layout */
    #tableContainer {
        width: 100%;
    }
</style>

@section('content')
<div class="flex justify-center items-center mt-10">
    <div class="form-it-container relative w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6">
        <!-- Title with styled bottom border -->
        <div>
            <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45)">
                Daftar Item
            </h2>
            <div class="mt-3 border-b-2 border-gray-300"></div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="mt-8 w-full">
            <div id="tableContainer" class="transition-all duration-500 ease-in-out">
                <table id="example" class="display w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-center">Nama Item</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $data)
                            <tr>
                                <td class="px-4 py-2 text-center">{{ $data->id }}</td>
                                <td class="px-4 py-2 text-center">{{ $data->nama }}</td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Edit Button -->
                                        <div class="flex justify-center w-full">
                                            <a href="{{ route('item.edit', $data->id) }}"
                                                class="relative w-8 h-8 rounded-lg bg-blue-500 text-white flex justify-center items-center hover:bg-blue-600" title="Perbarui">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
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

<script>
    // SweetAlert for status message
    @if (session('status'))
    Swal.fire({
        title: '{{ session('status')['judul'] }}',
        text: '{{ session('status')['pesan'] }}',
        icon: '{{ session('status')['icon'] }}',
        confirmButtonText: 'OK'
    });
    @endif

    $(document).ready(function() {
        $('#example').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            responsive: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });
    });
</script>