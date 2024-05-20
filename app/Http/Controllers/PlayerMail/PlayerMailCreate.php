<?php

namespace App\Http\Controllers\PlayerMail;

use App\Models\Language;
use App\Models\PlayerMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerMail\PlayerMailCreateRequest;

class PlayerMailCreate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PlayerMailCreateRequest $request)
    {
        $original_language = $request->validated('original_language');
        $original_language_id = Language::getIdFromCode($original_language);
        $mail = PlayerMail::create([
            'sender_uuid' => $request->sender_uuid,
            'recipient_uuid' => $request->recipient_uuid,
            'message' => $request->message,
            'original_language_id' => $original_language_id,
            'sent_at' => $request->sent_at,
            'read_at' => $request->read_at,
        ]);
        return response()->json(json_decode($mail->toJson()), 201);
    }
}
