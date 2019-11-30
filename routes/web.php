<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Image;

Route::get('/', function () {

    $images = Image::all();

    foreach ($images as $image) {
        echo $image->image_path . "<br>";
        echo $image->description . "<br>";
        echo $image->users->name . ' ' . $image->users->surname . "<br>";

        if (count($image->comments) >= 1) {
            echo "<br><strong>Comentarios</strong><br>";
            foreach ($image->comments as $comment) {
                echo $comment->users->name . ' ' . $comment->users->surname . " : ";
                echo $comment->content . "<br>";
            }
        }
        echo "<br><strong>LIKES: </strong>".count($image->likes). "<br>";
        foreach ($image->likes as $like) {
            echo $like->users->name . ' ' . $like->users->surname . "<br>";
        }
        echo "<hr>";
    }
    die();
    return view('welcome');
});
