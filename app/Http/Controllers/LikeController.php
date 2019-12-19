<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function like($image_id){
        $user = \Auth::user();

        $isset_like = Like::where('user_id',$user->id)
            ->where('image_id', $image_id)
            ->count();

        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
            $like->save();
            return response()->json([
                'like' => $like
            ]);
        }else {
            return response()->json([
                'like' => 'El like ya existe'
            ]);
        }
    }

    public function dislike($image_id){
        $user = \Auth::user();

        $like = Like::where('user_id',$user->id)
            ->where('image_id', $image_id)
            ->first();

        if($like){
            $like->delete();
            return response()->json([
                'like' => $like,
                'message' => 'Dislike correctamente'
            ]);
        }else {
            return response()->json([
                'like' => 'El like no existe'
            ]);
        }
    }

    public function listLike(){
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);
        return view('like.listLike', [
            'likes' => $likes
        ]);
    }
}
