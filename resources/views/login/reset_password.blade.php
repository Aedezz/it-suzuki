@extends('../dalam/main2')

@section('content')
    {{-- <div class="container-fluid d-flex justify-content-center align-items-center vh-100 bg-blue-50">
        <div class="card shadow-sm p-4 rounded" style="max-width: 400px; width: 100%; background-color: #ffffff;">
            <h2 class="text-center text-primary mb-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: 600;">Ubah Password</h2>
            <p class="text-center mb-4" style="font-size: 1.1rem; color: #6c757d;">Silakan masukkan password baru Anda.</p>

            <!-- Menampilkan pesan error atau success -->
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            <!-- Garis Pemisah -->
            <hr class="mb-4" style="border: 1px solid #007bff;">

            <!-- Form untuk mengubah password -->
            <form method="POST" action="{{ route('reset.password') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password" class="form-label" style="font-weight: 600; color: #495057;">Password Saat Ini</label>
                    <input type="password" name="current_password" id="current_password" class="form-control w-100" style="border-radius: 10px; padding: 0.75rem;" required>
                    @error('current_password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label" style="font-weight: 600; color: #495057;">Password Baru</label>
                    <input type="password" name="new_password" id="new_password" class="form-control w-100" style="border-radius: 10px; padding: 0.75rem;" required>
                    @error('new_password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label" style="font-weight: 600; color: #495057;">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control w-100" style="border-radius: 10px; padding: 0.75rem;" required>
                </div>

                <!-- Tombol di sebelah kanan -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-dark py-2" style="border-radius: 10px; font-size: 1.1rem;">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Penurunan shadow agar lebih halus */
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        }

        .btn-dark {
            background-color: #43723e;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            padding: 0.75rem;
        }

        .btn-dark:hover {
            background-color: #68745d;
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .alert {
            margin-bottom: 1rem;
        }

        .w-100 {
            width: 100%;
        }

        /* Garis Pemisah */
        hr {
            border: 0;
            height: 1px;
            background-color: #007bff;
        }
    </style> --}}

<div class="min-h-screen bg-gray-50 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
               <!-- Menampilkan pesan error atau success -->
               @if(session('success'))
               <div class="alert alert-success text-center">{{ session('success') }}</div>
           @endif

           @if(session('error'))
               <div class="alert alert-danger text-center">{{ session('error') }}</div>
           @endif
            <!-- Gambar yang ditampilkan di atas logo -->
            <div class="block lg:hidden mb-4">
                <div class="w-full h-56 bg-contain bg-center bg-no-repeat"
                    style="background-image: url('../images/login-icon2.png');">
                </div>
            </div>

            <!-- Logo -->
            <div>
                <img src="{{ asset('images/logo.PNG') }}" style="width: 80%;" class="w-36 mx-auto" />
            </div>

            <!-- Teks Login -->
            <div class="mt-4 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">
                    Reset Password
                </h1>

                <!-- Form -->
                <form action="{{ route('reset.password') }}" method="POST">
                    @csrf
                    <div class="w-full flex-1 mt-8">
                        <div class="mx-auto max-w-xs">
                            <div class="relative w-full mb-6" style="margin-right: 55px">
                                <i
                                    class="bi bi-key absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span
                                    class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <input id="current_password" name="current_password"
                                    class="w-full pl-16 pr-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" placeholder="Masukan Password Saat Ini"
                                    @error('current_password') shake border-red-500 @enderror autofocus />
                            </div>
                            @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="relative w-full mb-6" style="margin-right: 55px">
                                <i
                                    class="bi bi-key absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span
                                    class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <input id="new_password" name="new_password"
                                    class="w-full pl-16 pr-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" placeholder="Masukan Password Baru"
                                    @error('new_password') shake border-red-500 @enderror autofocus />
                            </div>
                            @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="relative w-full mb-6">
                                <i
                                    class="bi bi-key absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span
                                    class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <input id="new_password_confirmation" name="new_password_confirmation"
                                    class="w-full pl-16 pr-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="password" placeholder="Konfirmasi Password Baru"
                                    @error('new_password_confirmation') shake border-red-500 @enderror />
                            </div>
                            @error('new_password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Tombol -->
                            <button type="submit"
                                class="mt-5 tracking-wide font-semibold bg-blue-500 text-gray-100 w-full py-4 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-3">
                                    Masuk
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Gambar Sidebar -->
        <div class="flex-1 bg-blue-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('../images/login-icon2.png'); background-size: 100%; width: 700px;">
            </div>
        </div>
    </div>
</div>
@endsection
