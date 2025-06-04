<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    // Show forgot password form
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Handle email submit
    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email does not exist']);
        }

        session(['password_reset_email' => $user->email]);

        return redirect()->route('change.password');
    }

    // Show change password form
    public function showChangePassword()
    {
        if (auth()->check()) {
            return view('auth.change-password');
        }

        Log::info("Authenticated : " . auth()->check() ? 'true' : 'false');

        if (!session()->has('password_reset_email')) {
            return redirect()->route('forgot.password')->withErrors(['email' => 'Please enter your email first']);
        }

        return view('auth.change-password');
    }

    // Handle change password submission
    public function handleChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = auth()->check()
            ? auth()->user()->email
            : session('password_reset_email');

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('forgot.password')->withErrors(['email' => 'Invalid session, please try again']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget('password_reset_email');

        return redirect()->route('login')->with('success', 'Password changed successfully. Please login.');
    }
}
