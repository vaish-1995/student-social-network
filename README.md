php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan clear-compiled


<!-- to chk logs  -->


if (auth()->check()) {
    return redirect('/home');
}

{{ __('auth.forum_posts') }}

<h2 class="mb-0">{{ __('auth.home') }}</h2>
