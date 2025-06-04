# Laravel Student Social Network - Project Documentation

## Project Setup

1. **Create Laravel Project**
    ```bash
    composer create-project laravel/laravel student-social-network
    cd student-social-network
    php artisan serve
    ```

2. **Configure .env**  
   Update your `.env`:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=student-social-network
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3. **Folder Structure**
    ```
    laravel-auth-app/
    ├── app/
    │   ├── Http/
    │   │   ├── Controllers/
    │   │   │   ├── AuthController.php
    │   │   │   ├── Controller.php
    │   │   │   ├── ForgotPasswordController.php
    │   │   │   ├── ForumPostController.php
    │   │   │   ├── LanguageController.php
    │   │   │   ├── ProfileController.php
    │   │   │   ├── RegisterController.php
    │   │   │   └── ResetPasswordController.php
    │   │   ├── Middleware/
    │   │   │   ├── Authenticate.php
    │   │   │   ├── LocaleMiddleware.php
    │   │   │   ├── RedirectIfAuthenticated.php
    │   │   │   ├── TrustProxies.php
    │   │   │   └── VerifyAjaxRequest.php
    │   │   └── Kernel.php
    │   ├── Models/
    │   │   ├── ForumPost.php
    │   │   ├── Student.php
    │   │   └── User.php
    │   ├── Policies/
    │   │   └── ForumPostPolicy.php
    │   └── Providers/
    │       └── AppServiceProvider.php
    ├── resources/
    │   ├── lang/
    │   │   ├── en/
    │   │   │   ├── about.php
    │   │   │   ├── auth.php
    │   │   │   ├── home.php
    │   │   │   └── forum.php
    │   │   └── fr/
    │   │       ├── about.php
    │   │       ├── auth.php
    │   │       ├── home.php
    │   │       └── forum.php
    ```

4. **Database & Models**
    - Create Migrations:
        ```bash
        php artisan make:migration create_users_table
        php artisan make:migration create_students_table
        php artisan make:migration create_forum_posts_table
        ```
        ForumPost fields: `title_en`, `title_fr`, `content_en`, `content_fr`

5. **Run Migrations**
    ```bash
    php artisan migrate
    ```

6. **Create Models**
    ```bash
    php artisan make:model Student -m
    php artisan make:model ForumPost -m
    ```

7. **Define Relationships**
    - User hasOne Student
    - Student belongsTo User
    - Student hasMany ForumPost
    - ForumPost belongsTo Student

8. **Authentication**
    - Install Laravel Breeze:
        ```bash
        composer require laravel/breeze --dev
        php artisan breeze:install
        npm install && npm run dev
        php artisan migrate
        ```

9. **Localization**
    - Create Language Files:
        ```bash
        mkdir -p resources/lang/en
        mkdir -p resources/lang/fr
        touch resources/lang/en/{auth.php,about.php,home.php,forum.php}
        touch resources/lang/fr/{auth.php,about.php,home.php,forum.php}
        ```
    - Use Middleware or AppServiceProvider to apply user locale.

## Frontend Setup

10. **Install Bootstrap**
    ```bash
    npm install bootstrap@5
    ```

11. **Add to app.js or app.css**
    ```js
    import 'bootstrap/dist/css/bootstrap.min.css';
    import 'bootstrap';
    ```

12. **Create responsive Blade views and nav with language switch.**

## Forum Feature

13. **Create Forum Controller**
    ```bash
    php artisan make:controller ForumPostController --resource
    ```

14. **Add Routes in web.php**
    ```php
    Route::resource('forum-posts', ForumPostController::class)->middleware('auth');
    ```

15. **Validate Bilingual Input**
    ```php
    $request->validate([
        'title_en' => 'required|string|max:255',
        'title_fr' => 'required|string|max:255',
        'content_en' => 'required|string',
        'content_fr' => 'required|string',
    ]);
    ```

## Policies and Middleware

16. **Create Policy**
    ```bash
    php artisan make:policy ForumPostPolicy --model=ForumPost
    ```

17. **Create Middleware**
    ```bash
    php artisan make:middleware LocaleMiddleware
    php artisan make:middleware VerifyAjaxRequest
    ```

18. **Additional Controllers**
    ```bash
    php artisan make:controller AuthController
    php artisan make:controller ProfileController
    php artisan make:controller RegisterController
    php artisan make:controller ResetPasswordController
    php artisan make:controller ForgotPasswordController
    php artisan make:controller LanguageController
    ```

## Version Control

19. **Initialize Git**
    ```bash
    git init
    git add .
    git commit -m "Initial commit with project setup"
    git remote add origin https://github.com/vaish-1995/student-social-network.git
    git push -u origin main
    ```

## Submission

20. **Submit documentation file and GitHub repo link on Moodle.**  
    Ensure all features work and submit before the deadline.
Laravel Student Social Network - Project Documentation
Project Setup

