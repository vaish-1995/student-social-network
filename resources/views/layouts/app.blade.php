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

<body class="min-h-screen bg-gray-100 text-gray-800">
    @auth
        <!-- Authenticated Layout with Sidebar -->
        <div class="flex h-screen">
            <!-- Sidebar -->
            <aside class="w-80 bg-gradient-to-b from-blue-500 to-blue-600 text-white flex flex-col">
                <div class="p-4 text-2xl font-bold border-b border-blue-400">
                    <div class="relative mb-4 flex items-center space-x-3">
                        <img src="{{ url('/images/logo.png') }}"
                            class="w-12 h-12 rounded-full object-cover border-2 border-white">
                        <h1 class="text-white">{{ __('auth.title') }}</h1>
                    </div>
                </div>

                <nav class="p-4 space-y-2 flex-1"> <!-- Added flex-1 to take remaining space -->
                    <!-- Home -->
                    <a href="{{ url('/home') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-lg hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200">
                        <i class="bi bi-house mr-3 text-xl"></i> {{ __('auth.home') }}
                    </a>

                    <!-- Profile -->
                    <a href="{{ url('/profile') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-lg hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200">
                        <i class="bi bi-server mr-3 text-xl"></i> {{ __('auth.profile') }}
                    </a>

                    <!-- Forum Section Title -->
                    <div class="mt-6 px-4 text-blue-200 uppercase text-sm tracking-wider font-semibold">
                        <i class="bi bi-chat-square-text mr-2"></i> {{ __('auth.forum') }}
                    </div>

                    <!-- List of Forums -->
                    <a href="{{ route('forum.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-lg hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200">
                        <i class="bi bi-list-ul mr-3 text-xl"></i> {{ __('auth.forum_list') }}
                    </a>

                    <!-- About -->
                    <a href="{{ url('/about') }}"
                        class="flex items-center px-4 py-3 rounded-lg text-lg hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200">
                        <i class="bi bi-info-circle mr-3 text-xl"></i> {{ __('auth.about') }}
                    </a>
                </nav>

                <!-- Logout button moved to bottom -->
                <div class="p-4 border-t border-blue-400">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-3 rounded-lg text-lg font-medium text-white hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200 border border-red-400">
                            <i class="bi bi-box-arrow-right mr-3 text-xl"></i> {{ __('auth.logout') }}
                        </button>
                    </form>
                </div>
            </aside>
            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Header -->
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    @auth
                        <p>{{ __('auth.welcome') }}, {{ auth()->user()->name }}!</p>
                    @else
                        <p>Welcome, guest!</p>
                    @endauth
                    <div class="text-lg font-semibold">
                        @yield('header', __('auth.welcome'))
                    </div>
                    <div class="flex items-center gap-4 text-sm relative">
                        <!-- Language Switch -->
                        <div>
                            <a href="{{ route('lang.switch', 'en') }}"
                                class="px-2 {{ app()->getLocale() === 'en' ? 'font-bold underline' : '' }}">EN</a> |
                            <a href="{{ route('lang.switch', 'fr') }}"
                                class="px-2 {{ app()->getLocale() === 'fr' ? 'font-bold underline' : '' }}">FR</a>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear fs-5 text-secondary"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{__('auth.user_profile')}}
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('change.password') }}">
                                        {{__('auth.login.change_password')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </header>

                <main class="p-6 overflow-auto flex-1">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <!-- Guest Layout without Sidebar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <div class="text-lg font-semibold">
                @yield('header', __('auth.welcome'))
            </div>
            <div class="text-sm">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="px-2 {{ app()->getLocale() === 'en' ? 'font-bold underline' : '' }}">EN</a> |
                <a href="{{ route('lang.switch', 'fr') }}"
                    class="px-2 {{ app()->getLocale() === 'fr' ? 'font-bold underline' : '' }}">FR</a>
            </div>
        </header>

        <main class="flex-grow p-6">
            @yield('content')
        </main>
    @endauth

</body>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('settingsDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        const dropdown = document.getElementById('settingsDropdown');
        const button = e.target.closest('button');
        if (!dropdown.contains(e.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</html>