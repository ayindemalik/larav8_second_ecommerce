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
                            <h4 class="mb-sm-0">About</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit About</h4>

                                <form method="post" action="{{ route('store.about_update', $about->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id"  class="form-control" value="{{ $about->id }}" >
                                    <input type="hidden" name="oldImage"  class="form-control" value="{{ $about->main_image }}" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Title (French)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="about_title_fr" id="about_title_fr"
                                                    value="{{ $about->about_title_fr }}">
                                                    @error('about_title_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Title (English) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="about_title_en" id="about_title_en"
                                                    value="{{ $about->about_title_en }}">
                                                    @error('about_title_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Short Description (Francais) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea  class="form-control" name="about_shortdescp_fr" id="about_shortdescp_fr" >{{ $about->about_shortdescp_fr }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Short Description (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea  class="form-control" name="about_shortdescp_en" id="about_shortdescp_en" >{{ $about->about_shortdescp_en }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Long Description (Francais) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea  class="form-control" row="5" name="about_longdescp_fr" id="elm1"  >{!!$about->about_longdescp_fr!!}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">About Long Description (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea  class="form-control" row="5" name="about_longdescp_en" id="elm2"  >{!! $about->about_longdescp_en !!}</textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">						
                                            <div class="form-group">
                                                <h5>About Main Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="about_image" id="about_image" onchange = "mainThamUrl(this)" class="form-control" > 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Image Preview <span class="text-danger">*</span></h5>
                                                <img src=" {{ asset($about->main_image) }}" id="mainThmb" height="250" width="250" alt="">
                                            </div>
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
    <script type="text/javascript">
        // Show selected single Image
        function mainThamUrl(input) {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection



	  
