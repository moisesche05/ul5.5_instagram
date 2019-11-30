<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

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
