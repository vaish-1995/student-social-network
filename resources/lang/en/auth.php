<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'title' => 'Student Social Network',
    'profile' => 'Profile',
    'email' => 'Email',

    'update_button' => 'Update Profile',

    'failed' => 'These credentials do not match our records.',
    'incorrect_password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'forum_new_post' => 'New Post',
    'no_forum_posts' => 'No forum posts available yet.',

    // Custom messages for student social network
    'login' => [
        'title' => 'Student Login',
        'sign_up' => 'Sign Up',
        'student_id' => 'Student ID',
        'password' => 'Password',
        'remember' => 'Remember Me',
        'forgot' => 'Forgot Password?',
        'submit' => 'Login',
        'no_account' => "Don't have an account?",
        'register' => 'Register here',
        'change_password' => 'Change Password',

    ],

    'register' => [
        'title' => 'Create Student Account',
        'email_address' => 'Email Address',
        'password' => 'Password',
        'confirm_password' => 'Confirm Password',
        'confirm_new_password' => 'Confirm New Password',

        'student_id' => 'Student ID',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'program' => 'Program',
        'name' => 'Full Name',
        'welcome_title' => 'Come join us!',
        'email_placeholder' => 'user@yourmail.com',
        'first_name_placeholder' => 'Jhon',
        'last_name_placeholder' => 'Doe',
        'student_id_placeholder' => '123456',
        'password_placeholder' => 'user@1234',
        'confirm_password_placeholder' => 'Confirm your password',
        'program_placeholder' => 'Enter your study program',
        'submit' => 'Register',
        'already_registered' => 'Already registered?',
        'login' => 'Login here',
        'terms_agree' => 'I agree to the :terms and :privacy',
        'terms' => 'Terms of Service',
        'privacy' => 'Privacy Policy',
        'update_success' => 'Profile updated successfully!',
        'welcome_message' => 'Welcome to our student social network!',
        'validation' => [
            'name_required' => 'The full name field is required.',
            'email_required' => 'The email field is required.',
            'email_email' => 'Please enter a valid email address.',
            'email_unique' => 'This email is already registered.',
            'student_id_required' => 'The student ID field is required.',
            'student_id_unique' => 'This student ID is already registered.',
            'program_required' => 'Please select your study program.',
            'password_required' => 'The password field is required.',
            'password_min' => 'Password must be at least 8 characters.',
            'password_confirmed' => 'Password confirmation does not match.',
        ],
    ],

    'verify' => [
        'title' => 'Verify Email Address',
        'resent' => 'A fresh verification link has been sent to your email address.',
        'check_email' => 'Before proceeding, please check your email for a verification link.',
        'not_receive' => 'If you did not receive the email',
        'request_another' => 'click here to request another',
    ],

    'reset' => [
        'title' => 'Reset Password',

        'password' => 'Password',
        'confirm_password' => 'Confirm Password',
        'submit' => 'Reset Password',
    ],

    'forgot' => [
        'title' => 'Forgot Your Password?',
        'message' => 'Enter your valid email address and we will send you a link to reset your password.',
        'email' => 'Enter Email Address',
        'forgot' => 'Forgot your Password?',
        'submit' => 'Send Password Reset Link',
        'back_to_login' => 'Back to login',
    ],

    'home' => 'Home',
    'user_profile' => 'User Profile',
    'about' => 'About',
    'services' => 'Services',
    'logout' => 'Logout',
    'welcome' => 'Welcome',

    'Forum' => 'Forum',
    'New Post' => 'New Post',
    'Create Post' => 'Create Post',
    'Publish' => 'Publish',
    'Edit' => 'Edit',
    'Delete' => 'Delete',
    'name' => 'Name',
    'forum' => 'Forum',
    'forum_posts' => 'Forum Posts',
    'forum_list' => 'Forum List',
    'welcome_auth' => 'Welcome back, :name!',
    'welcome_guest' => 'Welcome guest! Please login or register.',
    'posted_by' => 'Posted by',
    'settings' => 'Settings',

    'change_password' => [
        'title' => 'Change Password',
        'current_password' => 'Current Password',
        'current_password_placeholder' => 'Enter your current password',
        'new_password' => 'New Password',
        'new_password_placeholder' => 'Create a new password',
        'confirm_password' => 'Confirm New Password',
        'confirm_password_placeholder' => 'Re-enter your new password',
        'password_requirements' => 'Please add all necessary characters to create a secure password:',
        'submit' => 'Update Password',
        'password_updated' => 'Password updated successfully!',
        'requirements' => [
            'min_length' => 'Minimum :length characters',
            'uppercase' => 'One uppercase character (A-Z)',
            'lowercase' => 'One lowercase character (a-z)',
            'special_char' => 'One special character (!@#$%^&*)',
            'number' => 'One number (0-9)',
        ],
    ],
];
