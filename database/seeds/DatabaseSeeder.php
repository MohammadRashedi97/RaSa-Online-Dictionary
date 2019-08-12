<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CategoriesTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        $this->call(WordsTableSeeder::class);
        // $this->call(PersianDefinitionTableSeeder::class);
        // $this->call(EnglishDefinitionTableSeeder::class);
        // $this->call(ExampleTableSeeder::class);
    }
}
