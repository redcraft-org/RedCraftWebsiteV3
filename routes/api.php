<?php

use App\Models\Player;
use App\Models\Language;
use App\Models\PlayerMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsernameUuid;
use App\Http\Controllers\UsernameProfile;
use App\Http\Controllers\Skin\SkinGetBody;
use App\Http\Controllers\Skin\SkinGetHead;
use App\Http\Controllers\Player\PlayerList;
use App\Http\Controllers\UrlListController;
use App\Http\Controllers\Player\PlayerCreate;
use App\Http\Controllers\Player\PlayerDelete;
use App\Http\Controllers\Player\PlayerUpdate;
use App\Http\Controllers\UrlCreateController;
use App\Http\Controllers\Player\PlayerReplace;
use App\Http\Controllers\Player\PlayerRetrieve;
use App\Http\Controllers\Skin\SkinGetIsometric;
use App\Http\Controllers\Player\PlayerAddLanguage;
use App\Http\Controllers\Player\PlayerAddProvider;
use App\Http\Controllers\Player\PlayerGetLanguage;
use App\Http\Controllers\Player\PlayerGetProvider;
use App\Http\Controllers\PlayerMail\PlayerMailGet;
use App\Http\Controllers\PlayerMail\PlayerMailCreate;

Route::middleware('ensure_valid_jwt')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('player')->group(function () {
            Route::get('/list', PlayerList::class);
            Route::get('{uuid}{isProvider?}', PlayerRetrieve::class);
            Route::get('{id}/language', PlayerGetLanguage::class);
            Route::get('{id}/provider', PlayerGetProvider::class);

            Route::post('/', PlayerCreate::class);
            Route::post('{id}', PlayerUpdate::class);
            Route::post('{id}/language', PlayerAddLanguage::class);
            Route::post('{id}/provider', PlayerAddProvider::class);

            Route::delete('{uuid}', PlayerDelete::class);
            Route::put('{uuid}', PlayerReplace::class);
            Route::patch('{uuid}', PlayerUpdate::class);
        });

        Route::prefix('minecraft-username')->group(function () {
            Route::get('{username}/profile', UsernameProfile::class);
            Route::get('{username}/uuid', UsernameUuid::class);
        });

        Route::prefix('language')->group(function () {
            Route::get('/list', function () {
                return response()->json(Language::all(), 200);
            });
        });

        Route::prefix('skin')->group(function () {
            Route::get('/body/{uuid}{scale?}{gear?}', SkinGetBody::class);
            Route::get('/head/{uuid}{scale?}{faceGear?}', SkinGetHead::class);
            Route::get('/isometric/{uuid}{scale?}', SkinGetIsometric::class);
        });

        Route::get('/urls', UrlListController::class);
        Route::post('/url', UrlCreateController::class);

        Route::prefix('skin')->group(function () {
            Route::get('/body/{uuid}{scale?}{gear?}', SkinGetBody::class);
            Route::get('/head/{uuid}{scale?}{faceGear?}', SkinGetHead::class);
            Route::get('/isometric/{uuid}{scale?}', SkinGetIsometric::class);
        });

        Route::prefix('mail')->group(function () {
            Route::get('{uuid}{unreadOnly?}', PlayerMailGet::class);
            Route::post('/create', PlayerMailCreate::class);
            Route::patch('/update', function () {
                return response()->json(PlayerMail::all(), 200);
            });
        });

        Route::get('/urls', UrlListController::class);
        Route::post('/url', UrlCreateController::class);

    });
});
