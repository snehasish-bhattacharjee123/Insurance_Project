<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){ 
        return view('admin.product.productIndex');
    }
    public function create(){  
        $service = Service::all();
        return view('admin.product.productCreate',compact('service'));
    } 
    public function store(Request $request){ 
        $request->validate([ 
            'service' => 'required', //service_id
            'title' => 'required',
            'product_image' => 'required',
            'small_description' => 'required',
        ]); 
        dd($request->service);
    }
}
