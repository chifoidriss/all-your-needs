<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = Cookie::get('locale');
        $locales = config('app.locales');

        if (!in_array($locale, $locales)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);
        return $next($request);
    }
}
