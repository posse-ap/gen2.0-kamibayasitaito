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
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'kohei',
            'email' => 'kohei.s.n@gmail.com',
            'password' => 'password',
        ]);
    }
}
