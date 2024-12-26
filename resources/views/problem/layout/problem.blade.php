<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        @include('layout.menu-navbar')

        <div class="bg-white shadow-md rounded-lg p-6 mx-4 my-6">
            <div class="container mx-auto px-4">
                <!-- Title Section -->
                <h1 class="text-2xl font-bold text-gray-800 mb-6 ml-6"> <!-- Menambahkan ml-6 untuk bergeser ke kanan -->
                    @yield('title', 'Problem')
                </h1>
        
                <!-- Navigation Buttons -->
                <div class="flex justify-start items-center border-b-2 border-gray-200 pb-4 mb-6 mr-6">
                    <!-- Tabel Icon -->
                    <a href="{{ route('problem.index') }}" 
                       class="flex items-center px-6 py-2 text-gray-600 hover:text-blue-600 hover:border-blue-500 border-b-2 border-transparent font-semibold transition-all duration-300 ease-in-out transform hover:scale-105">
                        <!-- Ikon Tabel -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-700 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3zM9 3v18M15 3v18" />
                        </svg>
                        Tabel
                    </a>
                
                    <!-- Chart Icon -->
                    <a href="{{ route('problem.chart') }}" 
                       class="flex items-center px-6 py-2 text-gray-600 hover:text-blue-600 hover:border-blue-500 border-b-2 border-transparent font-semibold transition-all duration-300 ease-in-out transform hover:scale-105">
                        <!-- Ikon Chart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-700 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v12m4-12v12m4-12v12m4-12v12" />
                        </svg>
                        Chart                
                    </a>
                </div>                                                               
        
                <!-- Content -->
                    @yield('content')
            </div>
        </div>        
     </div>        

    <!-- Include Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
</body>
</html>
