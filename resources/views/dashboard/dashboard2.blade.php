@extends('../dalam/main2')

@section('content')
<div class="content-wrapper">

  <section class="dark:bg-gray-900" style="margin-top: -23px">
    <div class="grid max-w-screen-xl px-4 pt-11 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-20">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-5xl dark:text-white">Membangun Sistem IT<br>Handal & Inovatif.</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Kelola, simpan, dan analisis data dengan mudah dalam satu sistem terpadu. Kami menghadirkan solusi untuk pengolahan data yang cepat, aman, dan efisien. <a href="#" class="hover:underline">Memastikan informasi</a> anda selalu tersedia dan<a href="#" class="hover:underline"> terorganisir dengan baik.</a></p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="#" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <i class="fas fa-chart-bar mr-2"></i> Manajemen Data Terpusat
                </a>
                <a href="#" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <i class="fas fa-lock mr-2"></i> Keamanan Maksimal
                </a>
                <a href="#" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <i class="fas fa-bolt mr-2"></i> Akses Cepat & Mudah
                </a>
            </div>
        </div>
        <div class="hidden lg lg:col-span-5 lg:flex" style="margin-top: -70px; ">
            <img src="{{ asset('images/hero/img-1.png') }}" alt="hero image">
        </div>                
    </div>
</section>
</div>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Success Alert -->
    @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
        </script>
    @endif

    <!-- Logout Alert -->
    @if(session('logout'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Logout',
            text: '{{ session('logout') }}',
            showConfirmButton: false,
            timer: 1500
        });
        </script>
    @endif

    <!-- Error Alert -->
    @if(session('errors'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Ada yang error!',
            text: '{{ session('errors')->first() }}',  <!-- Show the first error message -->
            position: 'center',
            showConfirmButton: false,
            timer: 1500
        });
        </script>
    @endif

@endpush



