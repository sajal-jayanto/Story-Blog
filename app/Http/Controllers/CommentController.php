<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {

        if(!Auth::user()){
            return redirect()->intended(route('login'));
        }

        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
        ]);
        if (!$validator->fails())
        {
            $comment = new Comment;
            $comment->post_id = $id;
            $comment->user_name = Auth::user()->name;
            $comment->comment = $request->input('comment');
            $comment->save();
            return redirect()->intended(route('posts.show' , $id))->with('success' , 'New Comment Added'); 
        }
        return redirect()->intended(route('posts.show' , $id))->withErrors($validator);
    }
}
