<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminAbout;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){ 
        
        $slider = Slider::where('status','=',1)->get(); 
        $experience = AdminAbout::first();
        return view('welcome',compact('slider','experience'));
    }
}
