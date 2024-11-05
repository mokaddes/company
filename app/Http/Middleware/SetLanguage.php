<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * use Illuminate\Support\Facades\Session;
     */
    public function handle(Request $request, Closure $next): Response
    {
        $localeLanguage = Session::get('languageName');

        if (! isset($localeLanguage)) { 
            App::setLocale(geDefaultLanguage()->iso_code);
        } else {
            App::setLocale($localeLanguage);
        }

        return $next($request);
    }
}
