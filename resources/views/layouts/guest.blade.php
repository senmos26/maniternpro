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
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .container {
            width: 1000px; /* Largeur du conteneur */
            height: 400px !important; /* Hauteur du conteneur */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cont{

            width: 55% !important;
            padding: 0 40px 0 40px !important;
        }
        .street{
            width: 100% !important;
            padding: 0;
        }



    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>
    <div class="container mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg cont">
        {{ $slot }}
    </div>
</div>
</body>
</html>
