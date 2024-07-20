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
            'appointment_name' => 'required|string|max:255',
            'appointment_email' => 'required|email|max:255',
            'appointment_number' => 'required|string|max:255',
            'appointment_service' => 'required|string|max:255',
            'appointment_message' => 'nullable|string',

        ]);

    
        $appoinmnet = new Appointment; 

        $appoinmnet->appointment_name = $request->appointment_name;
        $appoinmnet->appointment_email = $request->appointment_email;
        $appoinmnet->appointment_number = $request->appointment_number;
        $appoinmnet->appointment_service = $request->appointment_service;
        $appoinmnet->appointment_message = $request->appointment_message; 

        $appoinmnet->save();
        return response()->json(['message' => 'Your appointment has been scheduled!'], 200);
    }
       
 



    
}
