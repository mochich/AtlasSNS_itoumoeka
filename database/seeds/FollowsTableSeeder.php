<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('follows')->insert(
            [
                'id' => '1',
                'following_id' => '5',
                'followed_id' => '6',
            ]
        );
    }
}
