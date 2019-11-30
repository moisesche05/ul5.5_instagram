<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'id' => null,
            'role' => 'user',
            'name' => 'Moises',
            'surname' => 'Crisanto',
            'nick' => 'mcrisant',
            'email' => 'mcrisant@crsist.com',
            'password' => '123456',
            'image' => '',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'remember_token' => ''
        ));

        DB::table('users')->insert(array(
            'id' => null,
            'role' => 'user',
            'name' => 'Juan',
            'surname' => 'Lopez',
            'nick' => 'juanlopez',
            'email' => 'juanlopez@crsist.com',
            'password' => '123456',
            'image' => '',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'remember_token' => ''
        ));

        DB::table('users')->insert(array(
            'id' => null,
            'role' => 'user',
            'name' => 'Manolo',
            'surname' => 'Garcia',
            'nick' => 'mgarcia',
            'email' => 'mgarcia@crsist.com',
            'password' => '123456',
            'image' => '',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
            'remember_token' => ''
        ));
    }
}
