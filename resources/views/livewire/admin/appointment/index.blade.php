<div>
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
                            <th>User Email</th>
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
                                <td>{{$a->appointment_email}}</td>
                                <td>{{$a->appointment_number}}</td>
                                <td>{{$a->appointment_service}}</td>
                                <td>{{$a->appointment_message}}</td>
                                <td><button type="button" class="btn btn-outline-success">Seen</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
</div>
