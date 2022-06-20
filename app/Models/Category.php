<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['code'];

    // get localized category
    public function localized()
    {
        return $this->hasMany(LocalizedCategory::class);
    }

    // get localized category by language code
    public function localizedByLanguage($languageCode)
    {
        return $this->localized()->where('language_id', Language::getIdFromCode($languageCode));
    }

    // get localized category name by language code
    public function localizedNameByLanguage($languageCode)
    {
        return $this->localizedByLanguage($languageCode)->first()->name;
    }
}
