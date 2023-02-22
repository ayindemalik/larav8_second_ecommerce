@extends('dashboard.dashboard_master')

@section('main_header')
    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
    @endphp 

    <div id="layout-wrapper">
        @if($route != 'login')
            @include('dashboard.body_layout.user_header')
        @endif
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.useraccount.user_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
        
    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profil Güncelleme</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Panelim</a></li>
                            <li class="breadcrumb-item active">Profil Güncelleme</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form class="needs-validation" method="POST" action="{{ route('user.profile.store.update') }}">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- FİRMA ÜNVANI -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Adı</label>
                                    <input type="text" class="form-control" id="name" name="name" value = "{{ $user->name }}"
                                        placeholder="FİRMA ÜNVANI" required>
                                </div>
                            </div>

                            <!-- FİRMA FAALİYET ALANI -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id= "email" name="email" value = "{{ $user->email }}"
                                    required>
                                </div>
                            </div>
                            
                            
                            <!-- YILLIK CİRO  -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Profil resmi <span class="text-danger">*</span></label>
                                    <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control">
                                </div>
                            </div>
                            <!-- ADRES -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                <img class="" src=" {{ !empty($user->profile_photo_path) ?  
										url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.png') }} "
									alt="User Avatar" style = "width: 100px; height: 100px;"
									id = "showImage">
                                </div>
                            </div>
                            
                            <div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </form>
    </div>
    
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#profile_photo_path').change(function(ev){
            var reader = new FileReader();
            reader.onload = function(ev){
                $('#showImage').attr('src', ev.target.result);
            }
            reader.readAsDataURL(ev.target.files['0']);
        });
    });
  </script>

<!-- End Page-content -->
@include('dashboard.body_layout.footer')

</div>



@endsection