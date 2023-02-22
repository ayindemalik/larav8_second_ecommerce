@extends('dashboard.dashboard_master')
@section('dash_header')
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
        <form class="needs-validation" method="POST" action="{{ route('user.store_password_update') }}">
            @csrf
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- FİRMA ÜNVANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Eski Parol</label>
                                    <input type="password" class="form-control" id="current_password" name="oldpassword" required>
                                    @error('current_password') <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- FİRMA FAALİYET ALANI -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Yeni Parola<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" id= "new_password" name="password" required>
                                    @error('new_password') <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- YILLIK CİRO  -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Yeni Parola Tekrar<span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    @error('password_confirmation') <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <button class="btn btn-primary" type="submit">Kaydet</button>
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