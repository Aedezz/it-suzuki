<!DOCTYPE html>
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
      background-color: #2d3748; /* Ganti dengan warna #2d3748 */
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .login-button:hover {
      background-color: #1a202c; /* Ganti dengan warna yang lebih gelap untuk hover */
    }

    .home-button {
      background-color: #388E3C; /* Warna hijau tua untuk Home */
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .home-button:hover {
      background-color: #2C6A2D; /* Warna hijau lebih gelap saat hover */
    }

    .header-text {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 24px;
      color: #2d3748; /* Ganti dengan warna #2d3748 untuk teks header */
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #2d3748; /* Ganti warna garis bawah dengan #2d3748 */
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
        <button type="button" onclick="window.location.href='/'" class="w-full py-2 text-white font-semibold home-button">
            Home
        </button>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Alert untuk login sukses -->
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

<!-- Alert untuk logout sukses -->
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

<!-- Alert untuk login gagal -->
@if(session('errors'))
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
