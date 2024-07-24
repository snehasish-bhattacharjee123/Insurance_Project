@extends('layouts.admin') 
@section('content')  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Create About 
                        <a href="{{route('about.index')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h2>
                </div> 
                <div class="card-body">  
                    <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Name</label> 
                                <input type="text" class="form-control" name="name">
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Designation Title</label> 
                                <input type="text" class="form-control" name="Designation_title">
                            </div>

                            <div class="col-md-6 my-3">
                                <label class="form-label">Slider Image</label> 
                                <input type="file" class="form-control" name="slider_image">
                                @error('slider_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 my-3">
                                <label class="form-label">Profile Image</label> 
                                <input type="file" class="form-control" name="profile_image">
                                @error('profile_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Social Media Image</label> 
                                <input type="file" class="form-control" name="image_social">
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Experience</label> 
                                <input type="number" class="form-control" name="experience" oninput="this.value = this.value.slice(0,3)">
                                @error('experience')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Mobile Number</label> 
                                <input type="number" class="form-control" name="number" oninput="this.value = this.value.slice(0,10)">
                                @error('number')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 my-3">
                                <label class="form-label">Heading</label> 
                                <input type="text" class="form-control" name="heading_about">
                                @error('heading_about')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="form-label">Highlight Description</label> 
                                <textarea name="highlight_description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 my-3">
                                <label class="form-label">Description</label> 
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description')
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
