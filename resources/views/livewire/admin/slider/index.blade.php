<div>  
    
    @if(session()->has('messege')) 
       <div class="alert alert-success text-success" role="alert">{{session('messege')}}</div> 
    @endif
    @if(session()->has('deleted')) 
       <div class="alert alert-danger text-danger" role="alert">{{session('deleted')}}</div> 
    @endif 

    <div wire:ignore.self class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>  
                    <form wire:submit.prevent="destroy">
                        <div class="modal-body">
                            <h5 class="text text-warning">Are you sure you want to delete this Slider?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @include('livewire.admin.slider.model-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        All Slider
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#AddSlider">Add Slider</a>
                    </h2>
                </div> 
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Sr No</th>
                            <th>Slider Image</th>
                            <th>Slider Title</th>
                            <th>Slider Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead> 
                        <tbody> 
                            <?php 
                                $i = 1;
                            ?>
                            @foreach($slider as $s)   
                            <tr>  
                                
                                <td>{{ $i++ }}</td>
                                <td><img src="{{ asset('storage/slider/' . $s->slider_image) }}" class="rounded mx-auto d-block" style="height: 100px; width: 100px; background-size: cover" alt=""></td>
                                <td>{{$s->slider_title}}</td>
                                <td>{{$s->slider_description}}</td>
                                <td>
                                    @php 
                                      $text = '';
                                      $class = ''; 
                                    @endphp 
                                    
                                    @if($s->status == 1) 
                                        @php
                                            $text = 'Active'; 
                                            $class = 'success';  
                                        @endphp
                                    @else($s->status == 0) 
                                        @php 
                                            $text = 'In Active';
                                            $class = 'danger';
                                        @endphp
                                    @endif  
                                <p class="text-{{$class}}">{{$text}}</p>
                            </td>
                                    
                             <td>
                                
                                <button wire:click="delete({{$s->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</button>
                             </td>       
                                     


                           
                            </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                    {{$slider->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script') 

<script>
    window.addEventListener('model-close',event=>{ 
        $('#AddSlider').modal('hide'); 
        $('#DeleteModal').modal('hide'); 
    });
</script>

@endpush