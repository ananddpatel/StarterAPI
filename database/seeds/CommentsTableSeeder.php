<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,300) as $num) {
        	Comment::create([
        		'blog_id' => rand(1,200),
        		'person_id' => rand(1,50),
        		'body' => $faker->text($maxNbChars = 140)
        	]);
        }
    }
}
