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

    <style>
        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 25%, #7dd3fc 50%, #38bdf8 75%, #0ea5e9 100%);
            height: 100vh;
            overflow: hidden;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="h-screen flex flex-col sm:justify-center items-center py-6">
        <div class="w-full sm:max-w-md px-6 py-6 bg-white bg-opacity-95 backdrop-blur-lg shadow-2xl overflow-hidden sm:rounded-2xl max-h-[90vh] overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</body>

</html>