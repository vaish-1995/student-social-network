<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function setLanguage($locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'fr'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
            $newLocal = App::getLocale();


            Log::info("Locale set to: {$locale} = new local {$newLocal}");
        }else
        {
            Log::warning("Invalid locale attempted: {$locale}");
        }

        return redirect()->back();
    }
}
// This controller allows users to change the application language.
// It checks if the requested locale is supported (in this case, 'en' or 'fr').