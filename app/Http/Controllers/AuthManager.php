<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthManager as AuthAuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function register(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('register');
    }

    function loginpost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $crendentials = $request->only('email','password');
        if(Auth::attempt($crendentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Login details are not valid");
    }

    function registerpost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with("error","Registration failed");
        }
        return redirect(route('login'))->with("success","Registration successful, Login to access");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
