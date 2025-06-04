<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'student_id' => 'required|string|max:20|unique:students,student_id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:students,email|unique:users,email',
            'program' => 'nullable|string|max:100',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create the student record
        Student::create([
            'user_id' => $user->id,
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'program' => $request->program,
        ]);

        // Optionally log in the user
        auth()->login($user);

        // Redirect to dashboard or home
        return redirect('/home')->with('success', 'Registration successful!');
    }
}
