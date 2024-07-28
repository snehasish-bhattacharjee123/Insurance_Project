<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create(){  
        $user = User::first();
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
        $user = User::first(); 

        if ($request->hasFile('profile_image')) {
            $imagePath = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('assets/adminpanel/profile/image'), $imagePath);
            $user->profile_image = $imagePath;
        }
        $user->save(); 
        return redirect()->back()->with('message','Image Uploaded Successfully');
    }
}
