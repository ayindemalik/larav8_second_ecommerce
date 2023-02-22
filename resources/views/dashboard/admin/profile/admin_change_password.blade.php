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
        
    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Mange Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <form class="needs-validation" method="POST" action="{{ route('admin.store_password_update') }}">
            @csrf
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- FİRMA ÜNVANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Current  Password</label>
                                    <input type="text" class="form-control" type="password" name="old_password" id="old_password" placeholder="" required>
                                </div>
                            </div>

                            <!-- FİRMA FAALİYET ALANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">New Passsword<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" id="password"
                                    required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">New Passsword<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                                    required>
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

<!-- End Page-content -->
@include('dashboard.body_layout.footer')

</div>



@endsection