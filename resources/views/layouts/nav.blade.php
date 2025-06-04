{{-- resources/views/layouts/nav.blade.php --}}
@extends('master')

@section('content')
   <div class="flex h-screen bg-gray-100 text-gray-800">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r">
        <div class="p-4 text-xl font-bold border-b">MyApp</div>
        <nav class="p-4 space-y-2">
            <a href="{{ url('/home') }}" class="block px-4 py-2 rounded hover:bg-blue-100">{{ __('auth.home') }}</a>
            <a href="{{ url('/about') }}" class="block px-4 py-2 rounded hover:bg-blue-100">{{ __('auth.about') }}</a>
            <a href="{{ url('/services') }}"
                class="block px-4 py-2 rounded hover:bg-blue-100">{{ __('auth.services') }}</a>
            <a href="{{ route('forum.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">
                Forum
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600">
                    {{ __('auth.logout') }}
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <div class="text-lg font-semibold">
                @yield('header', __('auth.welcome'))
            </div>

            <!-- Language Switcher -->
            <div class="text-sm">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="px-2 {{ app()->getLocale() === 'en' ? 'font-bold underline' : '' }}">EN</a> |
                <a href="{{ route('lang.switch', 'fr') }}"
                    class="px-2 {{ app()->getLocale() === 'fr' ? 'font-bold underline' : '' }}">FR</a>
            </div>
        </header>

        <main class="p-6 overflow-auto flex-1">
            @yield('content')
        </main>
    </div>
</div>
@endsection
