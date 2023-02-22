@extends('dashboard.dashboard_master')

@section('dash_main_content')
@include('dashboard.useraccount.user_sidebar')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Data Tables</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Data Tables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Applications</h4>

                            <table id="key-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Activity Area </th>
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created date</th>
                                        <th>Documents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @forelse ($newApps as $item)
                                    <tr>
                                        <td>{{$item->company_name}}</td>
                                        <td>{{$item->activity_area}}</td>
                                        <td>{{$item->company_type}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            @if($item->status == 1)<span class="btn btn-xs btn-success btn-rounded waves-effect waves-light"> Active </span>
                                            @else <span class="btn btn-xs btn-danger btn-rounded waves-effect waves-light"> InActive </span>
                                            @endif
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            @if($item->iso_document != '') <a target="_blank"  href="{{ asset($item->iso_document) }}">ISO</a>@endif <br>
                                            @if($item->quality_control_documents != '') <a target="_blank"  href="{{ asset($item->quality_control_documents) }}">Kalite Kontrol Doc</a>@endif
                                        </td>
                                        <td width="30%">
                                            <a href="{{route('user.view_supplier', $item->id)}}" class="btn btn-info" title="View Data"><i class="fa fa-eye"></i> </a>
                                            <a href="{{route('user.edit_supplierForm', $item->id)}}" class="btn btn-info" title="Edit Form"><i class="fa fa-edit"></i> </a>
                                            <a href="" class="btn btn-danger" title="Delete Data" id="delete">
                                            <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <p>No Apps</p>
                                    @endforelse
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Approved Applications</h4>

                            <table id="key-datatable2" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Activity Area </th>
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created date</th>
                                        <th>Documents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @forelse ($newApps as $item)
                                    <tr>
                                        <td>{{$item->company_name}}</td>
                                        <td>{{$item->activity_area}}</td>
                                        <td>{{$item->company_type}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            @if($item->status == 1)<span class="btn btn-xs btn-success btn-rounded waves-effect waves-light"> Active </span>
                                            @else <span class="btn btn-xs btn-danger btn-rounded waves-effect waves-light"> InActive </span>
                                            @endif
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            @if($item->iso_document != '') <a href="{{ asset($item->iso_document) }}">ISO</a>@endif <br>
                                            @if($item->quality_control_documents != '') <a href="{{ asset($item->quality_control_documents) }}">Kalite Kontrol Doc</a>@endif
                                        </td>
                                        <td width="20%">
                                            <a href="{{route('user.view_supplier', $item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
                                            <a href="{{route('user.edit_supplierForm', $item->id)}}" class="btn btn-info" title="View Data"><i class="fa fa-edit"></i> </a>
                                            <a href="" class="btn btn-danger" title="Delete Data" id="delete">
                                            <i class="fa fa-trash"></i></a>
                                           
                                        </td>
                                    </tr>
                                    @empty
                                        <p>No Apps</p>
                                    @endforelse
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')


</div>

@endsection

