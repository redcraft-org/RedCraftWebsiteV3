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
        //get available-languages.json file
        $availableLanguages = json_decode(file_get_contents(public_path('available-languages.json')), true);

        //get all languages keys
        $languagesKeys = array_keys($availableLanguages);
        $languages = array_map(function ($item) use (&$availableLanguages) {
            return [
                'name' => $item,
                'code' => $availableLanguages[$item],
            ];
        }, $languagesKeys);
        DB::table('languages')->insert($languages);
    }
}
