<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function custom_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = null;
        if(isset($request->image) && $request->image != null){
            $image = $request->image->store();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => array_flip(User::ROLES)['user'],
            'image' => $image
        ]);

        Mail::to($request->email)->send(new RegisterMail($request->all()));

        return redirect()->route('login')->with('success','User registered successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function custom_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email',$request->email)->first();

        if($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if($user->isAdmin()){
                return redirect()->route('admin.home');
            } else if($user->isUser()){
                return redirect()->route('home');
            }
        } else {
            return back()->with('error','Invalid email or password');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
