<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'username' => 'テストユーザー',
                'mail' => 'test@atlasmail.com',
                'password' => bcrypt('testpassword')
            ]
        );
    }
}
