@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-auto">
        <!-- Title and Submit Button -->
        <div class="flex justify-between items-center">
            <h2 class="font-sans text-xl sm:text-2xl font-bold text-gray-800">
                Tambah Activity
            </h2>
        </div>
        
        <!-- Display validation errors -->
        @if($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Activity Add Form -->
        <form action="{{ route('activity.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="form-group mb-4">
                <label for="id_cabang" class="block text-gray-700 font-semibold">Cabang</label>
                <select class="form-control mt-1 w-full p-3 border rounded-md" id="id_cabang" name="id_cabang" required>
                    <option value="">Pilih Cabang</option>
                    @foreach($cabang as $c)
                        <option value="{{ $c->id_cabang }}" {{ old('id_cabang') == $c->id_cabang ? 'selected' : '' }}>
                            {{ $c->nama_cabang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="id_grup" class="block text-gray-700 font-semibold">Grup</label>
                <select class="form-control mt-1 w-full p-3 border rounded-md" id="id_grup" name="id_grup" required>
                    <option value="">Pilih Grup</option>
                    @foreach($grup as $g)
                        <option value="{{ $g->id_grup }}" {{ old('id_grup') == $g->id_grup ? 'selected' : '' }}>
                            {{ $g->nama_grup }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="nama_kegiatan" class="block text-gray-700 font-semibold">Nama Activity</label>
                <input type="text" class="form-control mt-1 w-full p-3 border rounded-md" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required>
            </div>

            <div class="form-group mb-4">
                <label for="username" class="block text-gray-700 font-semibold">Username</label>
                <select class="form-control mt-1 w-full p-3 border rounded-md" id="username" name="username" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->username }}" {{ old('username') == $user->username ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300 mt-6 w-full">
                Tambah Activity
            </button>
        </form>
    </div>
</div>