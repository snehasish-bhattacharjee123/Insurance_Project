@extends('layouts.admin') 
@section('content') 
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Service 
                        <a href="{{route('service.create')}}" class="btn btn-primary float-end btn-sm"
                        >Add Service</a>
                    </h2>
                </div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Slider Image</th>
                                <th>Meta Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        
                    </div>

                </div>
            </div>
        </div>
    </div> 
@endsection