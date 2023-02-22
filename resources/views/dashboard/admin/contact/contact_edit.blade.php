@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.admin_header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <div class="main-content">
        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Contact</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Contact</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Contact</h4>

                                <form method="post" action="{{ route('store.contact_update', $contact->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id"  class="form-control" value="{{ $contact->id }}" >
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Adress<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea name="adress" id="adress" class="form-control" required> {{$contact->adress }}</textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Phone Numbes (separate with "/") <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                        value="{{$contact->phone }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Emails (separate with "/")<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        value="{{$contact->email }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection