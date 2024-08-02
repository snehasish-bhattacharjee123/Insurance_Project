<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){  
        $service = Service::where('status',1)->get(); 
        $about = About::first();
        return view('frontend.service',compact('service','about'));
    }
}
