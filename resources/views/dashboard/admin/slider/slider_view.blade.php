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
                            <h4 class="mb-sm-0">Web Site Home Slider</h4>
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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste</h4>
                                <table id="key-datatable" class="table dt-responsive  w-100">
                                    <thead>
                                        <tr>
                                            <th>Slider Image </th>
                                            <th>Title (Fr)</th>
                                            <th>Title (En)</th>
                                            <th>Decription(Fr)</th>
                                            <th>Decription(En)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sliders as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;">  </td>
                                                <td> 
                                                    @if($item->title_fr == NULL)<span class="badge badge-pill "> No Title </span>
                                                    @else{{ $item->title_fr }}
                                                    @endif 
                                                </td>
                                                <td> 
                                                    @if($item->title_en== NULL)<span class="badge badge-pill "> No Title </span>
                                                    @else{{ $item->title_en }}
                                                    @endif 
                                                </td>
                                                <td>{{ $item->description_fr }} </td>
                                                <td>{{ $item->description_en }} </td>
                                                <td> 
                                                    @if($item->status == 1)
                                                        <span class=" badge-pill bg-success"> Active </span>
                                                    @else
                                                        <span class="badge badge-pill bg-danger"> InActive </span>
                                                    @endif
                                                </td>
                                                <td width="30%">
                                                    <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                                         <i class="fa fa-trash"></i></a>
                                                    @if($item->status == 1)
                                                        <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No Products</p>
                                        @endforelse
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add A Home Slider</h4>
                                <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Title (French)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="title_fr" id="title_fr">
                                                    @error('title_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Title (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="title_en" id="title_en">
                                                    @error('title_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Description (Francais)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="description_fr" id="description_fr">
                                                    @error('description_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Slider Description (English)<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  name="description_en" id="description_en">
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
                                                <img src="" id="mainThmb" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection