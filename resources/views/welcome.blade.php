<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pameran Kesempatan Kerja</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('components.header')

        <div class="relative min-h-screen bg-dots-darker selection:bg-red-500 selection:text-white">
            <div class="p-6 mx-auto max-w-7xl lg:p-8">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-auto h-20 text-sky-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" fill="#FF2D20"/>
                    </svg>
                </div>

                <p class="text-3xl font-black text-center">JOB FAIR</p>

                <div class="mt-16">
                    <livewire:event-public />
                </div>
            </div>

            @include('components.footer')
        </div>
    </body>
</html>
