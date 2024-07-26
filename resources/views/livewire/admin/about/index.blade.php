<div>

    @if (session()->has('messege'))
        <div class="alert alert-success text-success" role="alert">{{ session('messege') }}</div>
    @endif

    @if (session()->has('deleted'))
        <div class="alert alert-danger text-danger" role="alert">{{ session('deleted') }}</div>
    @endif

    <div wire:ignore.self class="modal fade" id="DeleteAbout" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @php
                        $aboutCount = $about->count();
                    @endphp  
                    <h2>About
                        @if($aboutCount >= 1)
                            <a href="{{ route('about.edit', $about->first()->id) }}" class="btn btn-primary btn-sm float-end">Edit About</a>
                        @else
                            <a href="{{ route('about.create') }}" class="btn btn-danger btn-sm float-end">Add About</a>
                        @endif
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
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $a->name }}</td>
                                        <td>
                                            <img src="{{ asset('assets/adminpanel/about/slider/' . $a->slider) }}"
                                                class="rounded mx-auto d-block" style="height: 100px; width: 100px;" />
                                        </td>
                                        <td>
                                            <img src="{{ asset('assets/adminpanel/about/profile/' . $a->image) }}"
                                                class="rounded mx-auto d-block" style="height: 100px; width: 100px;"
                                                alt="" />
                                        </td>
                                        <td>
                                            <img src="{{ asset('assets/adminpanel/about/social/' . $a->image_social) }}"
                                                class="rounded mx-auto d-block" style="height: 100px; width: 100px;"
                                                alt="">
                                        </td>
                                        <td>{{ $a->experience }}</td>
                                        <td>{{ $a->number }}</td>
                                        <td>{{ $a->Designation_title }}</td>
                                        <td>
                                            <a href="{{ route('about.edit', $a->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <button wire:click="delete({{ $a->id }})" class="btn btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#DeleteAbout">Delete
                                            </button>
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
