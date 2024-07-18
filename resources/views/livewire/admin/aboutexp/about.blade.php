<div>  

    @if(session()->has('messege')) 
       <div class="alert alert-success text-success" role="alert">{{session('messege')}}</div> 
    @endif
    @if(session()->has('deleted')) 
       <div class="alert alert-danger text-danger" role="alert">{{session('deleted')}}</div> 
    @endif 

    <div wire:ignore.self class="modal fade" id="DeleteExp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Experience</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>  
                    <form wire:submit.prevent="destroy">
                        <div class="modal-body">
                            <h5 class="text text-warning">Are you sure you want to delete this Data?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @include('livewire.admin.aboutexp.model-form1')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Experience About
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#AddAbout">Add Experience</a>
                    </h2> 
                </div> 
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Sr No</th>
                            <th>About Image</th>
                            <th>About Experience</th>
                            <th>About  Contact</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead> 
                        <tbody> 
                            <?php 
                                $i = 1;
                            ?>
                            @foreach($about as $a)   
                            <tr>  
                                
                                <td>{{ $i++ }}</td> 
                                @php 
                                    $image = json_decode($a->about_image);
                                @endphp 
                                <td><img src="{{ asset('storage/about/' .$image[0] ) }}" class="rounded mx-auto d-block" style="height: 100px; width: 100px; background-size: cover" alt=""></td>
                                <td>{{$a->about_experience}}</td>
                                <td>{{$a->about_contact}}</td>
                                <td>
                                    @php 
                                      $text = '';
                                      $class = ''; 
                                    @endphp 
                                    
                                    @if($a->status == 1) 
                                        @php
                                            $text = 'Active'; 
                                            $class = 'success';  
                                        @endphp
                                    @else($a->status == 0) 
                                        @php 
                                            $text = 'In Active';
                                            $class = 'danger';
                                        @endphp
                                    @endif  
                                <p class="text-{{$class}}">{{$text}}</p>
                            </td>
                                    
                                    
                                     
                            <td>
                                <button wire:click="delete({{$a->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteExp">Delete</button>
                                <button wire:click="edit({{$a->id}})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editExp">Edit</button>
                            </td>

                           
                            </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                    {{$about->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script') 

<script>
    window.addEventListener('model-close',event=>{ 
        $('#AddAbout').modal('hide'); 
        $('#DeleteExp').modal('hide'); 
        $('#editExp').modal('hide'); 
    });
</script>

@endpush