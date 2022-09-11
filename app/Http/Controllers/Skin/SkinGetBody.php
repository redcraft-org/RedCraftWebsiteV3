<?php

namespace App\Http\Controllers\Skin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Skin\SkinUtils;
use App\Http\Requests\Skin\SkinBodyRequest;

class SkinGetBody extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SkinBodyRequest $request)
    {
        $uuid = $request->uuid;
        $scale = $request->scale ?? 1;
        $gear = $request->gear ?? 0;
        $response = Cache::remember('skin_body_' . $uuid . '_' . $scale . '_' . $gear, config('skin.cache.time'), function () use ($uuid, $scale, $gear) {
            try {
                $skin = SkinUtils::getBodyFromUUID($uuid, $scale, $gear);
            } catch (\Exception $e) {
                // TODO: Sort errors, the mojang skin api might be down
                return response()->json([
                    'errors' => [
                        'uuid' => [
                            'The uuid does not seem to be a valid UUID.'
                        ]
                    ]
                ], 422);
            }
            return response($skin, 200)->header('Content-Type', 'image/png');
        });
        return $response;
    }
}
