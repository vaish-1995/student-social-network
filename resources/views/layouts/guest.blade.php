{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-lg font-semibold">
            @yield('header', __('auth.welcome'))
        </div>

        <!-- Language Switcher -->
        <div class="text-sm">
            <a href="{{ route('lang.switch', 'en') }}" class="px-2 {{ app()->getLocale() === 'en' ? 'font-bold underline' : '' }}">EN</a> |
            <a href="{{ route('lang.switch', 'fr') }}" class="px-2 {{ app()->getLocale() === 'fr' ? 'font-bold underline' : '' }}">FR</a>
        </div>
    </header>

    <main class="flex-grow p-6">
        @yield('content')
    </main>
</body>
</html>
