<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tableNames = [
        'people',
        'blogs',
        'comments'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanUp();
        $this->call('PersonsTableSeeder');
        $this->call('BlogsTableSeeder');
        $this->call('CommentsTableSeeder');
    }

    private function cleanUp()
    {
        foreach($this->tableNames as $tableName)
        {
            DB::table($tableName)->truncate();
        }
    }
}
