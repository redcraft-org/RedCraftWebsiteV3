<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $cookieLanguage = $request->cookie('language');
        $cookieLanguage = 'en';
        if ($cookieLanguage) {
            dump($cookieLanguage);
            dump(App::getLocale());
            return self::getNextWithCookie($request, $next, $cookieLanguage);
        }

        $browserLanguage = substr($request->getPreferredLanguage(), 0, 2);
        if ($browserLanguage) {
            return self::getNextWithCookie($request, $next, $browserLanguage);
        }

        $ipLanguage = self::getLanguageIdFromCountryCode(geoip($request->ip())->iso_code);
        if ($ipLanguage) {
            return self::getNextWithCookie($request, $next, $ipLanguage);
        }
        return self::getNextWithCookie($request, $next, 'en');
    }

    public static function getNextWithCookie($request, $next, $language)
    {
        app()->setLocale($language);
        $cookie = cookie('language', $language, 60 * 24 * 7);
        return $next($request)->withCookie($cookie);
    }

    public static function getLanguageIdFromCountryCode($countryCode)
    {
        $array = [
            "US" => "en",
            "GB" => "en",
            "CA" => "en",
            "AU" => "en",
            "FR" => "fr",
            "DE" => "de",
            "ES" => "es",
            "IT" => "it",
        ];
        return $array[$countryCode] ?? 'en';
    }

}
