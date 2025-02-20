@extends('layout.general')

@section('content')
<!--Container-->
<div class="flex justify-center items-center mt-10">
    <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
        <!-- Title in the top left corner -->
        <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
            Edit Deskripsi
        </h2>
        <hr>
        <hr>
        <!-- Form Section -->
        <div class="container mt-2">
            <div class="form-row flex flex-wrap -mx-2">
                <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                <form action="{{ route('deskripsi.update', $deskripsi->id_deskripsi) }}" method="POST" class="w-full">
                    @csrf
                    @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk memperbarui data -->
                    <div class="mt-8 grid lg:grid-cols-2 gap-6">
                        <!-- Nama Periode -->
                        <div class="flex flex-col" style="margin-left: 20px">
                            <label for="nama_cabang" class="text-sm text-gray-700 font-medium mb-2">Nama Cabang</label>
                            <input type="text" name="nama_cabang" id="nama_cabang"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                placeholder="Enter your period name" readonly
                                value="{{ $cabang ? $cabang->nama_cabang : '' }}" />
                            <input type="hidden" name="id_cabang" id="id_cabang"
                                value="{{ $cabang ? $cabang->id_cabang : '' }}" />
                        </div>

                        <div class="flex flex-col" style="margin-left: 20px">
                            <label for="tipe" class="text-sm text-gray-700 font-medium mb-2">Tipe</label>
                            <select type="text" name="tipe" id="tipe"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            @foreach ($tipeAlias as $tipe => $alias)
                                <option value="{{ $tipe }}"
                                    {{ old('tipe', $deskripsi->tipe) == $tipe ? 'selected' : '' }}>
                                    {{ $alias }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col" style="margin-left: 20px">
                            <label for="nama_deskripsi" class="text-sm text-gray-700 font-medium mb-2">Nama
                                Deskripsi</label>
                            <input type="text" name="nama_deskripsi" id="nama_deskripsi"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                placeholder="Enter your period name"
                                value="{{ old('nama_deskripsi', $deskripsi->nama_deskripsi) }}" />

                        </div>

                        <div class="flex flex-col" style="margin-left: 20px">
                            <label for="username" class="text-sm text-gray-700 font-medium mb-2">Nama Cabang</label>
                            <select type="text" name="username" id="username"
                                class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            @foreach ($users as $user)
                                <option value="{{ $user->username }}"
                                    {{ old('username', $deskripsi->username) == $user->username ? 'selected' : '' }}>
                                    {{ $user->nama }}
                                </option>
                            @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="space-x-4 mt-8 flex justify-end">
                        <!-- Simpan Button -->
                        <button type="submit"
                            class="py-2 px-4 bg-blue-700 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                            Simpan
                        </button>
                        <!-- Kembali Button -->
                        <a href="{{ route('deskripsi.index') }}"
                            class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

<!--DataTables JS-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


<script>
    @if (session('success'))
        let timerInterval;
        Swal.fire({
            title: "Berhasil!",
            html: "{{ session('success') }}",
            icon: "success",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        });
    @endif
</script>
