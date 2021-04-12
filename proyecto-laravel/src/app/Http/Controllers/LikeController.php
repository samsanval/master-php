<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function like($id)
    {
        $user = \Auth::user();
        $isLike = Like::where('user_id',$user->id)->where('image_id',$id);
        if($isLike)
        {
            return 'Ya existe el like';
        }
        $like = new Like();
        $like->user_id = $user->id;
        $like->image_id = (int)$id;
        $like->save();
        return response()->json([
            'like' => $like,
        ]);

    }
    public function dislike($id)
    {
        $user = \Auth::user();
        $isLike = Like::where('user_id',$user->id)->where('image_id',$id)->first();
        if(!$isLike)
        {
            return 'No existe el like';
        }
        $isLike->delete();
        return response()->json([
            'like' => $isLike,
        ]);

    }

}
