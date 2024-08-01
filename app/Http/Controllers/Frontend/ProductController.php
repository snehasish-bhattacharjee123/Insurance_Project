<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($service){  
        $service = Service::where('meta_title',$service)->first();  
        $product =  Product::where('service_id','=',$service->id)->get(); 
        return view('frontend.product',compact('service','product'));
    }
}
