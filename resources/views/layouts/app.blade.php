<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <nav class='navbar'>
    <a href="{{ url('/') }}" style='color:white;text-decoration:none;font-weight:bold;'>
        Profil App</a>

    <div style='display:flex;gap:16px;align-items:center;'>

        {{-- Tampilkan nama jika sudah login --}}
        @auth
            <span style='color:#21B0A7;font-size:14px;'>
                Halo, {{ auth()->user()->name }}!</span>

            <a href="{{ route('mahasiswas.index') }}"
               style='color:white;text-decoration:none;font-size:14px;'>
                Daftar Mahasiswa</a>

            <form method='POST' action="{{ route('logout') }}" style='display:inline;'>
                @csrf
                <button type='submit'
                        style='background:transparent;border:1px solid #21B0A7;
                               color:#21B0A7;padding:5px 14px;border-radius:5px;
                               cursor:pointer;font-size:13px;'>
                    Logout</button>
            </form>
        @endauth

        {{-- Tampilkan link login/register jika belum login --}}
        @guest
            <a href="{{ route('login') }}"
               style='color:white;text-decoration:none;font-size:14px;'>Login</a>
            <a href="{{ route('register') }}"
               style='background:#21B0A7;color:white;padding:6px 14px;
                      border-radius:5px;text-decoration:none;font-size:13px;'>
                Register</a>
        @endguest
    </div>
</nav>

</html>
