
@include('layout.navbar')
<style>
    /* Car Animation at the Bottom */
    .car-animation {
        position: fixed; /* fixed to the bottom of the screen */
        bottom: 0; /* positions it at the bottom */
        left: 0;
        width: 100%;
        height: 100px; /* height of the animation container */
        overflow: hidden; /* prevents overflow of car out of container */
        z-index: 1; /* places it behind the main content */
    }

    .car {
        width: 200px;
        height: 60px;
        background: url('../images/car-2.png') no-repeat center center;
        background-size: contain;
        position: absolute;
        bottom: 0;
        animation: drive 10s linear infinite;
    }

    @keyframes drive {
        0% {
            left: -120px; /* starts off-screen from left */
        }
        100% {
            left: 100%; /* ends off-screen to the right */
        }
    }

    /* Card Styles */
    .icon-layer {
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    .text-layer {
        transition: opacity 0.3s ease-in-out;
    }

    .card:hover .icon-layer {
        opacity: 0;
    }

    .card:hover .text-layer {
        opacity: 1;
        transition: opacity 0.5s ease-out;
    }

    .card {
        height: 250px;
    }

    .text-layer {
        font-size: 1.125rem;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px;
        border-radius: 5px;
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
        background: rgb(228, 228, 228);
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
            margin-top: 300px
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

        .car {
            width: 80px;
            height: 40px;
        }
        .form-it-container{
            margin-top: 90px;
        }
    }
</style>
<div class="car-animation">
    <div class="car"></div>
</div>

<div style="display: flex; justify-content: center; align-items: center; height: 65vh; color: rgb(0, 0, 0);" >
    <div class="form-it-container">
        <h2 class="font-sans text-3xl font-bold form-it-title" style="color: rgb(45, 45, 45); font-size: 30px; margin-top: -25px">FORM IT</h2>
        <div class="mt-16 flex justify-center gap-10 card-container">
            <!-- Card 1 -->
            
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-white-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="{{ route('pc.create') }}" class="absolute inset-0 z-10"></a>
                <i class="fa-brands fa-instalod text-blue-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Install Komputer & Laptop</span>
            </div>
            
            <!-- Card 2 -->
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-white-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href=" {{ route('pembuatan.create') }}" class="absolute inset-0 z-10"></a>
                <i class="fa-solid fa-user-plus text-green-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Pembuatan User & Reset Password</span>
            </div>
            
            <!-- Card 3 -->
            <div class="card w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-white-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="perbaikan" class="absolute inset-0 z-10"></a>
                <i class="fa-solid fa-screwdriver-wrench text-red-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Perbaikan Perangkat</span>
            </div>

        </div>
    </div>
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
