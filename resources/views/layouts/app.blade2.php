<aside class="w-80 bg-gradient-to-b from-blue-500 to-blue-600 text-white flex flex-col">
    <div class="p-4 text-2xl font-bold border-b border-blue-400">
        <div class="relative mb-4">
            {{-- <img src="../images" class="w-16 h-16 rounded-full mx-auto mb-2"> --}}
            <h1>{{ __('auth.title') }}</h1>
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

<!-- curent one  -->

<aside class="w-80 bg-gradient-to-b from-blue-500 to-blue-600 text-white">
    <div class="p-4 text-2xl font-bold border-b border-blue-400">
        <div class="relative mb-4 flex items-center space-x-3">
            <img src="{{ url('/images/logo.png') }}"
                class="w-12 h-12 rounded-full object-cover border-2 border-white">
            <h1 class="text-white">{{ __('auth.title') }}</h1>
        </div>
        <nav class="p-4 space-y-2">
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

            <!-- Logout button -->
            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 rounded-lg text-lg font-medium text-white hover:bg-white hover:bg-opacity-20 hover:text-white transition-colors duration-200 border border-red-400">
                    <i class="bi bi-box-arrow-right mr-3 text-xl"></i> {{ __('auth.logout') }}
                </button>
            </form>
        </nav>
</aside>