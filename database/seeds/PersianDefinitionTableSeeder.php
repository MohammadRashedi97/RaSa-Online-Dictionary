<?php

use Illuminate\Database\Seeder;

class PersianDefinitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persian_definitions')->truncate();
        factory(App\PersianDefinition::class, 100)->create();
    }
}
