@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
        <!-- Title and Update Form -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex justify-between items-center mb-4 gap-3">
                <!-- Activity Title -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                    Edit Activity
                </h2>
            </div>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('activity.update', $activity->id_kegiatan) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Cabang Field -->
            <div class="mb-4">
                <label for="id_cabang" class="block text-gray-700">Cabang</label>
                <select name="id_cabang" id="id_cabang" class="border rounded-md py-2 px-4 w-full">
                    @foreach($cabang as $item)
                        <option value="{{ $item->id_cabang }}" {{ $activity->id_cabang == $item->id_cabang ? 'selected' : '' }}>
                            {{ $item->nama_cabang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Grup Field -->
            <div class="mb-4">
                <label for="id_grup" class="block text-gray-700">Grup</label>
                <select name="id_grup" id="id_grup" class="border rounded-md py-2 px-4 w-full">
                    @foreach($grup as $item)
                        <option value="{{ $item->id_grup }}" {{ $activity->id_grup == $item->id_grup ? 'selected' : '' }}>
                            {{ $item->nama_grup }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Kegiatan Field -->
            <div class="mb-4">
                <label for="nama_kegiatan" class="block text-gray-700">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan', $activity->nama_kegiatan) }}" class="border rounded-md py-2 px-4 w-full">
            </div>

            <!-- Nama Field -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nama</label>
                <select name="username" id="username" class="border rounded-md py-2 px-4 w-full">
                    @foreach($users as $user)
                        <option value="{{ $user->username }}" {{ $activity->username == $user->username ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300">
                    Update Activity
                </button>
            </div>
        </form>
    </div>
</div>

<script>
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
