<div>  


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
    });
</script>

@endpush