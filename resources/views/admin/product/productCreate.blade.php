@extends('layouts.admin') 
@section('content')  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Create Product
                        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h2>
                </div> 
                <div class="card-body">  
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Select Service</label> 
                                <select name="service" class="form-control">
                                    <option value="">Select service</option>
                                    @foreach($service as $s)
                                        <option value="{{ $s->id }}">{{ $s->title }}</option>
                                    @endforeach
                                </select>  
                                @error('service')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Small Title</label> 
                                <input type="text" class="form-control" name="title" oninput="this.value = this.value.slice(0,45)">
                                @error('title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Image</label> 
                                <input type="file" class="form-control" name="product_image">
                                @error('product_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="form-label">Status</label>
                                <input type="checkbox" class="form-check-input form-control" name="status">
                            </div>
                            <div class="col-md-12 my-3">
                                <label class="form-label">Small Description</label> 
                                <textarea name="small_description" rows="3" class="form-control" oninput="this.value = this.value.slice(0,75)"></textarea>
                                @error('small_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>  

                            <div>
                                <button  type="submit" class="btn btn-primary btn-lg float-end">Save</button>
                            </div>

                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection