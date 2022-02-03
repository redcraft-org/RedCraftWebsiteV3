<?php

namespace App\Models;

use App\Models\PlayerLanguage;
use App\Models\PlayerInfoProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['email'];

    public function playerInfoProviders()
    {
        return $this->hasMany(PlayerInfoProvider::class);
    }

    public function mainLanguage()
    {
        //return pivot where is_main_language = true
        return $this->belongsToMany(Language::class)->wherePivot('is_main_language', true);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
