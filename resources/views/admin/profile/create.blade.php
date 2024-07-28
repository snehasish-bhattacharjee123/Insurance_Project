@extends('layouts.admin') 
@section('content') 
<style>
 @media (max-width: 767.98px) {
     .custom-margin {
         margin: 1.5rem 0; /* Equivalent to Bootstrap's my-4 */
     } 
     .field-responsive{ 
        margin-top: 1rem;
     } 
     .input-group {
            position: relative;
        }
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        } 
        .input-group-text {
            background-color: white;
            border-left: 0;
        }

        .form-control {
            border-right: 0;
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
                    <button class="btn btn-primary btn-sm">upload Image <i class="fas fa-arrow-up" style="font-size: 15px; font-weight:700;"></i></button>
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
                            <label class="form-label field-responsive">Email</label>
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

    <div class="d-flex justify-content-center">
            <div class="col-md-7 my-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text text-danger text-sm text-center">Change Your Password</h4>
                </div> 
                <div class="card-body"> 
                    <form action="{{route('profile.password.update')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="form-label">Old Password</label>  
                                <div class="input-group">
                                    <input type="password" class="form-control" name="old_password" value="{{$user->pass_view}}">
                                    <span class="input-group-text">
                                        <i class="eye-icon fas fa-eye-slash"></i>
                                    </span> 
                                </div>
                                @error('old_password') 
                                   <span class="text text-danger">{{$message}}</span> 
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 field-responsive">
                                <label class="form-label">New Password</label> 
                                <div class="input-group"> 
                                    <input type="password" class="form-control" name="new_password">
                                    <span class="input-group-text">
                                        <i class="eye-icon fas fa-eye-slash"></i>
                                    </span>  
                                </div>
                                @error('new_password') 
                                   <span class="text text-danger">{{$message}}</span> 
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 my-4">
                                <label class="form-label">Confirm Password</label> 
                                <div class="input-group">
                                    <input type="password" class="form-control" name="confirm_password"> 
                                    <span class="input-group-text">
                                        <i class="eye-icon fas fa-eye-slash"></i>
                                    </span>  
                                </div>
                                @error('confirm_password') 
                                   <span class="text text-danger">{{$message}}</span> 
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-warning btn-sm float-end">Update Password</button>
                    </form>
                </div>
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
<script>
    $(document).ready(function() {
        $('.eye-icon').on('click', function() {
            const input = $(this).closest('.input-group').find('input');
            const icon = $(this);
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
</script>
@endsection
@endsection