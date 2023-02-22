@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.useraccount.user_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
        <!-- TOP INFO -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Panelim</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kullanıcılar</a></li>
                            <li class="breadcrumb-item active">Kullanıcı Oluşturma</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form class="needs-validation"  method="POST" action="{{ route('user.store_user') }}">
            @csrf
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tedarikçi İçin Kullanıcı hesabı Oluşturma</h4>
                        <hr>
                        <div class="row">
                            <!-- USER NAME -->
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Şirket Adı</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$formData->company_name}}" readonly required
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
                                    <input type="email" class="form-control" id="email" name="email" value="{{$formData->company_email}}"
                                        placeholder="example@companyname.com" required readonly> 
                                        @error('email') <span class="text-danger" role="alert">
                                            <strong>{{$message}}</strong></span>
                                        @enderror
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Message İçeriği</label>
                                    <textarea id="messsage_content" name="messsage_content" class="form-control" cols="30" rows="3"></textarea>
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

