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
        DB::table('languages')->insert([
            ['code' => 'BG', 'name' => 'Bulgarian'],
            ['code' => 'CS', 'name' => 'Czech'],
            ['code' => 'DA', 'name' => 'Danish'],
            ['code' => 'DE', 'name' => 'German'],
            ['code' => 'EL', 'name' => 'Greek'],
            ['code' => 'EN', 'name' => 'English'],
            ['code' => 'ES', 'name' => 'Spanish'],
            ['code' => 'ET', 'name' => 'Estonian'],
            ['code' => 'FI', 'name' => 'Finnish'],
            ['code' => 'FR', 'name' => 'French'],
            ['code' => 'HU', 'name' => 'Hungarian'],
            ['code' => 'IT', 'name' => 'Italian'],
            ['code' => 'JA', 'name' => 'Japanese'],
            ['code' => 'LT', 'name' => 'Lithuanian'],
            ['code' => 'LV', 'name' => 'Latvian'],
            ['code' => 'NL', 'name' => 'Dutch'],
            ['code' => 'PL', 'name' => 'Polish'],
            ['code' => 'PT', 'name' => 'Portuguese'],
            ['code' => 'RO', 'name' => 'Romanian'],
            ['code' => 'RU', 'name' => 'Russian'],
            ['code' => 'SK', 'name' => 'Slovak'],
            ['code' => 'SL', 'name' => 'Slovenian'],
            ['code' => 'SV', 'name' => 'Swedish'],
            ['code' => 'ZH', 'name' => 'Chinese'],
        ]);
    }
}
