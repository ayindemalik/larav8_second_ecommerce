@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
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
                            <h4 class="mb-sm-0">Edit Brand</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Brands</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des Marques</h4>
                                <form method="post" action="{{ route('store.brand_update', $brand->id)}}" enctype="multipart/form-data">
                                        @csrf   
                                        <div class="row">
                                            <input type="hidden" name="id"  class="form-control" value="{{ $brand->id }}" >
                                            <input type="hidden" name="oldImage"  class="form-control" value="{{ $brand->brand_image }}" > 
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Brand Name English<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"  name="brand_name_en" id="brand_name_en" 
                                                        value="{{ $brand->brand_name_en }}">
                                                        @error('brand_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Brand Name French<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"  name="brand_name_fr" id="brand_name_fr"
                                                        value="{{ $brand->brand_name_fr }}" >
                                                        @error('brand_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Brand Name English<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control"  name="brand_image" id="brand_image">
                                                        @error('brand_image')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-12">						
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
	
@endsection