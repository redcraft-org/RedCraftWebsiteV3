<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insertOrIgnore(
            [
                ['name' => 'minecraft'],
                ['name' => 'discord']
            ]
        );
    }
}
