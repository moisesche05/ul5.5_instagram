<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            ImagesTableSeeder::class,
            CommentsTableSeeder::class,
            LikesTableSeeder::class
        ]);
    }
}
