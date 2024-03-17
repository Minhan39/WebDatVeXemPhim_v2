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

        <!-- Styles -->
        @livewireStyles

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.tailwindcss.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.3.0/css/searchPanes.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css" />
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"></script>
        <script src="https://cdn.datatables.net/searchpanes/2.3.0/js/dataTables.searchPanes.js"></script>
        <script src="https://cdn.datatables.net/searchpanes/2.3.0/js/searchPanes.dataTables.js"></script>
        <script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>
        <script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    </body>
</html>
