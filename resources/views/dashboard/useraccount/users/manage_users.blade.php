@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.useraccount.user_sidebar')
<!-- <h1>Welcome to Dashboard</h1> -->

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
                        <h4 class="card-title">All Users</h4>

                        <table id="key-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email </th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        @if($user->status == 1)<span class="btn btn-xs btn-success btn-rounded waves-effect waves-light"> Active </span>
                                        @else <span class="btn btn-xs btn-danger btn-rounded waves-effect waves-light"> InActive </span>
                                        @endif
                                    </td>
                                    <td width="30%">
                                        <a href="{{route('admin.edit_user', $user->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-edit"></i> </a>
                                        <a href="" class="btn btn-danger" title="Delete Data" id="delete">
                                        <i class="fa fa-trash"></i></a>
                                        @if($user->status == 1)
                                            <a href="{{ route('admin.inactivate_user', $user->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                        @else
                                            <a href="{{ route('admin.activate_user', $user->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
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

