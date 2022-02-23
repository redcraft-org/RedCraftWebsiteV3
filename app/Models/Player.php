<?php

namespace App\Models;

use App\Models\PlayerLanguage;
use App\Models\PlayerInfoProvider;
use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $hidden = ['id' , 'created_at', 'updated_at', 'playerInfoProviders', 'mainLanguageTrait', 'languagesTrait'];
    protected $appends = ['providers', 'main_language', 'languages'];
    protected $fillable = ['email'];

    public function playerInfoProviders()
    {
        return $this->hasMany(PlayerInfoProvider::class);
    }

    public function mainLanguageTrait()
    {
        return $this->belongsToMany(Language::class)->wherePivot('is_main_language', true);
    }

    public function languagesTrait()
    {
        return $this->belongsToMany(Language::class);
    }

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

    public function getMainLanguageAttribute()
    {
        return $this->mainLanguageTrait->first()->code;
    }

    public function getLanguagesAttribute()
    {
        return $this->languagesTrait->map(function ($language) {
            return $language->code;
        });
    }



}
