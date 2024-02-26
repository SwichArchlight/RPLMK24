<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function comment(request $request ,$id){
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }

    public function like($id){
        $liked = Like::where('post_id', $id)->where('user_id', Auth::id())->first();

        if(!$liked){
            $like = new Like;
            $like->user_id = Auth::id();
            $like->post_id = $id;
            $like->save();
        }
        else{
            $liked->delete();
        }

        return back();
    }
}
