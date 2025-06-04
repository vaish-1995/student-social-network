@extends('master')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
        <div class="flex flex-col lg:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">

            <!-- Left welcome panel -->
            <div class="lg:w-1/2 bg-blue-600 text-white p-8 flex flex-col justify-center items-center">
                <div class="max-w-md">
                    <h2 class="text-3xl font-bold mb-4">{{ __('auth.register.welcome_title') }}</h2>
                    <p class="text-center mb-6">{{ __('auth.register.welcome_message') }}</p>
                    <a href="{{ route('login') }}"
                        class="block bg-white text-blue-600 px-6 py-2 rounded-full hover:bg-blue-100 text-center font-medium">
                        {{ __('auth.register.already_registered') }}
                    </a>
                </div>
            </div>

            <!-- Right signup form -->
            <div class="lg:w-1/2 p-6 md:p-8 overflow-y-auto" style="max-height: 90vh;">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('auth.register.title') }}</h2>

                    <div class="space-y-4">
                        <!-- Student ID -->
                        <div>
                            <label for="student_id"
                                class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.student_id') }}</label>
                            <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="{{ __('auth.register.student_id_placeholder') }}" required autofocus>
                        </div>

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.first_name') }}</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="{{ __('auth.register.first_name_placeholder') }}" required>
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.last_name') }}</label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="{{ __('auth.register.last_name_placeholder') }}" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="{{ __('auth.register.email_placeholder') }}" required>
                        </div>

                        <!-- Program -->
                        <div>
                            <label for="program"
                                class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.program') }}</label>
                            <input type="text" id="program" name="program" value="{{ old('program') }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="{{ __('auth.register.program_placeholder') }}">
                        </div>

                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.password') }}</label>
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-2 pr-10 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="{{ __('auth.register.password_placeholder') }}" required>
                                <button type="button" onclick="togglePassword('password')"
                                    class="absolute right-3 bottom-2.5 text-gray-500 hover:text-gray-700">
                                    <svg id="password-eye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="relative">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.register.confirm_password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full px-4 py-2 pr-10 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="{{ __('auth.register.confirm_password_placeholder') }}" required>
                                <button type="button" onclick="togglePassword('password_confirmation')"
                                    class="absolute right-3 bottom-2.5 text-gray-500 hover:text-gray-700">
                                    <svg id="confirm-eye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2.5 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-medium">
                        {{ __('auth.register.submit') }}
                    </button>

                    @if ($errors->any())
                        <div class="mt-4 p-4 bg-red-50 rounded-lg">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(`${fieldId}-eye`);

            if (field.type === "password") {
                field.type = "text";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.166-3.283m3.93-2.31a9.958 9.958 0 014.832-1.475c4.478 0 8.268 2.943 9.542 7a9.972 9.972 0 01-4.508 5.568M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                `;
            } else {
                field.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
@endsection