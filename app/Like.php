<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    //Relacion Many To One / de muchos a uno
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion Many To One / de muchos a uno
    public function images()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
