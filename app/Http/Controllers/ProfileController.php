<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        if(auth()->user()->isAdmin()){
            return view('admin.profile');
        } else {
            return view('front.profile');
        }
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|exists:users,email',
            'old_image' => 'nullable|string',
            'old_password' => 'nullable|required_with:new_password|string|min:6',
            'new_password' => 'nullable|required_with:old_password|string|min:6',
            'confirm_password' => 'nullable|required_with:new_password|string|min:6|same:new_password',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->update(['name' => $request->name]);

        if($request->hasFile('image')){
            if(!empty($request->old_image) && Storage::exists($request->old_image)){
                Storage::delete($request->old_image);
            }
            $image = $request->image->store();
            $user->update(['image'=> $image]);
        }

        if((isset($request->old_password) && !empty($request->old_password)) && (isset($request->new_password) && !empty($request->new_password))){
            if(Hash::check($request->old_password, $user->password)){
                $user->update(['password'=> Hash::make($request->new_password)]);
            } else {
                return redirect()->back()->with('error', 'Old password does not match');
            }
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
