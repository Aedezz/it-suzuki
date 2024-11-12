<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT System | Register</title>
    <link rel="icon" href="{{ asset('images/logo-tab.png') }}">
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

<div class="register-container">
  <div class="text-center mb-6">
    <img src="../images/login/mitra.png" alt="Register Image" class="w-32 h-auto mx-auto mb-4">
    <h2 class="header-text">Register | IT System</h2>
  </div>
  
  <form action="{{ url('regi') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <input id="username" type="text" name="username" placeholder="Username"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
               @error('username') shake border-red-500 @enderror" value="{{ old('username') }}" autofocus required>
        @error('username')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input id="nama" type="text" name="nama" placeholder="Nama"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
               @error('nama') shake border-red-500 @enderror" value="{{ old('nama') }}" required>
        @error('nama')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <select name="id_level" id="id_level" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
                @error('id_level') shake border-red-500 @enderror">
            <option value="1" {{ old('id_level') == '1' ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ old('id_level') == '2' ? 'selected' : '' }}>User</option>
        </select>
        @error('id_level')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input id="password" type="password" name="password" placeholder="Password"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent
               @error('password') shake border-red-500 @enderror" required>
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>

    <button type="submit" class="w-full py-2 text-white font-semibold register-button">Register</button>
  </form>

  <div class="text-center mt-6">
    <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-green-500">Login</a></p>
  </div>
</div>

</body>
</html>
