<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Livewire\Admin\AboutExp\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {

        return view('admin.about.index');
    }
    public function create()
    {
        return view('admin.about.about-form');
    }

    public function store(Request $request)
    {
        // dd("hi");

        $validatedData = $request->validate([
            'name' => 'required',
            'slider_image' => 'required',
            'profile_image' => 'required',
            'experience' => 'required',
            'number' => 'required',
            'heading_about' => 'required',
            'about_contact' => 'required',
            'description' => 'required',
        ]);

        // dd($validatedData);

        


        if ($request->hasFile('slider_image')) {
            $validatedData['slider_image'] = $request->file('slider_image')->store('about', 'public');
        }
        if ($request->hasFile('profile_image')) {
            $validatedData['profile_image'] = $request->file('profile_image')->store('about', 'public');
        }
        if ($request->hasFile('image_social')) {
            $validatedData['image_social'] = $request->file('image_social')->store('about', 'public');
        }

       


        $about = About::first();

        // dd($about);
        if (!$about) {
            $about = new About;
        }

        $about->name = $request->name;
        $about->Designation_title = $request->Designation_title;
        $about->slider = $request->slider_image;
        $about->image = $request->profile_image;
        $about->image_social = $request->image_social;
        $about->experience = $request->experience;
        $about->number = $request->number;
        $about->heading_about = $request->heading_about;
        $about->highlight_description = $request->highlight_description;
        $about->description = $request->description;


        $about->save();

        return redirect()->route('about.index')->with('message', 'Experience Added Successfully');
        
    }
}
