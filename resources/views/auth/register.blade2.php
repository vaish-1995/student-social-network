





<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <form method="POST" action="{{ url('/register') }}" class="bg-white p-6 rounded shadow-md w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">Sign Up</h2>

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
               class="w-full mb-3 p-2 border rounded" required>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
               class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full mb-3 p-2 border rounded" required>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
            Sign Up
        </button>

        <div class="mt-4 text-center">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
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
    </form>
</body>
</html>



