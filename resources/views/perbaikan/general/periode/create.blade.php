@extends('layout.general')

@section('content')
    <div class="flex justify-center items-center mt-10">
        <div
            class="form-it-container w-full sm:w-11/12 lg:w-10/12 xl:w-11/12 2xl:w-3/4 bg-white rounded-lg shadow-md p-6 relative max-h-[80vh] overflow-hidden">
            <!-- Title in the top left corner -->
            <h2 class="font-sans text-xl sm:text-2xl font-bold" style="color: rgb(45, 45, 45); margin-bottom: 20px;">
                Tambah Periode
            </h2>
            <hr>
            <hr>
            <!-- Form Section -->
            <div class="container mt-2">
                <div class="form-row flex flex-wrap -mx-2">
                    <!-- Pastikan form menggunakan metode POST dan memiliki CSRF token -->
                    <form action="{{ route('periode.store') }}" method="POST" class="w-full">
                        @csrf
                        <div class="mt-8 grid lg:grid-cols-2 gap-6">
                            <!-- Nama Periode -->
                            <div class="flex flex-col" style="margin-left: 20px">
                                <label for="nama_periode" class="text-sm text-gray-700 font-medium mb-2">Nama
                                    Periode</label>
                                <input type="text" name="nama_periode" id="nama_periode"
                                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Enter your period name"
                                    value="{{ $lastNamaPeriode ? $lastNamaPeriode : 'Periode Baru' }}" />
                            </div>

                            <!-- Tanggal Awal -->
                            <div class="flex flex-col">
                                <label for="tgl_awal" class="text-sm text-gray-700 font-medium mb-2">Tanggal
                                    Awal</label>
                                <input type="date" name="tgl_awal" id="tgl_awal"
                                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="(01/01/1993)" />
                            </div>

                            <!-- Tanggal Akhir -->
                            <div class="flex flex-col" style="margin-left: 20px">
                                <label for="tgl_akhir" class="text-sm text-gray-700 font-medium mb-2">Tanggal
                                    Akhir</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir"
                                    class="bg-gray-100 border border-gray-200 rounded py-2 px-3 focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="(01/01/1993)" />
                            </div>
                        </div>

                        <div class="space-x-4 mt-8 flex justify-end">
                            <!-- Simpan Button -->
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                                Simpan
                            </button>
                            <!-- Kembali Button -->
                            <a href="{{ route('periode.index') }}">
                                <button type="button"
                                    class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                                    Kembali
                                </button>
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
