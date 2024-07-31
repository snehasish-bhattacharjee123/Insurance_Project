<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product_id, $title, $product_image, $small_description;
    public function index(){ 
        return view('admin.product.index');
    }

    public function create(){  

        $service = Service::where('status',1)->get();
        return view('admin.product.productCreate',compact('service'));
    } 

    public function store(Request $request){ 
        $request->validate([ 
            'service_id' => 'required', //service_id
            'title' => 'required',
            'product_image' => 'required',
            'small_description' => 'required',
        ]);
        $status = $request->status;
        $set_status = 0;
        if($status == 'on'){ 
            $set_status = 1;
        }  
        if($request->product_image){ 
            $image = time().'.'.$request->product_image->extension(); 
            $request->product_image->move(public_path('assets/adminpanel/product'),$image);
        }
        $product = new Product();
        $product->service_id = $request->service_id;
        $product->title = $request->title;
        $product->product_image = $image;
        $product->small_description = $request->small_description;
        $product->status = $set_status; 


        $product->save();
        session()->flash('message','data successfully added');
        return redirect()->route('product.index');

    }

    public function edit($id)
    {
        $service = Service::where('status',1)->get();
        $edit_product = Product::find($id);
        $select_service = $edit_product->service_id;
        return view('admin.product.edit', compact('edit_product','service','select_service'));
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'slider_image' => 'required',
        //     'profile_image' => 'required',
        //     'experience' => 'required',
        //     'phone' => 'required',
        //     'heading_about' => 'required',
        //     'description' => 'required',
        // ]);
        // dd('hi');

        $product = Product::find($id);

        if (!$product) 
        {
            return redirect()->route('product.index')->with('deleted', 'Product information not found.');
        }

        if ($request->hasFile('product_image')) {
            $imagePath = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('assets/adminpanel/product'), $imagePath);
            $product->product_image = $imagePath;
        }
        
        $product->service_id = $request->service_id;
        $product->title = $request->title;
        $product->small_description = $request->small_description;
        $product->status = $request->has('status') ? 1:0;

        $product->save();

        return redirect()->route('product.index')->with('messege', 'Product Updated Successfully!');
    }
}
