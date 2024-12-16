@include('layout.menu-navbar')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

    @section('content')
        <div class="flex justify-center items-center mt-10">
            <div
                class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                    Periode
                </h2>
                <hr>
                <hr>
                <!-- Form Section -->
                <div class="container mt-2">
                    <div class="form-row flex flex-wrap -mx-2">


                        <form action="{{ route('activity.update', $activity->id_kegiatan) }}" method="POST" class="w-full">
                            @csrf
                            @method('PUT') <!-- Menambahkan metode PUT menggunakan input tersembunyi -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Tipe -->
                                <div class="flex flex-col">
                                    <label for="id_cabang" class="text-sm text-gray-700 font-medium mb-2">Cabang</label>
                                    <select id="id_cabang" name="id_cabang"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                        <option value="">Pilih Cabang</option>
                                        @foreach ($cabang as $item)
                                            <option value="{{ $item->id_cabang }}"
                                                {{ $activity->id_cabang == $item->id_cabang ? 'selected' : '' }}>
                                                {{ $item->nama_cabang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="id_grup" class="text-sm text-gray-700 font-medium mb-2">Grup</label>
                                    <select name="id_grup" id="id_grup"
                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                        @foreach ($grup as $item)
                                            <option value="{{ $item->id_grup }}"
                                                {{ $activity->id_grup == $item->id_grup ? 'selected' : '' }}>
                                                {{ $item->nama_grup }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nama Deskripsi -->
                                <div class="flex flex-col">
                                    <label for="nama_kegiatan" class="text-sm text-gray-700 font-medium mb-2">Nama
                                        Aktifitas</label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                        value="{{ old('nama_kegiatan', $activity->nama_kegiatan) }}"
                                        class="border rounded-md py-2 px-4 w-full">
                                </div>

                                <!-- Username -->
                                <div class="flex flex-col">
                                    <label for="username" class="text-sm text-gray-700 font-medium mb-2">Username</label>
                                    <select name="username" id="username"
                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                        @foreach ($users as $user)
                                            <option value="{{ $user->username }}"
                                                {{ $activity->username == $user->username ? 'selected' : '' }}>
                                                {{ $user->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <a href="{{ route('home-activity') }}"
                                    class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
                            </div>
                        </form>




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
