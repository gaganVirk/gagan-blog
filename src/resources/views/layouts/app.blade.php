<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gagan Blog') }}</title>
    <link rel="icon" href="{{ asset('favicon.PNG') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('/css/trix.css') }}">
        <script src="https://hcaptcha.com/1/api.js" async defer></script>  

    </head>
    <body class="min-h-screen font-serif antialiased bg-gray-100">
        <div class="bg-gray-100" id="content">
            @livewire('navigation-dropdown')
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="flex items-center">@include('layouts.footer')</footer>
        @stack('modals')

        @livewireScripts
    </body>
</html>
