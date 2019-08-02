<?php

use Illuminate\Database\Seeder;

class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examples')->truncate();
        factory(App\Example::class, 200)->create();
    }
}
