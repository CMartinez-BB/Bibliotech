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
    {{-- Livewire --}}
</head>

<body class="font-sans text-gray-900 bg-gray-100 antialiased">
    <div class="flex flex-col sm:flex-row h-screen justify-center">
        <div class="relative w-full sm:w-10/12 h-full">
            <div class="bg-cover bg-center h-full"
                style="background-image:url('{{ asset('imgs/backgroun-biblioteca.jpeg') }}');">
                <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-10 z-20 text-white flex flex-col items-start justify-end">
                <h2 class="text-3xl uppercase font-extrabold">Instituto Tecnológico Superior</h2>
                <a href="http://www.itsncg.edu.mx/" target="_blank">De Nuevo Casas
                    Grandes</a>
            </div>
        </div>

        <div class="w-full sm:w-1/2 flex flex-col justify-center items-center mx-auto">
            <div class="mt-8">
                <div class="im-logo">
                    <a href="http://www.itsncg.edu.mx/" target="_blank">
                        <img src="{{ asset('imgs/logo.png') }}" alt="Logo del instituto" class="h-20 mx-auto">
                    </a>
                </div>

                <a href="/">
                    <h1 class="text-3xl">Biblioteca <span class="font-bold">Virtual</span></h1>
                </a>
            </div>
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            <div class="sm:hidden">
                <a href="http://www.itsncg.edu.mx/"><img src="{{ asset('imgs/logo.png') }}" alt="Logo"
                        class="w-16 h-30 p-2"></a>
            </div>
        </div>
    </div>
</body>

</html>