{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System | Login</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .login-button {
            background-color: #2d3748;
            /* Ganti dengan warna #2d3748 */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #1a202c;
            /* Ganti dengan warna yang lebih gelap untuk hover */
        }

        .home-button {
            background-color: #388E3C;
            /* Warna hijau tua untuk Home */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #2C6A2D;
            /* Warna hijau lebih gelap saat hover */
        }

        .header-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: #2d3748;
            /* Ganti dengan warna #2d3748 untuk teks header */
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2d3748;
            /* Ganti warna garis bawah dengan #2d3748 */
        }

        /* Animasi shake untuk input error */
        .shake {
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="login-container">
        <div class="text-center mb-6">
            <img src="../images/login/mitra.png" alt="Login Image" class="w-32 h-auto mx-auto mb-4">
            <!-- Judul dengan garis bawah -->
            <h2 class="header-text">Login | IT System</h2>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <input id="username" type="text" name="username" placeholder="Username"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
           @error('username') shake border-red-500 @enderror"
                autofocus>
            @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <input id="password" type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
           @error('password') shake border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-2 gap-4">
                <button type="submit" class="w-full py-2 text-white font-semibold login-button">
                    Log In
                </button>
                <button type="button" onclick="window.location.href='/'"
                    class="w-full py-2 text-white font-semibold home-button">
                    Home
                </button>
            </div>
        </form>
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
                title: 'Login Gagal!',
                text: 'Periksa username dan password Anda.',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System | Login</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- source:https://codepen.io/owaiswiz/pen/jOPvEPB -->
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <!-- Gambar yang ditampilkan di atas logo -->
                <div class="block lg:hidden mb-4">
                    <div class="w-full h-52 bg-contain bg-center bg-no-repeat"
                        style="background-image: url('../images/perbaikan/login-icon2.png');">
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
                                <p class="mt-6 text-xs text-gray-600 text-center">
                                    Apabila Anda Belum Memiliki Akun <br>Silahkan
                                    <a href="#" class="border-b border-gray-500 border-dotted">Buat Akun</a>
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
                title: 'Login Gagal!',
                text: 'Periksa username dan password Anda.',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    </body>

</html>
