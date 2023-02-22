@extends('dashboard.dashboard_master')

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')
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
            <div class="col-12" id="bkgProcessResponse"></div>
            <div class='alert alert-success' style='display:none' id="suc_msg"></div>
        </div>
        <form class="needs-validation"  method="POST" id="uPermissionForm" action="{{url('admin/users-permission/store')}}"> 
            {{-- action="{{route('admin.user_permission_store')}}" --}}
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kullanıcılar</h4>
                            <table id="key-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>İsim</th>
                                        <th>Email</th>
                                        <th>Araçlar</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach($users as $user)
                                    @php $count = 0; @endphp
                                    <tr>
                                        <td><span id="uName{{$user->id}}">{{$user->name}}</span></td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <button class="btn btn-success u_permission" title="Yetkiler" id="uPerm{{$user->id}}"
                                                data-bs-toggle="modal" data-bs-target="#dataProcessModal"><i class="fa fa-cog"></i></a>
                                            </button>
                                            <button class="btn btn-info pers_add" title="Ekle" id="uId{{$user->id}}"><i class="fa fa-plus"></i></a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->


                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Eklenen Kullanıcılar</h4>
                            <table id="pers_list" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>İsim</th>
                                        <th>Çıkart</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

                
                {{-- YETKILER --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">YETKILER</h4>
                            @forelse ($modules as $module)
                                <div class="col-md-12 pd-l-5" style="border-left: 3px solid blue;" >
                                    <h5 class="mg-b-0 text-info">{{$module->module_name_tr}}</h5>
                                </div>
                                @php
                                    $modulePermissions = App\Models\ModulePermission::where('module_id',$module->id)->orderBy('id','ASC')->get();
                                @endphp
                                @forelse($modulePermissions as $modPer)
                                    <div class="col-md-3">
                                        <label class="ckbox">
                                            <input type="checkbox" name="yetki[]" value="{{$module->id}}_{{$modPer->id}}"><span>{{$modPer->permission_name_tr}} ({{$modPer->permission_type}})</span>
                                        </label>
                                    </div>
                                
                                @empty <p>No data available</p>
                                @endforelse

                            @empty <p>No data available</p>
                            @endforelse
                            
                            <hr>
                            <div class="col-md-12">
                                <!-- SUBMIT -->
                                <div class=" col-12">
                                    <input type="hidden" id="ekPERSONELLER" name="ekPERSONELLER">
                                    <button class="btn btn-primary" type="button" id="saveUserPerm">Kaydet</button>
                                    {{-- <button class="btn btn-primary" type="submit" id="saveUserPerm">Kaydet</button> --}}
                                </div>
                            </div>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Page-content -->

@include('dashboard.body_layout.footer')


</div>

@endsection



