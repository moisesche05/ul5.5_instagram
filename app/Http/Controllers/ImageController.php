<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Comment;
Use App\Like;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        $validate = $this->validate($request, [
            'image_path' => 'required|image',
            'description' => 'required'
        ]);

        $user = \Auth::user();

        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        var_dump($image);

        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();
        return redirect()->route('home')->with([
            'message' => 'La foto ha sido subida correctamente'
        ]);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return Response($file, 200);
    }

    public function detail($id)
    {
        $image = Image::find($id);
        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function delete($id)
    {
        $user = \Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if ($user && $image && $image->users->id == $user->id) {
            if ($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            Storage::disk('images')->delete($image->image_path);

            $image->delete();
            $message = array('message' => 'La imagen se ha borrado corectamente.');
        } else {
            $message = array('message' => 'La imagen no se ha borrado.');
        }

        return redirect()->route('home')->with($message);
    }
}
