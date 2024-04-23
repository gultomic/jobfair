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

                <div class="my-16">
                    <p class="py-4 text-2xl font-semibold tracking-wide text-center sm:text-justify">Layanan Kami</p>

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 justify-stretch">
                        <a href="https://paskerid.kemnaker.go.id/layanan-detail/4273f2f2-ded5-4710-9931-31a78adf0112" class="py-8 border rounded-md hover:border-gray-400 group">
                            <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/4273f2f2-ded5-4710-9931-31a78adf0112_Logo SIAPkerja.png" alt="siapkerja">
                            <p class="pt-4 text-center group-hover:text-blue-600">SIAPKerja</p>
                        </a>
                        <a href="https://paskerid.kemnaker.go.id/layanan-detail/ea93475e-54d2-4358-b295-9a72d4c77015" class="py-8 border rounded-md hover:border-gray-400 group">
                            <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/ea93475e-54d2-4358-b295-9a72d4c77015_Logo Karirhub.png" alt="siapkerja">
                            <p class="pt-4 text-center group-hover:text-blue-600">Karirhub</p>
                        </a>
                        <a href="https://paskerid.kemnaker.go.id/layanan-detail/173e7033-8219-4ddf-809c-ec5f067d718d" class="py-8 border rounded-md hover:border-gray-400 group">
                            <img class="h-12 mx-auto" src="https://paskerid.kemnaker.go.id/storage/173e7033-8219-4ddf-809c-ec5f067d718d_Logo Talenthub.png" alt="siapkerja">
                            <p class="pt-4 text-center group-hover:text-blue-600">Talenthub</p>
                        </a>
                    </div>
                </div>
            </div>

            @include('components.footer')
        </div>
    </body>
</html>
