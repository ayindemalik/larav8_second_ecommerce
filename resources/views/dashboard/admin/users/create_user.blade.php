@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
        <!-- TOP INFO -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- <form class="needs-validation"  method="POST" action="{{ route('register') }}"> -->
        <form class="needs-validation"  method="POST" action="{{ route('admin.store_user') }}">
        
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- USER NAME -->
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="company name" > 
                                        @error('name') <span class="text-danger" role="alert">
                                            <strong>{{$message}}</strong></span>
                                        @enderror
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="example@companyname.com"  >
                                        @error('email') <span class="text-danger" role="alert">
                                            <strong>{{$message}}</strong></span>
                                        @enderror
                                </div>
                            </div>
                            <!-- ŞİRKET TİPİ - SATICI ÜRETİCİ HİZMET HİZMET -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" >
                                        <option selected disabled value="">Choose...</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                        @error('role') <span class="text-danger" role="alert">
                                            <strong>{{$message}}</strong></span>
                                        @enderror
                                </div>
                            </div>
                            <!-- VERGİ NO -->
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"  name="password"  >
                                    @error('password') <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <!-- KURULUŞ TARİHİ  -->
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation">
                                    @error('password_confirmation') <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- SUBMIT -->
                        <div>
                            <button class="btn btn-primary" type="submit">Create User</button>
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

