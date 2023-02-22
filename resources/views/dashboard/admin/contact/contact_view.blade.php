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
                            <h4 class="mb-sm-0">Contact</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Contacts</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit About  | <a class="btn btn-rounded btn-block btn-info " href="{{ route('contact.edit', $contact->id)}}"> <i class="fa fa-edit"></i> Edit Contacts</a></h4>
                                
                                <br><br>
                                <div class="row">
                                    <div class="col-md-12 mb-5">						
                                        <div class="form-group">
                                            <h5>Adress </h5>
                                            <div class="controls">
                                                {{ $contact->adress }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Phones</h5>
                                            {{ $contact->phone }}
                                        </div>
                                    </div>

                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Emails</h5>
                                            {{ $contact->email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection