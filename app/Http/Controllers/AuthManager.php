<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function home(){
        if(Auth::check()){
            return view('welcome');
        }
        return redirect(route('login'));
    }
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }
    function signup(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('signup');
    }
    function profile(){
        if(Auth::check()){
            return view('profile');
        }
        return redirect(route('login'));
    }
    
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password' =>'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }else{
            return redirect(route('login'))->with("error","Datos nos validos");
        }
    }
    function signupPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=>'required|email|unique:users',
            'password' =>'required'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('signup'))->with("error","Error al registrar por favor intente nuevamente");
        }else{
            return redirect(route('login'))->with("success","Registrado correctamente");
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
