@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
        <!-- Title, Filter, and Create Button -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex justify-between items-center mb-4 gap-3">
                <!-- Activity Title -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                    Activity
                </h2>
            
                <!-- Filter Form -->
                <form action="{{ route('home-activity') }}" method="GET" class="flex space-x-4">
                    <!-- Cabang Filter -->
                    <select name="nama_cabang" class="border rounded-md py-2 px-4">
                        <option value="">Cabang</option>
                        @foreach($cabangs as $cabang)
                            <option value="{{ $cabang->nama_cabang }}" {{ request('nama_cabang') == $cabang->nama_cabang ? 'selected' : '' }}>
                                {{ $cabang->nama_cabang }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Nama Filter (Longer Select) -->
                    <select name="nama" class="border rounded-md py-2 px-4 w-72">
                        <option value="">Nama</option>
                        @foreach($users as $user)
                            <option value="{{ $user->nama }}" {{ request('nama') == $user->nama ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-yellow-700 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-300">
                        Filter
                    </button>
                </form>
            </div>            

            <!-- Create Button (positioned to the right) -->
            <a href="{{ route('activity.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300 flex items-center">
                <i class="bi bi-plus mr-2"></i> <!-- Plus icon with right margin for spacing -->
                Add New Activity
            </a>
        </div>

        <!-- Content area (table) -->
        <div class="mt-12">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">No</th>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Cabang</th>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Grup</th>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Nama Kegiatan</th>
                        <th class="py-2 px-4 border-b-2 text-left text-gray-800 font-semibold">Username</th>
                        <th class="py-2 px-4 border-b-2 text-center text-gray-800 font-semibold">
                            <div class="flex justify-center">Aksi</div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($viewActivity as $index => $a)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $a->nama_cabang }}</td>
                            <td class="py-2 px-4 border-b">{{ $a->nama_grup }}</td>
                            <td class="py-2 px-4 border-b">{{ $a->nama_kegiatan }}</td>
                            <td class="py-2 px-4 border-b">{{ $a->nama }}</td>

                            <td class="py-2 px-4 border-b text-center flex items-center justify-center">
                                <a href="{{ route('activity.edit', $a->id_kegiatan) }}" class="bg-yellow-500 text-white p-1 w-8 rounded-md hover:bg-yellow-600 transition duration-300" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button onclick="confirmDelete('{{ $a->id_kegiatan }}')" class="bg-red-500 text-white p-1 w-8 rounded-md hover:bg-red-600 transition duration-300 ml-2" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $a->id_kegiatan }}" action="{{ route('activity.destroy', $a->id_kegiatan) }}" method="POST" style="display: none;">
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