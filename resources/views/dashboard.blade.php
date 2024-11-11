@include('layout.navbar')

<div class="car-animation">
    <div class="car"></div>
</div>
<div style="display: flex; justify-content: center; align-items: center; height: 65vh;">
    <div style="margin-bottom: -130px; width: 90%; max-width: 1200px; background-color: #f5f5f5; border-radius: 8px; padding: 50px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: center; position: relative;">
        <h2 class="font-sans text-2xl font-bold absolute top-4 left-6 form-it-title">FORM IT</h2>

        <div class="mt-16 flex justify-center gap-10">
            <!-- Card 1 -->
            <div class="w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="{{ route('pc.create') }}" class="absolute inset-0 z-10"></a>
                <i class="bi bi-file-earmark text-blue-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Install Komputer & Laptop</span>
            </div>
            
            <!-- Card 2 -->
            <div class="w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="pembuatan-user" class="absolute inset-0 z-10"></a>
                <i class="bi bi-file-earmark-text text-green-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Pembuatan User & Reset Password</span>
            </div>
            
            <!-- Card 3 -->
            <div class="w-full md:w-1/3 lg:w-1/3 h-64 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <a href="perbaikan" class="absolute inset-0 z-10"></a>
                <i class="bi bi-file-earmark-word text-red-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <span class="font-sans text-lg text-layer absolute transition-opacity duration-300 ease-in-out opacity-0 hover-info">Perbaikan Perangkat</span>
            </div>

        </div>
    </div>
</div>

<style>
    /* Car Animation at the Bottom */
    .car-animation {
        position: fixed; /* fixed to the bottom of the screen */
        bottom: 0; /* positions it at the bottom */
        left: 0;
        width: 100%;
        height: 100px; /* height of the animation container */
        overflow: hidden; /* prevents overflow of car out of container */
        z-index: -1; /* places it behind the main content */
    }

    .car {
        width: 120px;
        height: 60px;
        background: url('../images/car2.png') no-repeat center center;
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

    .w-full:hover .icon-layer {
        opacity: 0;
    }

    .w-full:hover .text-layer {
        opacity: 1;
        transition: opacity 0.5s ease-out;
    }

    .w-full {
        height: 250px;
    }

    .text-layer {
        font-size: 1.125rem;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px;
        border-radius: 5px;
    }

    .lg\\:w-1\\/3 {
        width: 33.33%;
    }

    .form-it-title {
        padding-bottom: 10px;
    }

    .form-it-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 1300%;
        height: 2px;
        background: black;
        border-radius: 10px;
    }

    .w-full:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border: 2px solid #3498db;
    }
</style>
