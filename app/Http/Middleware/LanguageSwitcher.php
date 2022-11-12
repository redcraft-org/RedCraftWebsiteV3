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
        $ip = $request->ip();
        $countryCode = geoip($ip)->iso_code;
        $ipLanguage = self::getLanguageIdFromCountryCode($countryCode);
        $browserLanguage = $request->getPreferredLanguage();
        $browserLanguage = substr($browserLanguage, 0, 2);
        $cookieLanguage = $request->cookie('language');
        if ($cookieLanguage) {
            $language = $cookieLanguage;
        } elseif ($browserLanguage) {
            $language = $browserLanguage;
        } elseif ($ipLanguage) {
            $language = $ipLanguage;
        } else {
            $language = 'en';
        }
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
