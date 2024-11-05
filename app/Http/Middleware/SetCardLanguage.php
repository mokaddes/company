<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetCardLanguage
{
    /**
     * use Illuminate\Support\Facades\Session;
     */
    public function handle(Request $request, Closure $next): Response
    {
        $localeLanguage = Session::get('cardLang');

        if (! isset($localeLanguage)) { 
            App::setLocale(geDefaultLanguage()->iso_code);
            // App::setLocale('en');
        } else {
            App::setLocale($localeLanguage);
        }
        return $next($request);
    }
}
