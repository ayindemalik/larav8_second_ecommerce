@extends('frontend.main_master')

@section('main_content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
        <div class="col-md-2">
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
            </div>
        </div>
    </div>
    
    @include('frontend.body.brands')
    
</div>
  <!-- /.container --> 
</div>

@endsection
