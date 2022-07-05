<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir=rtl data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('favicon-16x16.png') }}">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @vite('resources/css/app.css')
    <!-- Scripts -->
    @routes
    @vite('resources/js/manifest.js')
    @vite('resources/js/vendor.js')
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="font-sans antialiased">
@inertia

@env ('local')
    <script src="{{ config('app.url') }}:3000/browser-sync/browser-sync-client.js"></script>
@endenv
</body>
</html>
