<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System | Login</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <!-- Gambar yang ditampilkan di atas logo -->
                <div class="block lg:hidden mb-4">
                    <div class="w-full h-52 bg-contain bg-center bg-no-repeat"
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
                        LOGIN
                    </h1>

                    <!-- Form -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="w-full flex-1 mt-8">
                            <div class="mx-auto max-w-xs">
                                <div class="relative w-full mb-6" style="margin-right: 55px">
                                    <i
                                        class="bi bi-at absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                    <span
                                        class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                    <input id="username" name="username"
                                        class="w-full pl-16 pr-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="text" placeholder="Masukan Username"
                                        @error('username') shake border-red-500 @enderror autofocus />
                                </div>
                                @error('username')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror

                                <div class="relative w-full mb-6">
                                    <i
                                        class="bi bi-key absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                    <span
                                        class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                    <input id="password" name="password"
                                        class="w-full pl-16 pr-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="password" placeholder="Masukan Password"
                                        @error('password') shake border-red-500 @enderror />
                                </div>
                                @error('password')
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
                                <p class="mt-6 text-gray-600 text-center" style="font-size: 14px">
                                    Apabila Anda Belum Memiliki Akun <br>Silahkan
                                    <a href="{{ route('register') }}" class="border-b border-blue-500 border-dotted" style="color: rgb(0, 135, 208)">Buat Akun</a>
                                </p>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alert untuk login sukses -->
    @if (session('success'))
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

    <!-- Alert untuk logout sukses -->
    @if (session('logout'))
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

    <!-- Alert untuk login gagal -->
    @if (session('errors'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Maaf Login Gagal!',
                text: 'Periksa Username Dan Password Anda.',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    </body>

</html>
