@extends('../dalam/main2')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 bg-blue-50">
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
    </style>
@endsection
