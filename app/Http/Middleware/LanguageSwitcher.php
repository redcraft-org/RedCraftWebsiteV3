<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        if ($cookieLanguage) {
            app()->setLocale($cookieLanguage);
            $cookie = cookie('language', $cookieLanguage, 60 * 24 * 7);
            return $next($request)->withCookie($cookie);
        }

        $browserLanguage = $request->getPreferredLanguage();
        $browserLanguage = substr($browserLanguage, 0, 2);
        if ($browserLanguage) {
            app()->setLocale($browserLanguage);
            $cookie = cookie('language', $browserLanguage, 60 * 24 * 7);
            return $next($request)->withCookie($cookie);
        }

        $countryCode = geoip($ip)->iso_code;
        $ipLanguage = self::getLanguageIdFromCountryCode($countryCode);
        if ($ipLanguage) {
            app()->setLocale($ipLanguage);
            $cookie = cookie('language', $ipLanguage, 60 * 24 * 7);
            return $next($request)->withCookie($cookie);
        }
        $cookie = cookie('language', 'en', 60 * 24 * 7);
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
