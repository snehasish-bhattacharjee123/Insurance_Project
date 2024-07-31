<div>

    @if (session()->has('messege'))
        <div class="alert alert-success text-success" role="alert">{{ session('messege') }}</div>
    @endif

    @if (session()->has('deleted'))
        <div class="alert alert-danger text-danger" role="alert">{{ session('deleted') }}</div>
    @endif

    <div wire:ignore.self class="modal fade" id="DeleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                    <h2>
                        Product
                        <a href="{{ route('product.create') }}" class="btn btn-primary float-end btn-sm">Add Product</a>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Sr No</th>
                                <th>Product Name</th>
                                <th>Title</th>
                                <th>Product Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                @forelse($product as $p)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $p->service->title }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td>
                                            <img src="{{ asset('assets/adminpanel/product/' . $p->product_image) }}"
                                                class="rounded mx-auto d-block" style="height: 100px; width: 100px;" />
                                        </td>
                                        
                                        <td>{{ $p->small_description }}</td>
                                        <td>
                                            @php 
                                                $text = '';
                                                $class = '';
                                            @endphp
                                            @if($p->status == 1)
                                                @php
                                                    $text = 'Active';
                                                    $class = 'success';
                                                @endphp
                                            @else($s->status == 0)
                                                @php 
                                                    $text =  'In Active';
                                                    $class = 'danger';
                                                @endphp
                                            @endif
                                            <p class="text-{{ $class }}">{{ $text }}</p>
                                        </td>
                                        <td>
                                            <a href="{{route('product.edit',$p->id)}}"
                                                class="btn btn-success">Edit</a>
                                            <button wire:click="delete({{ $p->id }})" class="btn btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#DeleteProduct">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text text-info text-center">No Data Available!</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{$product->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('model-close', event => {
            $('#DeleteProduct').modal('hide');
        });
    </script>
@endpush