<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminAbout;
use App\Models\Appointment;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){ 
        
        $slider = Slider::where('status','=',1)->get(); 
        $experience = AdminAbout::first();
        return view('welcome',compact('slider','experience'));
    } 

    public function appoinment(Request $request){ 
        
        $request->validate([ 
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:255',
            'contact_service' => 'required|string|max:255',
            'contact_message' => 'nullable|string',

        ]);

    
        Appointment::create($request->all());
        return redirect()->back()->with('success', 'Your appointment has been scheduled!');
       
 


    }

    
}
