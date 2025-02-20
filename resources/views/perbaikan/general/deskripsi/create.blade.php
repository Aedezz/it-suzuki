@extends('layout.general')

    @section('content')
        <div class="flex justify-center items-center mt-10">
            <div class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
                <!-- Title in the top left corner -->
                <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                    Tambah Deskripsi
                </h2>
            <hr><hr>
                <!-- Form Section -->
                <div class="container mt-2">            
                    <div class="form-row flex flex-wrap -mx-2">
                        <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                        <form action="{{ route('deskripsi.store') }}" method="POST" class="w-full">
                            @csrf
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Menampilkan Nama Cabang dengan Input Readonly -->
                                <div class="flex flex-col">
                                    <label for="id_cabang" class="text-sm text-gray-700 font-medium mb-2">Nama
                                        Cabang</label>
                                    <input type="text" name="nama_cabang" id="nama_cabang"
                                        value="{{ $cabang ? $cabang->nama_cabang : '' }}" readonly
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                    <!-- Mengirimkan id_cabang melalui input hidden -->
                                    <input type="hidden" name="id_cabang"
                                        value="{{ $cabang ? $cabang->id_cabang : '' }}" />
                                </div>

                                <!-- Tipe -->
                                <div class="flex flex-col">
                                    <label for="tipe" class="text-sm text-gray-700 font-medium mb-2">Tipe</label>
                                    <select id="tipe" name="tipe"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                        <option value="" disabled selected>Silahkan Pilih Terlebih Dahulu</option>
                                        <option value="1" {{ old('tipe') == '1' ? 'selected' : '' }}>Moni</option>
                                        <option value="2" {{ old('tipe') == '2' ? 'selected' : '' }}>Banu</option>
                                        <option value="3" {{ old('tipe') == '3' ? 'selected' : '' }}>Qpage</option>
                                    </select>
                                </div>

                                <!-- Nama Deskripsi -->
                                <div class="flex flex-col">
                                    <label for="nama_deskripsi" class="text-sm text-gray-700 font-medium mb-2">Nama
                                        Deskripsi</label>
                                    <input type="text" name="nama_deskripsi" id="nama_deskripsi"
                                        class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Masukan Nama Deskripsi" value="{{ old('nama_deskripsi') }}" />
                                </div>

                                <!-- Username -->
                                <div class="flex flex-col">
                                    <label for="username" class="text-sm text-gray-700 font-medium mb-2">Username</label>
                                    <select name="username" id="username"
                                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Pilih User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->username }}"
                                                {{ old('username') == $user->username ? 'selected' : '' }}>
                                                {{ $user->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-x-4 mt-8 flex justify-end" id="submitBtn">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                    Simpan
                                </button>
                                <a href="{{ route('deskripsi.index') }}"
                                    class="py-2 px-4 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 active:bg-gray-400">Kembali</a>
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
                // Mendapatkan tanggal pertama bulan ini
                document.addEventListener("DOMContentLoaded", function() {
                    // Buat objek Date untuk mendapatkan bulan dan tahun sekarang
                    var date = new Date();
                    var year = date.getFullYear(); // Tahun sekarang
                    var month = date.getMonth() + 1; // Bulan sekarang (0-indexed, jadi ditambah 1)

                    // Format bulan dan tahun untuk sesuai dengan format input date (yyyy-mm-dd)
                    var firstDayOfMonth = year + '-' + (month < 10 ? '0' + month : month) + '-01';

                    // Menetapkan tanggal pertama bulan ini ke dalam input field
                    document.getElementById('tgl_awal').value = firstDayOfMonth;
                });

                // Mendapatkan tanggal terakhir bulan ini
                document.addEventListener("DOMContentLoaded", function() {
                    // Buat objek Date untuk mendapatkan bulan dan tahun sekarang
                    var date = new Date();
                    var year = date.getFullYear(); // Tahun sekarang
                    var month = date.getMonth(); // Bulan sekarang (0-indexed)

                    // Membuat objek Date baru untuk bulan berikutnya
                    var nextMonth = new Date(year, month + 1,
                        0); // Tanggal 0 dari bulan berikutnya adalah tanggal terakhir bulan ini

                    // Mendapatkan tanggal terakhir bulan ini
                    var lastDayOfMonth = nextMonth.getDate();

                    // Format tanggal terakhir bulan ini untuk sesuai dengan format input date (yyyy-mm-dd)
                    var lastDateOfMonth = year + '-' + (month + 1 < 10 ? '0' + (month + 1) : (month + 1)) + '-' + (
                        lastDayOfMonth < 10 ? '0' + lastDayOfMonth : lastDayOfMonth);

                    // Menetapkan tanggal terakhir bulan ini ke dalam input field
                    document.getElementById('tgl_akhir').value = lastDateOfMonth;
                });

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