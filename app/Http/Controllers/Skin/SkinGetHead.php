<?php

namespace App\Http\Controllers\Skin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skin\SkinHeadRequest;
use Illuminate\Http\Request;

class SkinGetHead extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SkinHeadRequest $request)
    {
        $uuid = $request->uuid;
        $scale = $request->scale ?? 1;
        $faceGear = $request->faceGear == 'true' ? true : false;
        $response = Cache::remember('skin_head_' . $uuid . '_' . $scale . '_' . $faceGear, config('skin.cache.time'), function () use ($uuid, $scale, $faceGear) {
            try {
                $skin = SkinUtils::getHeadFromUUID($uuid, $scale, $faceGear);
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
