<?php

namespace App\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_uuid',
        'recipient_uuid',
        'message',
        'original_language_id',
        'sent_at',
        'read_at',
    ];

    // the original_language must be present in the languages table under the code column
    public static $validationRules = [
        'sender_uuid' => 'required|uuid',
        'recipient_uuid' => 'required|uuid',
        'message' => 'required|string',
        'original_language' => 'required|string|exists:languages,code',
        'sent_at' => 'required|date',
        'read_at' => 'nullable|date',
    ];

    public static $validationMessages = [
        'sender_uuid.required' => 'The sender UUID is required.',
        'sender_uuid.uuid' => 'The sender UUID must be a valid UUID.',
        'recipient_uuid.required' => 'The recipient UUID is required.',
        'recipient_uuid.uuid' => 'The recipient UUID must be a valid UUID.',
        'message.required' => 'The message is required.',
        'message.string' => 'The message must be a string.',
        'original_language.required' => 'The original language is required.',
        'original_language.exists' => 'The original language is invalid.',
        'sent_at.required' => 'The sent at date is required.',
        'sent_at.date' => 'The sent at date must be a valid date.',
        'read_at.date' => 'The read at date must be a valid date.',
    ];

    protected function originalLanguage()
    {
        return $this->belongsTo(Language::class);
    }

    protected function sender()
    {
        return  Player::getPlayerByUuid($this->sender_uuid);
    }
}
