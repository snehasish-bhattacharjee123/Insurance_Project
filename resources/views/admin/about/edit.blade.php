@extends('layouts.admin') 
@section('content')  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Edit About 
                        <a href="{{route('about.index')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h2>
                </div> 
                <div class="card-body">  
                    <form action="{{route('about.update', $edit_about->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Name</label> 
                                <input type="text" class="form-control" name="name" value= {{$edit_about->name}} >
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Designation Title</label> 
                                <input type="text" class="form-control" name="Designation_title"
                                value= {{$edit_about->Designation_title}}>
                            </div>

                            <div class="col-md-6 my-3">
                                <label class="form-label">Slider Image</label> 
                                <input type="file" class="form-control" name="slider_image" 
                                value= {{$edit_about->slider}}>

                                @if(!empty($edit_about->slider))
                                    <img src="{{asset('assets/adminpanel/about/slider/'.$edit_about->slider)}}" class="rounded mx-auto d-block float-start" style="height: 100px; width: 100px;"/>
                                @endif
                                @error('slider_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            
                            <div class="col-md-6 my-3">
                                <label class="form-label">Profile Image</label> 
                                <input type="file" class="form-control" name="profile_image"
                                value= {{$edit_about->image}} >
                                @if(!empty($edit_about->image))
                                    <img src="{{asset('assets/adminpanel/about/profile/'.$edit_about->image)}}" class="rounded mx-auto d-block float-start" style="height: 100px; width: 100px;"/>
                                @endif
                                @error('profile_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 my-3">
                                <label class="form-label">Social Media Image</label> 
                                <input type="file" class="form-control" name="image_social"
                                >
                                @if(!empty($edit_about->image_social))
                                    <img src="{{asset('assets/adminpanel/about/social/'.$edit_about->image_social)}}" class="rounded mx-auto d-block float-start" style="height: 100px; width: 100px;"/>
                                    {{-- <p>{{$edit_about->image_social}} </p> --}}
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Experience</label> 
                                <input type="number" class="form-control" name="experience" oninput="this.value = this.value.slice(0,3)"
                                value= {{$edit_about->experience}}>
                                @error('experience')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Mobile Number</label> 
                                <input type="number" class="form-control" name="phone" oninput="this.value = this.value.slice(0,10)" value= {{$edit_about->number}}>
                                @error('number')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Heading</label> 
                                <input type="text" class="form-control" name="heading_about" 
                                value= {{$edit_about->heading_about}}>
                                @error('heading_about')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="form-label">Highlight Description</label> 
                                <textarea name="highlight_description" rows="3" class="form-control" >{{$edit_about->highlight_description}}</textarea>
                            </div> 
                            <div class="col-md-12 my-3">
                                <label class="form-label">Description</label> 
                                <textarea name="description" rows="3" class="form-control">{{$edit_about->description}}</textarea>
                                @error('description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div> 

                            <div>
                                <button  type="submit" class="btn btn-warning btn-lg float-end">Update</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
