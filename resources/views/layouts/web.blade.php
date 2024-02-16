<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SwiftEvent' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')

    @stack('styles')
</head>
<body>
    <header class="py-1 px-3">
       @include('pages.web.includes.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('pages.web.includes.footer')
    </footer>
</body>
</html>
