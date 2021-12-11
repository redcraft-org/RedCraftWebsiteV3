<?php

namespace App\Models;

use App\Models\PlayerLanguage;
use App\Models\PlayerInfoProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    public function playerInfoProviders()
    {
        return $this->hasMany(PlayerInfoProvider::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
