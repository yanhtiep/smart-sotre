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
       $id = DB::table('users')->insertGetId([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123'),
            'role' => 'admin'
        ]);

        DB::table('profiles')->insert([
            'firstName' => 'admin',
            'lastName' => 'adminshop',
            'gender' => 'Male',
            'facebook' => 'admin',
            'google' => 'admin',
            'twitter' => 'admin',
            'linkedin' => 'admin',
            'description' => 'preykabas takeo province',
            'dob' => '12:11:1993:2:3:00',
            'avatar' => '',
            'telephone' => '097546783',
            'users_id' => $id
            ]);
    }
}
