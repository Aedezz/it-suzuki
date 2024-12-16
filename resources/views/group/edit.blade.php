@
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


                        <form action="{{ route('group.update', $group->id_grup) }}" method="POST" class="w-full">
                            @csrf
                            @method('PUT') <!-- Menambahkan metode PUT menggunakan input tersembunyi -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Tipe -->
                              

                                <!-- Nama Deskripsi -->
                                <div class="flex flex-col">
                                    <label for="nama_grup" class="text-sm text-gray-700 font-medium mb-2">Nama Group</label>
                                    <input type="text" name="nama_grup" id="nama_grup"
                                       value="{{ old('nama_grup', $group->nama_grup) }}"
                                        class="border rounded-md py-2 px-4 w-full">
                                </div>

                              
                            </div>

                            <div class="space-x-4 mt-8 flex justify-start" id="submitBtn">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <a href="{{ route('group.index') }}"
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
