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
            background: linear-gradient(135deg,
                #e0f2fe 0%,
                #6b8796ff 25%,
                #7dd3fc 50%,
                #38bdf8 75%,
                #0ea5e9 100%);
            min-height: 100vh;
            
        }

        /* ONLY remove background behind the logo */
        nav .shrink-0 a {
            background: transparent !important;
            box-shadow: none !important;
        }
        /* FORCE blue background for Edit button */
.edit-btn {
    background: #2563eb !important;
    color: white !important;
}

/* FORCE red background for Delete button */
.delete-btn {
    background: #dc2626 !important;
    color: white !important;
}

    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
