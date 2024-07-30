<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($service){  
        $service = Service::where('meta_title',$service)->get();
        return view('frontend.product',compact('service'));
    }
}
