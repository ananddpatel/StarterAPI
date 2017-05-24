<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 200) as $num) {
	        Blog::create([
	        	'person_id' => rand(1, 50),		
	        	'title' => $faker->sentence($words = 7),
	        	'body' => $faker->paragraph($nbWord = 8, $asText = true)
	        ]);
        }
    }
}
