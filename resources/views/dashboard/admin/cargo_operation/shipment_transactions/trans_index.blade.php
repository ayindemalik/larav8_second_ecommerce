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
                            <h4 class="mb-sm-0">Cargo Type List</h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of Cargo Types</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{route('add-new-shipment', 0)}}" target="_blanc" id="create_new" class="btn btn-flat btn-sm btn-primary"
                                        >
                                        <span class="fas fa-plus"></span>  Create New Shipment</a>
                                </div>
                            </div>  
                            <div class="card-body">
                                @php 
                                    $comonFunc = new App\Http\Controllers\Backend\CommonFunctions;
                                @endphp
                                <table id="key-datatable" class="table dt-responsive  w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date Created</th>
                                            <th>Ref Code</th>
                                            <th>Shipment Type</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>					
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cargo_list as $key => $item)
                                            <tr>@php $row = $key+1 @endphp
                                                <td> {{ $row }} </td>
                                                <td> {{ $item->created_at }} </td>
                                                <td> <p>{{ $item->ref_code }} </p></td>
                                                @php 
                                                    $total_amount = $comonFunc->format_num($item->total_amount);
                                                @endphp
                                                <td class="">
                                                    <small><b> {{$item->ship_process_type}} </b></small><br>
                                                </td>
                                                <td class="">
                                                    <small><b> {{ $item->currency }} {{ $total_amount }} </b></small><br>
                                                </td>
                                                <td class="text-center">
                                                    @if($item->status == 1) <span class="badge badge-pill text-white bg-info"> In-Transit </span>
                                                    @elseif($item->status == 2) <span class="badge badge-pill text-white bg-warning"> Arrived at Station </span>
                                                    @elseif($item->status == 3) <span class="badge badge-pill text-white bg-primary"> Out for Delivery </span>
                                                    @elseif($item->status == 4) <span class="badge badge-pill text-white bg-success"> Delivered</span>
                                                    @else
                                                        <span class="badge badge-pill text-white bg-dark"> Pending </span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <a class="btn btn-info bg-gradient-light btn-flat btn-sm" 
                                                        href="{{route('view-transaction-details',['id'=>$item->id, 'ref_code'=>$item->ref_code])}}"><span class="fa fa-eye"></span></a>
                                                    <a class="btn btn-primary bg-gradient-light btn-flat btn-sm" href="{{route('edit-shipment',$item->id)}}">
                                                        <span class="fa fa-edit text-white"></span></a>
                                                    <a class="btn btn-danger bg-gradient-light btn-flat btn-sm" href="{{route('delete-shipment',$item->id)}}">
                                                        <span class="fa fa-trash text-white"></span></a>
                                               </td>
                                            </tr>
                                            @empty
                                            <p>No Category</p>
                                        @endforelse
                                    </tbody>				  
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Date Added</th>
                                            <th>Ref Code</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>	
                                        </tr>
                                    </tfoot>
                                </table> 
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->

                    @php 
                    // function format_num($number = '' , $decimal = ''){
                    //     if(is_numeric($number)){
                    //         $ex = explode(".",$number);
                    //         $decLen = isset($ex[1]) ? strlen($ex[1]) : 0;
                    //         if(is_numeric($decimal)){
                    //             return number_format($number,$decimal);
                    //         }else{
                    //             return number_format($number,$decLen);
                    //         }
                    //     }else{
                    //         return "Invalid Input";
                    //     }
                    // } 
                    @endphp
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
