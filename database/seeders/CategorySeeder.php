<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\LocalizedCategory;
use Illuminate\Support\Facades\Cache;

class CategorySeeder extends Seeder
{

    // TODO export as utility function
    public static function getLanguage($code){
        return Cache::rememberForever("language-{$code}", function () use ($code) {
            return Language::where('code', $code)->first();
        });
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO make sure all language codes are standard ISO 639-1 codes
        $categoryList = [
            'redstone' => [
                'US' => 'Redstone',
                'FR' => 'Redstone',
                'ES' => 'Redstone',
                'DE' => 'Redstone',
                'NL' => 'Redstone',
                'SV' => 'Redstone',
            ],
            'news' => [
                'US' => 'News',
                'FR' => 'Nouvelles',
                'ES' => 'Noticias',
                'DE' => 'Nachrichten',
                'NL' => 'Nieuws',
                'SV' => 'Nyheter',
            ],
            'build' => [
                'US' => 'Build',
                'FR' => 'Construction',
                'ES' => 'Construcción',
                'DE' => 'Bau',
                'NL' => 'Bouw',
                'SV' => 'Bygg',
            ]
        ];

        foreach ($categoryList as $code => $names) {
            if (Category::where('code', $code)->exists()) {
                continue;
            }
            $category = Category::create([
                'code' => $code,
            ]);
            foreach ($names as $locale => $name) {
                $language = self::getLanguage($locale);
                if (!$language) {
                    continue;
                }
                LocalizedCategory::create([
                    'category_id' => $category->id,
                    'language_id' => $language->id,
                    'name' => $name,
                    'slug' => Str::slug($name . '-' . $locale),
                ]);
            }
        }
    }
}
