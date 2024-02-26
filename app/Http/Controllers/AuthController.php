<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function store(request $request){
        $request->validate([
            'username' =>'required',
            'email' =>'required',
            'password' => 'required|min:4',
        ]);

        $acc = new User;
        $acc->username = $request->username;
        $acc->email = $request->email;
        $acc->password = hash::make($request->password);
        $acc->save();
        return redirect()->route('login');
    }
    public function attempt(request $request){
        $acc = $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!Hash::check($request->password, $user->password)){
            return redirect()->route('login');
        }
        if (Auth::attempt($acc)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
