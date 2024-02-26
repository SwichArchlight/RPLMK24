<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('frontend.home',compact('post'));
    }
    public function show($id){
        $post = Post::with('user.profile')->find($id);
        $comment = Comment::where('post_id', $id)->with('user')->get();
        $like = Like::where('post_id', $id);
        $check = Like::where('user_id', Auth::id())->where('post_id',$id)->first();
        if ($check){
            $liked = 1;
        }
        else{
            $liked = 0;
        }
        return view('frontend.show',compact('post','comment','liked','like'));
    }
    public function edit($id){
        $post = Post::find($id);
        $albums = Album::where('user_id', Auth::id())->get();
        $album = Album::find($post->album_id);
        return view('frontend.edit',compact('post','albums','album'));
    }
    public function add_post(){
        $album = Album::where('user_id', Auth::id())->get();
        return view('frontend.add', compact('album'));
    }
    public function store(request $request){
        $post = new Post;
        $post->judul = $request->judul;
        $post->description = $request->deskripsi;
        $post->user_id = Auth::id();    
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('images'), $imagename);
            $post->image = $imagename;
        }
        if($request->album == -1){
            $album = new Album;
            $album->judul = $request->judul_album;
            $album->description = $request->deskripsi_album;
            $album->user_id = Auth::id();
            $album->save();
            $id = Album::latest()->first();
            $post->album_id = $id->id;
        }
        else{
            $post->album_id = $request->album;
        }
        $post->save();
        return redirect()->route('home');
    }

    public function update(request $request, $id){
        $post = Post::find($id);
        $post->judul = $request->judul;
        $post->description = $request->deskripsi;
        if($request->album == -1){
            $album = new Album;
            $album->judul = $request->judul_album;
            $album->description = $request->deskripsi_album;
            $album->user_id = Auth::id();
            $album->save();
            $id = Album::latest()->first();
            $post->album_id = $id->id;
        }
        else{
            $post->album_id = $request->album;
        }
        $post->update();

        return redirect()->route('show',$id);
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
}
