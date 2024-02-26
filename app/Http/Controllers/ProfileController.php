<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Error;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username){
        $profile = User::where('username', $username)->with('profile')->first();
        if(!$profile){
            return abort(404);
        }
        else if($profile && !Profile::where('user_id', $profile->id)->first()){
            $new = new Profile;
            $new->description = "No Description";
            $new->profile = 'default.png';
            $new->header = "default.jpg";
            $new->user_id = $profile->id;
            $new->save();
            return redirect()->route('profile', $username);
        }
        else{
            $post = Post::where('user_id', $profile->id)->get();
            return view('frontend.profile',compact('profile','post'));   
        }
    }

    public function edit($id){   
        $profile = Profile::find($id);
        $safe =  $profile->user_id == Auth::id();
        if($safe){
            return view('frontend.edit-profile',compact('profile'));
        }
        return redirect()->route('home');
    }

    public function update(Request $request, $id){
        $profile = Profile::find($id);
        if($request->hasFile('profile')){
            $image = $request->file('profile');
            $profilename = $image->getClientOriginalName();
            $image->move(public_path('profile'), $profilename);
            $profile->profile = $profilename;
        }
        if($request->hasFile('header')){
            $image = $request->file('header');
            $imagename = $image->getClientOriginalName();
            $image->move(public_path('header'), $imagename);
            $profile->header = $imagename;
        }
        $profile->description = $request->deskripsi;
        $profile->save();
        return redirect()->route('profile', $profile->user->username);
    }
}
