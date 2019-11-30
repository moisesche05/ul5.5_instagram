<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert(array(
            'id' => null,
            'user_id' => '1',
            'image_id' => '4',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('likes')->insert(array(
            'id' => null,
            'user_id' => '2',
            'image_id' => '4',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('likes')->insert(array(
            'id' => null,
            'user_id' => '3',
            'image_id' => '1',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('likes')->insert(array(
            'id' => null,
            'user_id' => '3',
            'image_id' => '2',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('likes')->insert(array(
            'id' => null,
            'user_id' => '2',
            'image_id' => '1',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }
}
