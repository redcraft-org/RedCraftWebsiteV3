<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableLanguages = json_decode(file_get_contents(public_path('available-languages.json')), true);

        $languages = array_map(function ($key, $value) {
            return ['code' => $key, 'name' => $value];
        }, array_keys($availableLanguages), $availableLanguages);

        DB::table('languages')->insertOrIgnore($languages);
    }
}
