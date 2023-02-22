@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile Picture</h4>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="mt-4 mt-md-0">
                                    <img class="rounded-circle avatar-xl" alt="250x250" 
                                    src="{{ !empty($adminData->profile_photo_path) ?  
                                    url('uploads/admin_images/'.$adminData->profile_photo_path) : url('uploads/no_image.jpg') }}" data-holder-rendered="true">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <br>
                                <h3 class="widget-user-username"><i class="ri-account-circle-line"></i> Admin Name : {{ $adminData->name }}</h3>
                                <h6 class="widget-user-desc"> <i class="ri-mail-send-line"></i> Email : {{ $adminData->email }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer">
                        <div class="text-center">	
                            <a href=" {{ route('admin.edit_profile')}}"><button type="button" class="btn btn-rounded btn-info mb-5 btn-info float-right">Edit Profile</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Permission</h4>
                        <hr>

                    </div>
                </div>
            </div>
        </div>

     

       
    </div>
    
</div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')

</div>

@endsection