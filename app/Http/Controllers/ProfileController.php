<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $newLocal = App::getLocale();

        Log::info("Locale set to: {$newLocal}");

        return view('profile.show', compact('user', 'student'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        $request->validate([
            'email'       => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'student_id'  => ['required', 'string', 'max:20', Rule::unique('students')->ignore($student->id)],
            'first_name'  => 'required|string|max:50',
            'last_name'   => 'required|string|max:50',
            'program'     => 'nullable|string|max:100',
        ]);

        $fullName = trim($request->first_name . ' ' . $request->last_name);

        $user->update([
            'name' => $fullName,
            'email' => $request->email,
        ]);

        $student->update([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'program'    => $request->program,
        ]);

        
        return redirect()->route('profile.show')->with('success', __('auth.register.update_success'));
    }
}
