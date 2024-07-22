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
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'number' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'message' => 'nullable|string',

        ]);

    
        $appoinmnet = new Appointment; 

        $appoinmnet->appointment_name = $request->name;
        $appoinmnet->appointment_date = $request->date;
        $appoinmnet->appointment_number = $request->number;
        $appoinmnet->appointment_service = $request->service;
        $appoinmnet->appointment_message = $request->message; 

        $appoinmnet->save();
        return response()->json(['message' => 'Your appointment has been scheduled!'], 200);
    } 
    public function about()
    { 
        return view('frontend.about');
    }
       
 



    
}
