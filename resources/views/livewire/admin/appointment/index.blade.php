
<div>


<style>
    .truncate-text {
        width: 200px; 
        /* white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
    }
</style>

    @if(session()->has('messege')) 
       <div class="alert alert-success text-success" role="alert">{{session('messege')}}</div> 
    @endif
    @if(session()->has('deleted')) 
       <div class="alert alert-danger text-danger" role="alert">{{session('deleted')}}</div> 
    @endif 

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
                        </thead> 
                        <tbody> 
                            <?php
                                $i = 1;   
                            ?>
                            @foreach($appointment as $a)
                                <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$a->appointment_name}}</td>
                                <td>{{$a->appointment_date}}</td>
                                <td>{{$a->appointment_number}}</td>
                                <td>{{$a->appointment_service}}</td>
                                <td>
                                    <div class="truncate-text" title="{{ $a->appointment_message }}">{{ $a->appointment_message }}</div>
                                </td>
                                <td>
                                @if ($a->appointment_view == 'seen')
                                    <p class="text text-warning text-center" style="font-size: 20px;">Seen</p>
                                @else
                                    <button wire:click="appointment_view({{ $a->id }})" type="button" class="btn btn-outline-success">
                                        Mark as Seen
                                    </button>
                                @endif 
                            </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  

                    {{$appointment->links()}}
                </div>
            </div>
        </div>
    </div>
