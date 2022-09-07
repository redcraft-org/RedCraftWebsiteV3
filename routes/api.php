<?php

use App\Models\Language;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Player\PlayerList;
use App\Http\Controllers\Player\PlayerCreate;
use App\Http\Controllers\Player\PlayerDelete;
use App\Http\Controllers\Player\PlayerUpdate;
use App\Http\Controllers\Player\PlayerReplace;
use App\Http\Controllers\Player\PlayerRetrieve;
use App\Http\Controllers\Player\PlayerAddLanguage;
use App\Http\Controllers\Player\PlayerAddProvider;
use App\Http\Controllers\Player\PlayerGetLanguage;
use App\Http\Controllers\Player\PlayerGetProvider;
use App\Http\Controllers\Skin\SkinGetBody;
use App\Http\Controllers\Skin\SkinGetHead;
use App\Http\Controllers\Skin\SkinGetIsometric;

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
    Route::prefix('language')->group(function () {
        Route::get('/list', function () {
            return response()->json(Language::all(), 200);
        });
    });

    Route::prefix('skin')->group(function () {
        Route::get('/body/{uuid}', SkinGetBody::class);
        Route::get('/head/{uuid}{scale?}', SkinGetHead::class);
        Route::get('/isometric/{uuid}{scale?}', SkinGetIsometric::class);
    });
});
