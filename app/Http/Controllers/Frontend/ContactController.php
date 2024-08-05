<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Index(){  
        $about = About::first();
        return view('frontend.contact',compact('about'));
    }
}
