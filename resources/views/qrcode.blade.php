<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Event Job Fair</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div>
            {!! QrCode::size(400)->generate(route('event.qrcheckin', ['id' => $eid])) !!}
        </div>
        //Inside of a blade template.
        {{-- <img src="{!!QrCode::format('png')->generate('Embed me into an e-mail!')!!}"> --}}
    </body>
</html>
