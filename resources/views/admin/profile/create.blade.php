@extends('layouts.admin') 
@section('content') 
<style>
 @media (max-width: 767.98px) {
     .custom-margin {
         margin: 1.5rem 0; /* Equivalent to Bootstrap's my-4 */
     } 
     .email-responsive{ 
        margin-top: 1rem;
     }
 }
</style>
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-success" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <form action="{{route('profile.image.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="upload" class="from-controll" tabindex="0" style="cursor: pointer;">
                            <img src="{{isset($user)?asset('assets/adminpanel/profile/image/'.$user->profile_image):''}}" alt="" class="d-block rounded-circle img-fluid" id="uploadedAvatar" style="width: 150px; height: 150px; object-fit: cover; background-color: rgba(0, 0, 0, 0.5);">
                            <span class="d-none d-sm-block"></span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                        </label>
                        <input type="file" id="upload" name="profile_image" hidden class="account-file-input" value="" /> 
                    </div>  
                    @error('profile_image') 
                        <span class="text text-danger">{{$message}}</span>
                    @enderror
                    <button class="btn btn-primary btn-sm">upload Image</button>
                </form>
            </div>
        </div>
    </div> 

    <div class="col-md-7 custom-margin">
        <div class="card"> 
            <div class="card-header">
                <h4 class="text text-primary text-sm text-center">Profile Personal Details</h4>
            </div>
            <div class="card-body d-flex">   
                <form action="{{route('profile.store')}}" method="POST"> 
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" required value="{{isset($user)?$user->name:''}}"> 
                            @error('name') 
                               <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label email-responsive">Email</label>
                            <input class="form-control" type="email" name="email" required value="{{isset($user)?$user->email:''}}"> 
                            @error('email') 
                               <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 my-3">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" type="number" name="phone" oninput="this.value = this.value.slice(0, 10)" maxlength="10" required value="{{isset($user)?$user->number:''}}"> 
                            @error('phone') 
                               <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 my-3">
                            <label class="form-label">Alternate Phone Number</label>
                            <input class="form-control" type="number" name="alternate_phone" oninput="this.value = this.value.slice(0, 10)" maxlength="10" required value="{{isset($user)?$user->alternate_number:''}}"> 
                            @error('alternate_phone') 
                               <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-danger btn-sm float-end">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div> 




@section('script')
<script>
    document.getElementById('upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('uploadedAvatar').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script> 
@endsection
@endsection