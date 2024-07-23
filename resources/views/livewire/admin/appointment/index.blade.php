<div>


    <style>
        .truncate-text {
            width: 200px;
            /* white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
        }
    </style>

    @if (session()->has('messege'))
        <div class="alert alert-success text-success" role="alert">{{ session('messege') }}</div>
    @endif
    @if (session()->has('deleted'))
        <div class="alert alert-danger text-danger" role="alert">{{ session('deleted') }}</div>
    @endif

    <div wire:ignore.self class="modal fade" id="DeleteApp" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        Users Appointment
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>User Date</th>
                            <th>Usre Contact</th>
                            <th>User Service</th>
                            <th>User Message</th>
                            <th>View</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($appointment as $a)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $a->appointment_name }}</td>
                                    <td>{{ $a->appointment_date }}</td>
                                    <td>{{ $a->appointment_number }}</td>
                                    <td>{{ $a->appointment_service }}</td>
                                    <td>
                                        <div class="truncate-text" title="{{ $a->appointment_message }}">
                                            {{ $a->appointment_message }}</div>
                                    </td>
                                    <td>
                                        @if ($a->appointment_view == 'seen')
                                            <p class="text text-warning text-center" style="font-size: 20px;">Seen</p>
                                        @else
                                            <button wire:click="appointment_view({{ $a->id }})" type="button"
                                                class="btn btn-outline-success">
                                                Mark as Seen
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="delete({{ $a->id }})" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#DeleteApp">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $appointment->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('model-close', event => {
                $('#DeleteApp').modal('hide');
            });
        </script>
    @endpush
