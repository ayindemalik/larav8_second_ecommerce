@extends('frontend.main_master')

@section('main_content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
        <div class="col-md-2 "> <br>
            <img class="card-img-top" style="border-radius: 50%" src=" {{!empty($user->profile_photo_path) ?  
                    url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }} "
                alt="User Avatar" style = "width: 100%; height: 100%;" id = "showImage"><br><br>
                @include('frontend.profile.user_menu')                          

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            <div class="card">
                <h3 class="text-center">
                    <span class="text-danger">Hi ...</span>
                    <strong>{{ Auth::user()->name}}</strong> Welcome To Zongo Online market
                </h3>

                <div class="car-body">
                <form class="register-form outer-top-xs"  method="POST" action="{{ route('user.profile.store.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" fsor="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" name="email" value="{{ $user->email }}"  >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input"  name="name" value="{{ $user->name }}"  >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="phone"  name="phone" value="{{ $user->phone }}"  >
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="file" class="form-control unicase-form-control text-input"  name="profile_photo_path"  >
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @include('frontend.body.brands')
    
</div>
  <!-- /.container --> 
</div>

@endsection
