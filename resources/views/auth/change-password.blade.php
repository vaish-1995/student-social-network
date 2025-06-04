@extends('master')

@section('content')
    <div class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">{{ __('auth.change_password.title') }}</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('change.password.submit') }}" onsubmit="return validateForm();">
                @csrf

                <div class="mb-4 relative">
                    <label class="block mb-1 font-medium"
                        for="password">{{ __('auth.change_password.new_password') }}</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" minlength="6" required
                            class="w-full border p-2 rounded pr-10"
                            placeholder="{{ __('auth.change_password.new_password_placeholder') }}">

                        <span class="absolute right-3 top-2.5 cursor-pointer"
                            onclick="togglePassword('password', 'eyeIcon1')">
                            <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="mb-4 relative">
                    <label class="block mb-1 font-medium"
                        for="password_confirmation">{{ __('auth.change_password.confirm_password') }}</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" minlength="6"
                            required class="w-full border p-2 rounded pr-10"
                            placeholder="{{ __('auth.change_password.confirm_password_placeholder') }}">

                        <span class="absolute right-3 top-2.5 cursor-pointer"
                            onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                            <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <p id="password-match-msg" class="text-sm mb-2 text-red-600 hidden">
                    {{ __('auth.change_password.passwords_do_not_match') }}</p>

                <div class="flex items-center justify-between mt-8">
                    <button type="submit" id="submit-btn"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('auth.change_password.submit') }}
                    </button>
                    @if(!auth()->check())
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                            {{ __('auth.forgot.back_to_login') }}
                        </a>
                    @else
                    @endif
                </div>
            </form>
        </div>

        <script>
            function togglePassword(fieldId, iconId) {
                const field = document.getElementById(fieldId);
                const icon = document.getElementById(iconId);

                if (field.type === 'password') {
                    field.type = 'text';
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.042
                            10.042 0 013.437-5.167M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.121 6.121l-18-18" />
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

            function validateForm() {
                const pass = document.getElementById('password').value;
                const confirm = document.getElementById('password_confirmation').value;
                const msg = document.getElementById('password-match-msg');

                if (pass !== confirm) {
                    msg.classList.remove('hidden');
                    return false;
                } else {
                    msg.classList.add('hidden');
                    return true;
                }
            }
        </script>
    </div>
@endsection
