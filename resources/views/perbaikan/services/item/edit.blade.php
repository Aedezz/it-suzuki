@extends('layout.service')

<body class="bg-gray-100">
    @section('content')
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
            <!--Card-->
            <div id='recipients' class="p-3 mt-6 lg:mt-0 rounded shadow bg-white"
                style="width:165%; margin-left: -260px; margin-top: 22px;">
                <!-- Title and Menu Container -->
                <div class="flex justify-between items-center px-4 py-8">
                    <!-- Title -->
                    <h2 class="font-sans font-bold text-lg md:text-2xl" style="font-size: 20px; margin-top: -20px;">
                        EDIT ITEM SERVICE
                    </h2>
                </div>
                <hr style="margin-top: -25px"><br>

                <!-- Form Section -->
                <div class="container mt-4">
                    <div class="form-row flex flex-wrap -mx-2">
                        <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                        <form action="{{ route('item.update', $item->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('PUT')
                            <div class="mt-8 grid lg:grid-cols-2 gap-6">
                                <!-- Nama Periode -->
                                <div class="flex flex-col" style="margin-left: 20px">
                                    <label for="nama" class="text-sm text-gray-700 font-medium mb-2">Nama item</label>
                                    <input type="text" name="nama" id="nama"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Ketikan Nama Item"  value="{{ old('nama', $item->nama) }}">
                                </div>
                            </div>
                        
                            <!-- Tombol simpan dan kembali dipindahkan ke kiri -->
                            <div class="space-x-4 mt-8 flex justify-start" style="margin-left: 25px">
                                <!-- Simpan Button -->
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <!-- Kembali Button -->
                                <a href="{{ route('item.index') }}"  class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                                        Kembali
                                </a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <!--DataTables JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        @push('script')
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
        @endpush

    @endpush
</body>
