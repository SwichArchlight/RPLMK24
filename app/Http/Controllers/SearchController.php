<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $album = Album::with('post','user')->get();
        return view('frontend.search', compact('album'));
    }

    public function album($id){
        $album = Album::find($id);
        $post = Post::where('album_id', $id)->get();
        return view('frontend.album', compact('album','post'));
    }
}
