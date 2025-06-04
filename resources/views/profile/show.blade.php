@extends('master')
@section('header', '')


@section('title', __('auth.register.title'))

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">{{ __('auth.user_profile') }}</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>{{ __('auth.register.name') }}</label>
            <input disabled type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>{{ __('auth.register.email') }}</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border p-2 rounded">
        </div>

        <hr class="my-4">

        <div>
            <label>{{ __('auth.register.student_id') }}</label>
            <input type="text" name="student_id" value="{{ old('student_id', $student->student_id) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>{{ __('auth.register.first_name') }}</label>
            <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>{{ __('auth.register.last_name') }}</label>
            <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>{{ __('auth.register.program') }}</label>
            <input type="text" name="program" value="{{ old('program', $student->program) }}" class="w-full border p-2 rounded">
        </div>

        <div class="text-right">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                {{ __('auth.update_button') }}
            </button>
        </div>
    </form>
</div>
@endsection