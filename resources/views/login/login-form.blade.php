<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login IT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

<div class="w-80 p-6 bg-white shadow-lg rounded-lg text-center">
  <img src="../images/login/mitra.png" alt="Login Image" class="w-full h-auto mb-5">
  
  <h2 class="text-xl font-semibold text-gray-800 mb-6">Login Form IT</h2>   
  
  <form action="{{ route('login_proses') }}" method="POST" class="space-y-4">
    @csrf
    <input type="text" name="username" placeholder="Username"
           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500">
    @error('username')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password"
           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500">
    @error('password')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
    
    <div class="flex space-x-2">
        <button type="submit" style="max-width: 100%; padding: 10px 20px; background-color: #FA812F; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
            Log In
        </button>
      
        <button type="button" onclick="window.location.href='/'" style="max-width: 100%; padding: 10px 20px; background-color: #45a049; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 20px; font-size: 16px;">
            Home
        </button>
    </div>
  </form>
</div>

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
        text: '{{ session('errors') }}', 
        position: 'center',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
@endif


</body>
</html>
