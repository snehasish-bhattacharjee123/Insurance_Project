<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $request->validate([
            'name' => 'required',
            'slider_image' => 'required',
            'profile_image' => 'required',
            'experience' => 'required',
            'phone' => 'required',
            'heading_about' => 'required',
            'description' => 'required',
        ]);
        

        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        if ($request->hasFile('slider_image')) {
            $imagePath = time() . '.' . $request->slider_image->extension();
            $request->slider_image->move(public_path('assets/adminpanel/about/slider'), $imagePath);
            $about->slider = $imagePath;
        }
        if ($request->hasFile('profile_image')) {
            $imagePath = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('assets/adminpanel/about/profile'), $imagePath);
            $about->image = $imagePath;
        }
        if ($request->hasFile('image_social')) {
            $imagePath = time() . '.' . $request->image_social->extension();
            $request->image_social->move(public_path('assets/adminpanel/about/social'), $imagePath);
            $about->image_social = $imagePath;
        }

        $about->name = $request->name;
        $about->Designation_title = $request->Designation_title;
        $about->experience = $request->experience;
        $about->number = $request->phone;
        $about->heading_about = $request->heading_about;
        $about->highlight_description = $request->highlight_description;
        $about->description = $request->description;


        $about->save();

        return redirect()->route('about.index')->with('messege', 'About Added Successfully!');
    }

    public function edit($id)
    {
        $edit_about = About::find($id);
        return view('admin.about.edit', compact('edit_about'));
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'slider_image' => 'required',
        //     'profile_image' => 'required',
        //     'experience' => 'required',
        //     'phone' => 'required',
        //     'heading_about' => 'required',
        //     'description' => 'required',
        // ]);
        // dd('hi');

        $about = About::find($id);

        if (!$about) 
        {
            return redirect()->route('about.index')->with('deleted', 'About information not found.');
        }

        if ($request->hasFile('slider_image')) {
            $imagePath = time() . '.' . $request->slider_image->extension();
            $request->slider_image->move(public_path('assets/adminpanel/about/slider'), $imagePath);
            $about->slider = $imagePath;
        }
        if ($request->hasFile('profile_image')) {
            $imagePath = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('assets/adminpanel/about/profile'), $imagePath);
            $about->image = $imagePath;
        }
        if ($request->hasFile('image_social')) {
            $imagePath = time() . '.' . $request->image_social->extension();
            $request->image_social->move(public_path('assets/adminpanel/about/social'), $imagePath);
            $about->image_social = $imagePath;
        }

        $about->name = $request->name;
        $about->Designation_title = $request->Designation_title;
        $about->experience = $request->experience;
        $about->number = $request->phone;
        $about->heading_about = $request->heading_about;
        $about->highlight_description = $request->highlight_description;
        $about->description = $request->description;


        $about->save();

        return redirect()->route('about.index')->with('messege', 'About Added Successfully!');
    }
}
