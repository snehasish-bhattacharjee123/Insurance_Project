@extends('layouts.admin') 
@section('content')  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Edit About 
                        <a href="{{route('service.index')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h2>
                </div> 
                <div class="card-body">  
                    <form action="{{route('service.update', $edit_service->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Title</label> 
                                <input type="text" class="form-control" name="title" value={{$edit_service->title}}>
                                @error('title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Slider Image</label> 
                                <input type="file" class="form-control" name="slider_image">
                                @if(!empty($edit_service->slider_image))
                                    <img src="{{asset('assets/adminpanel/service/'.$edit_service->slider_image)}}" class="rounded mx-auto d-block float-start" style="height: 100px; width: 100px;"/>
                                    
                                @endif
                                @error('slider_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 my-3">
                                <label class="form-label">Meta Title</label> 
                                <input type="text" class="form-control" name="meta_title" oninput="processInput(event)" value={{$edit_service->meta_title}}>
                                @error('meta_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="form-label">Description</label> 
                                <textarea name="description" rows="3" class="form-control">{{$edit_service->description}}</textarea>
                                @error('description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div> 

                            <div>
                                <button  type="submit" class="btn btn-primary btn-lg float-end">Update</button>
                            </div>

                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
