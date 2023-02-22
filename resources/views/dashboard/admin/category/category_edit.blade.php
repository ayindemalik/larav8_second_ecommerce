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
                            <h4 class="mb-sm-0">Les Categories</h4>
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
                                <h4 class="card-title">Editer La categorie</h4>
                                
                                <form method="post" action="{{ route('store.category_update', $category->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id"  class="form-control" value="{{ $category->id }}" >
                                    <input type="hidden" name="oldImage"  class="form-control" value="{{ $category->category_image }}" >
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Category Name French<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="category_name_fr" id="category_name_fr"
                                                    value="{{ $category->category_name_fr}}">
                                                    @error('category_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Category Name English<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="category_name_en" id="category_name_en"
                                                    value="{{ $category->category_name_en }}">
                                                    @error('category_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Image de la categorie<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="category_image" id="category_image" onchange = "mainThamUrl(this)">
                                                    @error('category_image')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                            
                                            <img id="mainThmb" src="{{ asset($category->category_image) }}" class="card-img-top" 
                                                style="height: 200px; width: 200px;">
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Sauvegardez les Changements">
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