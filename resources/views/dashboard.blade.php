@include('layout.navbar')

<div style="display: flex; justify-content: center; align-items: center; height: 65vh;">
    <div style="width: 90%; max-width: 1200px; background-color: #f5f5f5; border-radius: 8px; padding: 50px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: center; position: relative;">
        <h2 class="font-sans text-2xl font-bold absolute top-4 left-6 form-it-title">Form IT</h2>

        <div class="mt-16 flex justify-center gap-10">
            <div class="w-full md:w-1/3 lg:w-1/3 bg-white rounded-lg shadow-md p-10 hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <i class="bi bi-file-earmark text-blue-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <a href="installasi-pc" class="hover:text-gray-400 font-sans text-lg text-layer opacity-0 absolute transition-opacity duration-300 ease-in-out">Install Komputer/Laptop</a>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/3 bg-white rounded-lg shadow-md p-10 hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <i class="bi bi-file-earmark-text text-green-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <a href="pembuatan-user" class="hover:text-gray-400 font-sans text-lg text-layer opacity-0 absolute transition-opacity duration-300 ease-in-out">Pembuatan User/Reset Password</a>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/3 bg-white rounded-lg shadow-md p-10 hover:bg-gray-50 transition duration-200 flex flex-col items-center justify-center relative">
                <i class="bi bi-file-earmark-word text-red-500 text-4xl transition-opacity duration-300 ease-in-out icon-layer"></i>
                <a href="perbaikan" class="hover:text-gray-400 font-sans text-lg text-layer opacity-0 absolute transition-opacity duration-300 ease-in-out">Perbaikan Perangkat</a>
            </div>
        </div>
    </div>
</div>

<style>
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
    }
    .w-full {
        height: 250px; /* Increase height */
    }
    .text-layer {
        font-size: 1.125rem;
    }
    .lg:w-1/3 {
        width: 33.33%; /* Adjusted for wider card */
    }

    /* Linear underline for the Form IT title */
    .form-it-title {
        position: left;
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
</style>
