<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request)
    {
        $validate = $this->validate($request,[
            'image_id' => 'required|integer', 'content' => 'required',
            ]
        );
        $userId = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');
        $comment = new Comment();
        $comment->user_id= $userId->id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();

        return redirect()->route('image',['id' => $image_id]);
        return redirect()->route('image',['id' => $image_id]);

    }

    public function delete($id)
    {
        $user = \Auth::user();

        $comment = Comment::find($id);
        if($user && ($comment->user_id === $user->id || $comment->image->user_id === $user->id))
        {
            $comment->delete();
        }
    }
}
