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
                            <h4 class="mb-sm-0">Home Slider</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit slider</h4>
                                
                                <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                    <input type="hidden" name="old_image" value="{{$slider->slider_img}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Title (French)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="title_fr" id="title_fr" value="{{$slider->title_fr}}">
                                                    @error('title_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Title (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="title_en" id="title_en" value="{{$slider->title_en}}">
                                                    @error('title_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Description (Francais)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="description_fr" id="description_fr" value="{{$slider->description_fr}}">
                                                    @error('description_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Description (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="description_en" id="description_en" value="{{$slider->description_en}}">
                                                    @error('description_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Image<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control"  name="slider_img" id="slider_img" onChange="mainThamUrl(this)">
                                                    @error('slider_img')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                            <img id="mainThmb" src="{{ !empty($slider->slider_img) ?  
                                                            url(''.$slider->slider_img) : url('uploads/no_image.jpg') }}" class="" 
                                                style="height: 200px; width: 200px;">
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                                
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
