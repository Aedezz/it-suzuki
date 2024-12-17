@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: center; height: 65vh; color:;" >
    <div class="form-it-container">
        <h2 class="font-sans text-2xl font-bold form-it-title" style="color: rgb(45, 45, 45)">FORM IT</h2>
        <div class="mt-16 flex justify-center gap-10 card-container">
            <!-- Card 1 -->
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="{{ route('pc.create') }}" class="absolute inset-0 z-10"></a>
                <div class="icon-container">
                    <i class="bi bi-file-earmark text-blue-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                    <span class="text-lg text-gray-600 card-title">Install Komputer & Laptop</span>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="{{ route('pembuatan.create') }}" class="absolute inset-0 z-10"></a>
                <div class="icon-container">
                    <i class="bi bi-file-earmark-text text-green-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                    <span class="text-lg text-gray-600 card-title">Pembuatan User & Reset Password</span>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="perbaikan" class="absolute inset-0 z-10"></a>
                <div class="icon-container">
                    <i class="bi bi-file-earmark-word text-red-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                    <span class="text-lg text-gray-600 card-title">Perbaikan Perangkat</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Styles */
    .card {
        height: 250px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-out; /* Animasi untuk transformasi */
    }

    /* Container untuk ikon dan teks */
    .icon-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Ikon */
    .icon-layer {
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    /* Teks di bawah icon */
    .card-title {
        font-size: 1rem;
        color: rgb(45, 45, 45);
        margin-top: 5px;
        font-weight: 600;
    }

    /* Hover Animasi untuk memperbesar */
    .card:hover {
        transform: scale(1.1); /* Membesarkan card */
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan lebih besar saat hover */
    }

    .form-it-title {
        padding-bottom: 10px;
        font-size: 2rem;
        position: relative;
    }

    .form-it-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: rgb(182, 182, 182);
        border-radius: 10px;
    }

    .form-it-container {
        margin-bottom: -130px;
        width: 90%;
        max-width: 1200px;
        background-color: #f5f5f5;
        border-radius: 8px;
        padding: 50px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        position: relative;
    }

    /* Media Queries for Mobile */
    @media (max-width: 768px) {
        .form-it-container {
            padding: 30px;
            margin-top: 100px;
        }

        .form-it-title {
            font-size: 1.5rem;
            padding-bottom: 5px;
        }

        .card-container {
            flex-direction: column;
            gap: 20px;
        }

        .card {
            height: 200px;
            width: 100%;
        }

        .w-full {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .form-it-title {
            font-size: 1.25rem;
            padding-bottom: 5px;
        }

        .card {
            height: 180px;
        }
    }
</style>

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
