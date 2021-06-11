<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
        <script src="https://kit.fontawesome.com/f437b8be51.js" crossorigin="anonymous"></script>

        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light text-right">
        <x-layouts.sidbar />

        <div class="c-wrapper c-fixed-components">

            <x-jet-banner />
            @livewire('navigation-menu')

            <!-- Page Heading -->
            <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                <div class="container text-center">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="container my-5">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>

        
    </body>
</html>
