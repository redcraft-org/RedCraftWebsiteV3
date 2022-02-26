<?php

namespace App\Models;

use Attribute;
use App\Traits\Uuids;
use App\Models\PlayerLanguage;
use App\Models\PlayerInfoProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'playerInfoProviders', 'mainLanguageTrait', 'languagesTrait'];
    protected $appends = ['providers', 'main_language', 'languages'];
    protected $fillable = ['email'];

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
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public static function getTrashedPlayerByProviderUuids($provider_uuids)
    {
        $player = self::onlyTrashed()->whereHas('playerInfoProviders', function ($query) use ($provider_uuids) {
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



}
