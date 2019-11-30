<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(array(
            'id' => null,
            'user_id' => '1',
            'image_path' => 'test.jpg',
            'description' => 'Descripcion de la prueba 1',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('images')->insert(array(
            'id' => null,
            'user_id' => '1',
            'image_path' => 'playa.jpg',
            'description' => 'Descripcion de la prueba 2',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('images')->insert(array(
            'id' => null,
            'user_id' => '1',
            'image_path' => 'arena.jpg',
            'description' => 'Descripcion de la prueba 3',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        DB::table('images')->insert(array(
            'id' => null,
            'user_id' => '3',
            'image_path' => 'familia.jpg',
            'description' => 'Descripcion de la prueba 4',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }
}
