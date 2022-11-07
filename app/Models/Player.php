<?php

namespace App\Models;

use Attribute;
use App\Traits\Uuids;
use App\Models\PlayerInfoProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    use Uuids;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'playerInfoProviders', 'mainLanguageTrait', 'languagesTrait'];
    protected $appends = ['providers', 'main_language', 'languages'];
    protected $fillable = ['email'];

    public static $validationRules = [
        'main_language' => 'required|string|exists:languages,code',
        'email' => 'nullable|email|unique:players',
        'languages' => 'required|array',
        'languages.*' => 'required|string|exists:languages,code',
        'providers' => 'required|array',
        'providers.*.provider_name' => 'required|string|exists:providers,name',
        'providers.*.uuid' => 'required|string|unique_provider_uuid',
        'providers.*.last_username' => 'required|string',
        'providers.*.previous_username' => 'nullable|string',
    ];

    public static $validationMessages = [
        'main_language.required' => 'The main language is required.',
        'main_language.exists' => 'The main language is invalid.',
        'email.email' => 'The email is invalid.',
        'languages.required' => 'The languages are required.',
        'languages.array' => 'The languages must be an array.',
        'languages.*.required' => 'The languages must be an array.',
        'languages.*.exists' => 'The languages are invalid.',
        'providers.required' => 'The providers are required.',
        'providers.array' => 'The providers must be an array.',
        'providers.*.provider_type.required' => 'The provider type is required.',
        'providers.*.provider_type.exists' => 'The provider type is invalid.',
        'providers.*.uuid.required' => 'The provider uuid is required.',
        'providers.*.uuid.unique' => 'The provider uuid is already in use.',
        'providers.*.last_username.required' => 'The provider last username is required.',
        'providers.*.previous_username.string' => 'The provider previous username must be a string.',
    ];

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public static function getPlayerByUuid($uuid, $isProvider = false)
    {
        if ($isProvider) {
            return PlayerInfoProvider::where('provider_uuid', $uuid)->first();
        }
        return self::whereHas('playerInfoProviders', function ($query) use ($uuid) {
            $query->where('provider_uuid', $uuid);
        })->orWhere('id', $uuid)->first();
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public static function getPlayerByProviderUuid($provider_uuid)
    {
        $player = self::whereHas('playerInfoProviders', function ($query) use ($provider_uuid) {
            $query->where('provider_uuid', $provider_uuid);
        })->first();
        return $player;
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public static function getPlayerByProviderUuids($provider_uuids)
    {
        $player = self::whereHas('playerInfoProviders', function ($query) use ($provider_uuids) {
            $query->whereIn('provider_uuid', $provider_uuids);
        })->first();
        return $player;
    }



    /**
     * Get the player info providers associated with the player.
     *
     * @return mixed
     */
    public function playerInfoProviders()
    {
        return $this->hasMany(PlayerInfoProvider::class);
    }

    /**
     * Get the main language associated with the player.
     *
     * @return mixed
     */
    public function mainLanguageTrait()
    {
        return $this->belongsToMany(Language::class)->wherePivot('is_main_language', true);
    }

    /**
     * Get the languages associated with the player.
     *
     * @return mixed
     */
    public function languagesTrait()
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * Get the attributes associated with the provider.
     *
     * @return mixed
     */
    public function getProvidersAttribute()
    {
        return $this->playerInfoProviders->map(function ($provider) {
            return [
                'provider_name' => $provider->provider->name,
                'provider_uuid' => $provider->provider_uuid,
                'last_username' => $provider->last_username,
                'previous_username' => $provider->previous_username,
            ];
        });
    }

    /**
     * Get the attributes associated with the main language.
     *
     * @return mixed
     */
    public function getMainLanguageAttribute()
    {
        return $this->mainLanguageTrait->first()->code;
    }

    /**
     * Get the attributes associated with the languages.
     *
     * @return mixed
     */
    public function getLanguagesAttribute()
    {
        return $this->languagesTrait->map(function ($language) {
            return $language->code;
        });
    }

    public function getMailsAttribute()
    {
        return Mail::where('sender_uuid', $this->id)->get();
    }

    public function getUnreadMailsAttribute()
    {
        return Mail::where('sender_uuid', $this->id)->where('is_read', false)->get();
    }

    public function getSentMailsAttribute()
    {
        return Mail::where('sender_uuid', $this->id)->get();
    }

}
