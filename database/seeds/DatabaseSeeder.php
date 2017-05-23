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
    	App\Person::truncate();
    	$this->call('PersonsTableSeeder');
    }
}
