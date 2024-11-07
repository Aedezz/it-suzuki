<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body bgcolor="#E2F1E7">
    <div class="navbar bg-gray-800 text-white flex items-center p-4">
        <div class="navbar-links flex gap-10">
            {{-- Icon Home --}}
            <a href="/" class="hover:text-gray-400 flex items-center ml-20">
                <i class="bi bi-house-fill mr-1"></i>
            </a>
            {{-- Menu --}}
            <a href="{{ route('installasi-pc') }}" class="hover:text-gray-400 font-sans">Install Komputer/Laptop</a>
            <a href="{{ route('pembuatan-user') }}" class="hover:text-gray-400 font-sans">Pembuatan User/Reset Password</a>
            <a href="{{ route('perbaikan') }}" class="hover:text-gray-400 font-sans">Perbaikan Perangkat</a>
            <a href="#" class="hover:text-gray-400 font-sans">Download Berita Acara</a>
        </div>
        {{-- Login --}}
        <div class="navbar-logo ml-auto mr-10">
            <a href="{{ route('login') }}" class="text-xl font-bold">Login IT</a>
        </div>        
    </div>