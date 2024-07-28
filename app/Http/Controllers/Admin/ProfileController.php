<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create(){  
        $user = Auth::user();
        return view('admin.profile.create',compact('user'));
    } 
    public function store(Request $request){ 
        $request->validate([ 
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'alternate_phone' => 'required',
        ]); 
        $user = User::first(); 

        if(!$user){ 
            $user = new User(); 
            return redirect()->back()->with('message','Data Store Successfully');
        } 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->number = $request->phone; 
        $user->alternate_number = $request->alternate_phone; 

        $user->save(); 
        return redirect()->back()->with('message','Data Updated Successfully');
    } 
    public function image_store(Request $request){   
        $request->validate([
            'profile_image' => 'required',
        ]);
        $user = Auth::user(); 

        if ($request->hasFile('profile_image')) {
            $imagePath = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('assets/adminpanel/profile/image'), $imagePath);
            $user->profile_image = $imagePath;
        }
        $user->save(); 
        return redirect()->back()->with('message','Image Uploaded Successfully');
    } 
    
    public function password_update(Request $request){ 
        $request->validate([
            'old_password' => 'required', 
            'new_password' => 'required', 
            'confirm_password' => 'required|same:new_password',
        ], 
        [
                'confirm_password.same' => 'The new password and confirm password must match'
        ]
    );  
    
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password) || $request->old_password !== $user->pass_view) {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }
    
        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'New password and confirm password do not match']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->pass_view = $request->new_password;
        $user->save();
    
        return redirect()->back()->with('message', 'Password updated successfully');

    }
}
