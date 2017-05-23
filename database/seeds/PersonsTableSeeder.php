<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Person;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,100) as $num) {
        	Person::create([
            	'first' => $faker->firstName,
            	'last' => $faker->lastName,
            	'username' => $faker->userName,
            	'email' => $faker->email,
            	'street_number' => $faker->buildingNumber,
            	'street_name' => $faker->streetName,
            	'state' => $faker->state,
            	'zipcode' => $faker->postcode,
            	'job' => $faker->jobTitle,
            	'phone' => $faker->phoneNumber
        	]);
        }
    }
}
