@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
        <!-- Title and Create Button -->
        <div class="flex justify-between items-center">
            <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                Branch
            </h2>
            <!-- Create Button (positioned to the right) -->
            <a href="{{ route('branch.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300 flex items-center">
                <i class="bi bi-plus mr-2"></i> <!-- Plus icon with right margin for spacing -->
                Add New Branch
            </a>
        </div>
        
        <!-- Content area (table) -->
        <div class="mt-12">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">No</th>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold" style="padding-right: 700px">Nama Cabang</th> <!-- Added padding-right here -->
                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">
                            <div class="flex justify-center">Aksi</div> <!-- Center the title "Aksi" -->
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($viewBranch as $index => $b)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b pr-10">{{ $b->nama_cabang }}</td>
                            <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                            <!-- Edit Button -->
                            <a href="{{ route('branch.edit', $b->id_cabang) }}" class="bg-yellow-500 text-white p-1 w-8 rounded-md hover:bg-yellow-600 transition duration-300 relative group z-10" title="Edit Data">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete Button with Hover Effects -->
                            <button onclick="confirmDelete('{{ $b->id_cabang }}')" class="bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300 ml-2 relative group z-10" title="Hapus Data">
                                <i class="bi bi-trash"></i>
                            </button>           

                            <!-- Delete Form (Hidden) -->
                                <form id="delete-form-{{ $b->id_cabang }}" action="{{ route('branch.destroy', $b->id_cabang) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin hapus data?',
            text: "Data ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
    
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    @endif
    
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan!',
            text: 'Silakan periksa form Anda.',
            confirmButtonColor: '#3085d6'
        });
    @endif
</script>
