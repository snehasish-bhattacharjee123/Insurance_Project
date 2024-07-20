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
                            
                        </tbody>
                    </table> 
</div>
