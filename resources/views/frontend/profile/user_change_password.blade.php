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
                <form method="post" action="{{ route('user.store_password_update') }}" >
                    @csrf   
                    <div class="row">
                    <div class="col-7">						
                        <div class="form-group">
                            <h5>Current  Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="old_password" id="old_password" class="form-control" required="" >
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    <div class="col-7">						
                        <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password" id="password"  class="form-control" required="" > 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    <div class="col-7">						
                        <div class="form-group">
                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" required="">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror  
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-7">						
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Save</button>
                        </div>
                    </div>


                    </div>
						
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
