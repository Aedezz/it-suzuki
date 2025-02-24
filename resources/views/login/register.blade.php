<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System | Register</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .register-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .register-button {
            background-color: #2d3748; /* Ganti dengan warna #2d3748 */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .register-button:hover {
            background-color: #1a202c; /* Ganti dengan warna yang lebih gelap untuk hover */
        }

        .header-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: #2d3748;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2d3748;
        }

        /* Animasi shake untuk input error */
        .shake {
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

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


            <div class="mt-4 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">
                    REGISTRASI
                </h1>

                <!-- Form -->
                <form action="{{ url('regi') }}" method="POST">
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
                                    type="text" placeholder="Masukan Username" value="{{ old('username') }}"
                                    @error('username') shake border-red-500 @enderror autofocus />
                            </div>
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="relative w-full mb-6" style="margin-right: 55px">
                                <i
                                    class="bi bi-person absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span
                                    class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <input id="nama" name="nama"
                                    class="w-full pl-16 pr-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="text" placeholder="Masukan Nama Lengkap" value="{{ old('nama') }}"
                                    @error('nama') shake border-red-500 @enderror autofocus />
                            </div>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="relative w-full mb-6" style="margin-right: 55px">
                                <i class="bi bi-list-ul absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <select name="id_level" id="id_level" required
                                    class="w-full pl-16 pr-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 text-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white transition duration-200 ease-in-out
                                    @error('id_level') shake border-red-500 @enderror"
                                    onchange="this.classList.toggle('text-gray-900', this.value !== '');">
                                    <option value="" disabled selected>Pilih Level</option>
                                    <option value="1" {{ old('id_level') == '1' ? 'selected' : '' }}>ADMIN</option>
                                    <option value="2" {{ old('id_level') == '2' ? 'selected' : '' }}>USER</option>
                                </select>
                                @error('id_level')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>                            
                            
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

                            <div class="relative w-full mb-6">
                                <i
                                    class="bi bi-key absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-2xl"></i>
                                <span
                                    class="absolute left-12 top-1/2 transform -translate-y-1/2 h-6 w-px bg-gray-300"></span>
                                <input id="password_confirmation" name="password_confirmation"
                                    class="w-full pl-16 pr-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="password" placeholder="Konfirmasi Password"
                                    @error('password_confirmation') shake border-red-500 @enderror />
                            </div>
                            @error('password_confirmation')
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
                                    Buat Akun
                                </span>
                            </button>
                            <p class="mt-6 text-gray-600 text-center" style="font-size: 14px">
                                Apabila Anda Sudah Memiliki Akun <br>Silahkan
                                <a href="{{ route('login') }}" class="border-b border-blue-500 border-dotted" style="color: rgb(0, 135, 208)">Login</a>
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

</body>
</html>
