<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){ 
        // dd('hi');
        return view('admin.service.index');
    } 
    public function create(){ 
        return view('admin.service.create');
    } 
    public function store(Request $request){  
        $request->validate([ 
            'title'=>'required', 
            'meta_title'=> 'required',
            'description'=> 'required',
            'slider_image'=> 'required',
        ]);

        $service = new Service; 
        
        $image = time().'.'.$request->slider_image->extension(); 
        $request->slider_image->move(public_path('assets/adminpanel/service'),$image);

        $service->title = $request->title;
        $service->slider_image = $image;
        $service->description = $request->description;
        $service->meta_title = $request->meta_title; 
        $service->save(); 
        return redirect()->route('service.index')->with('message','Service Created Successfully');
    }

    public function edit($id)
    {
        $edit_service = Service::find($id);
        return view('admin.service.edit', compact('edit_service'));
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

        $service = Service::find($id);

        if (!$service) 
        {
            return redirect()->route('service.index')->with('deleted', 'About information not found.');
        }

        if ($request->hasFile('slider_image')) {
            $imagePath = time() . '.' . $request->slider_image->extension();
            $request->slider_image->move(public_path('assets/adminpanel/service'), $imagePath);
            $service->slider_image = $imagePath;
        }
        

        $service->title = $request->title;
        $service->meta_title = $request->meta_title;
        $service->description = $request->description;
       


        $service->save();

        return redirect()->route('service.index')->with('messege', 'About Added Successfully!');
    }

}
