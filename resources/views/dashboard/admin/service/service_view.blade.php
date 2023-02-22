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
                            <h4 class="mb-sm-0">All Service</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Services</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Service List </h4>
                                <table id="key-datatable" class="table dt-responsive  w-100">
                                    <thead>
                                        <tr>
                                            <th>Icon Image</th>
                                            <th>Service Name French</th>
                                            <th>Service Name English</th>
                                            <th>Service description French</th>
                                            <th>Service description English</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->service_icon) }}" alt="" style="width:50px; height: 50px;"></td>
                                                <td> {{ $item->service_name_fr }} </td>
                                                <td> {{ $item->service_name_en }} </td>
                                                <td> {{ $item->service_descp_fr }} </td>
                                                <td> {{ $item->service_descp_en }} </td>
                                                <td> 
                                                    <a href="{{ route('service.edit', $item->id )}}" class="btn btn-info"> <i class="fa fa-edit" title="Edit"></i> </a>
                                                    <a href="{{ route('service.delete', $item->id )}}" class="btn btn-danger" id="delete"> <i class="fa fa-trash" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>				  
                                    <tfoot>
                                        <th>Icon Image</th>
                                        <th>Service Name French</th>
                                        <th>Service Name English</th>
                                        <th>Service description French</th>
                                        <th>Service description English</th>
                                        <th>Action</th>
                                    </tfoot>
                                </table> 
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Service</h4>
                                <form method="post" action="{{ route('store.new_service')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label text-20">Service Name (French) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="service_name_fr" id="service_name_fr">
                                                    @error('service_name_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label text-20">Service Name (English) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="service_name_en" id="service_name_en">
                                                    @error('service_name_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label text-20">Service Description (Francais) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="service_descp_fr" id="service_descp_fr">
                                                    @error('service_descp_fr')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label text-20">Service Description (English) <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="service_descp_en" id="service_descp_en">
                                                    @error('service_descp_en')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label text-20">Service Icon <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="service_icon" id="service_icon">
                                                    @error('service_icon')<span  class="text-danger"> {{ $message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
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