<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('words')->insert([
            [
                'word' => 'Uncategorized',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
