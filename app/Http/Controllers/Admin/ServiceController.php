<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){ 
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
}
