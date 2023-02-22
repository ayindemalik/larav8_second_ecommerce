@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.admin_header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')

    <div class="main-content">
        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All abouts</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Abouts</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About Info | </h4>
                            <a class="btn btn-rounded btn-info float-right" href="{{ route('about.edit', $about->id)}}"> <i class="fa fa-edit"></i> Edit about content </a>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Title (French)<span class="text-danger">*</span></label>
                                            <div class="input-group">{{ $about->about_title_fr }}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Title (English)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group">{{ $about->about_title_en }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Short Description (Francais)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <h5></h5>
                                                    {!! $about->about_shortdescp_fr !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Short Description (Francais)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <h5></h5>
                                                    {!! $about->about_shortdescp_en !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Long Description (Francais)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <h5></h5>
                                                    {!! $about->about_longdescp_en !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">About Long Description (English)<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <h5></h5>
                                                    {!! $about->about_longdescp_en !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="controls">
                                        <img src=" {{ asset($about->main_image) }} " id="mainThmb" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

	  
@endsection