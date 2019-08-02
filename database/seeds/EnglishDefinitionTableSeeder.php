<?php

use Illuminate\Database\Seeder;

class EnglishDefinitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('english_definitions')->truncate();
        factory(App\EnglishDefinition::class, 100)->create();
    }
}
