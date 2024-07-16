<div>  


    @include('livewire.admin.aboutexp.model-form1')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        All Slider
                        <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#AddAbout">Add About</a>
                    </h2> 
                </div> 
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Sr No</th>
                            <th>About Experience</th>
                            <th>About Image</th>
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
                                <td><img src="{{ asset('storage/about/' . $a->about_image) }}" class="rounded mx-auto d-block" style="height: 100px; width: 100px; background-size: cover" alt=""></td>
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
    });
</script>

@endpush