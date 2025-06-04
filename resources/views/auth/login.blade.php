@extends('master')
@section('content')

    <div class="flex items-center justify-center h-screen bg-gray-100">

        <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow-md w-96 relative">
            @csrf
            <h2 class="text-2xl font-bold mb-4 text-center">{{ __('auth.login.title') }}</h2>

            <input type="email" name="email" placeholder="{{ __('auth.email') }}" value="{{ old('email') }}"
                class="w-full mb-3 p-2 border rounded" required>

            <div class="relative mb-3">
                <input type="password" id="login-password" name="password" placeholder="{{ __('auth.login.password') }}"
                    class="w-full p-2 border rounded pr-10" required>

                <span class="absolute right-3 top-2.5 cursor-pointer"
                    onclick="togglePassword('login-password', 'loginEyeIcon')">
                    <svg id="loginEyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-5 h-5 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                              9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 
                              0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
            </div>
            @if ($errors->any())
                <div class="text-red-500 text-sm mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                {{ __('auth.login.submit') }}
            </button>

            <div class="mt-4 text-center text-sm">
                <a href="{{ route('forgot.password') }}" class="text-blue-600 hover:underline mr-4">
                    {{ __('auth.login.forgot') }}
                </a>
                |
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline ml-4">
                    {{ __('auth.login.sign_up') }}
                </a>
            </div>


        </form>

        <script>
            function togglePassword(fieldId, iconId) {
                const field = document.getElementById(fieldId);
                const icon = document.getElementById(iconId);

                if (field.type === 'password') {
                    field.type = 'text';
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7
                            a10.042 10.042 0 013.437-5.167M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.121 
                            6.121l-18-18" />
                    `;
                } else {
                    field.type = 'password';
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                            9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 
                            0-8.268-2.943-9.542-7z" />
                    `;
                }
            }
        </script>
    </div>
@endsection