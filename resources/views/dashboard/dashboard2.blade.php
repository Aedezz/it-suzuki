@extends('../dalam/main2')

@section('style')
    <!-- CSS Styling -->
    <style>
        /* Flexbox untuk centering konten secara vertikal dan horizontal */
        body, html {
            height: 100%;  /* Pastikan body dan html memenuhi seluruh tinggi layar */
            margin: 0; /* Menghilangkan margin default */
        }

        .content-wrapper {
            display: flex;
            justify-content: center;  /* Horizontally center */
            align-items: center;  /* Vertically center */
            height: 60%;  /* Full height */
            background-color: #f7f7f7; /* Latar belakang abu-abu terang */
            padding: 20px; /* Padding untuk jarak tepi */
            margin-top: 0; /* Hilangkan margin top agar card lebih dekat ke atas */
        }

        .container {
            padding: 40px;
            background-color: #ffffff; /* Warna putih untuk konten */
            border-radius: 8px; /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            width: 100%; /* Full width */
            max-width: 100%; /* Tidak ada pembatas lebar */
            box-sizing: border-box; /* Agar padding tidak mempengaruhi lebar */
        }

        .display-4 {
            font-size: 3rem;
            font-weight: bold;
        }

        .text-info {
            color: #17a2b8;
        }

        .lead {
            font-size: 1.25rem;
            color: #555; /* Warna teks lebih gelap agar lebih mudah dibaca */
        }

        h1, p {
            color: #333; /* Teks lebih gelap agar kontras */
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container text-center">
            <h1 class="display-4 text-primary">Selamat Datang di </br><span class="text-info">IT System</span></h1> </br>
            <p class="lead">Tempat terbaik untuk mengelola dan mengembangkan sistem informasi. Nikmati pengalaman menggunakan sistem kami.</p>
        </div>
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
