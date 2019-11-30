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
        DB::table('comments')->insert(array(
            'id' => null,
            'user_id' => '1',
            'image_id' => '4',
            'content' => 'Buena foto de familia',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('comments')->insert(array(
            'id' => null,
            'user_id' => '2',
            'image_id' => '1',
            'content' => 'Buena foto de Playa',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('comments')->insert(array(
            'id' => null,
            'user_id' => '2',
            'image_id' => '4',
            'content' => 'Que bueno',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }
}
