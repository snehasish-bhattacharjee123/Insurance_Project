@extends('layouts.admin') 
@section('content')  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Create About 
                        <a href="{{route('service.index')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h2>
                </div> 
                <div class="card-body">  
                    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Title</label> 
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Slider Image</label> 
                                <input type="file" class="form-control" name="slider_image">
                                @error('slider_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 my-3">
                                <label class="form-label">Meta Title</label> 
                                <input type="text" class="form-control" name="meta_title" oninput="processInput(event)">
                                @error('meta_title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="form-label">Description</label> 
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                            <div class="col-md-6 my-2">
                                <label class="form-label">Status</label>
                                <input type="checkbox" class="form-check-input form-control" name="status">
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

    <script>
        function processInput(event) {
            const input = event.target.value;
            const processedInput = input.replace(/\s+/g, '').toLowerCase();
            event.target.value = processedInput;
        }
    </script>
@endsection
