<div> 

@if (session()->has('messege'))
        <div class="alert alert-success text-success" role="alert">{{ session('messege') }}</div>
@endif

@if (session()->has('deleted'))
        <div class="alert alert-danger text-danger" role="alert">{{ session('deleted') }}</div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>About
                        <a href="{{route('about.create')}}" class="btn btn-danger btn-sm float-end">Add About</a>
                    </h2> 
                </div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Sr No</th> 
                                <th>Name</th>
                                <th>Slider Image</th>
                                <th>Profile Image</th> 
                                <th>Social Media Image</th>
                                <th>Experience</th>
                                <th>Contact</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </thead> 
                            <tbody> 
                                @forelse($about as $a) 
                                    <?php 
                                       $i = 1; 
                                    ?>
                                    <tr>
                                        <td>{{$i++}}</td> 
                                        <td>{{$a->name}}</td>
                                        <td><img src="{{asset('assets/adminpanel/about/slider/'.$a->slider)}}" class="rounded mx-auto d-block" style="height: 100px; width: 100px;"/></td>
                                        <td><img src="{{asset('assets/adminpanel/about/profile/'.$a->image)}}" class="rounded mx-auto d-block" style="height: 100px; width: 100px;" alt=""/></td>
                                        <td><img src="{{asset('assets/adminpanel/about/social/'.$a->image_social)}}" class="rounded mx-auto d-block" style="height: 100px; width: 100px;" alt=""></td>
                                        <td>{{$a->experience}}</td>
                                        <td>{{$a->number}}</td>     
                                        <td>{{$a->Designation_title}}</td>   
                                        <td>
                                            <a href="" class="btn btn-success">Edit</a>
                                            <button class="btn btn-danger my-3">Delete</button>
                                        </td>   
                                    </tr> 
                                @empty 
                                   <p class="text text-info text-center">No Data Available!</p> 
                                @endforelse
                            </tbody> 
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
