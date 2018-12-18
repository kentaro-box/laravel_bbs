<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body' => 'kkkkkkkk',
            'postid' => 1,
        ],
        [
            'body' => 'aaaaaaaaaa',
            'postid' => 2,
        ]
    );
    }
}
