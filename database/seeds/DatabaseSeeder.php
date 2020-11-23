<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 8; $i++) {
            DB::table('restaurants')->insert(['name' => 'Restaurant ' . $i]);
        }            

		DB::table('days')->insert([
		    ['name' => 'Lundi' ],
		    ['name' => 'Mardi' ],
		    ['name' => 'Mercredi' ],
		    ['name' => 'Jeudi' ],
		    ['name' => 'Vendredi' ],
		    ['name' => 'Samedi' ],
		    ['name' => 'Dimanche' ],
		]);

    }
}
