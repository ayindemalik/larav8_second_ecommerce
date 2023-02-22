@extends('dashboard.dashboard_master')

@section('main_header')
    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
    @endphp 

    <div id="layout-wrapper">
        @if($route != 'login')
            @include('dashboard.body_layout.user_header')
        @endif
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.useraccount.user_sidebar')

    <div class="main-content">
        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add New Cargo Type</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add New Cargo Type</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">List of Cargo Types</h3> --}}
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{route('user-manage-cargo-types')}}"  class="btn btn-flat btn-sm btn-primary" >
                                        <span class="fas fa-plus"></span>  Go to all list</a>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Weight(Kg)-based Cargo Type</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">CBM-based Cargo Type</span> 
                                        </a>
                                    </li>
                                </ul> --}}

                                @if($cargoTypData->type == 'W')
                                <form action="{{route('user-store-cargo-type-update')}}"  method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="_token" id="_token" value="{{ @csrf_token() }}"> --}}
                                    {{-- <input type="text" name ="form_id" id ="form_id" value="{{ isset($data->id) ? $data->id : 0}}" > --}}
                                    <input type="hidden" name ="type"  value="{{$cargoTypData->type}}" >
                                    <input type="hidden" name ="form_id"  value="{{$cargoTypData->id}}" >
                                    
                                    <div class="row">
                                        <!-- SHIPMENT META INFO -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="status" class="control-label">Countries</label>
                                                <select class="form-select form-control-md form-control" name="country" id="country" required>
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}} {{$country->id == $cargoTypData->country_id ? 'selected=""':''}}">{{$country->country_name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- NAME --}}
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="name" class="control-label">Cargo Type Name</label>
                                                <input type="text" name="crg_typ_name" id="crg_typ_name" class="form-control form-control-md rounded-0" 
                                                value="{{$cargoTypData->name}}"  required/>
                                            </div>
                                        </div>

                                        {{-- DESC --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description" class="control-label">Description</label>
                                                <textarea type="text" name="crg_typ_desc" id="crg_typ_desc"
                                                    class="form-control form-control-md rounded-0" required>{{$cargoTypData->description}}</textarea>
                                            </div>
                                        </div>

                                        {{-- COUNTRY TO COUNTRY --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="country_price" class="form-label">Country to Country Price(per kg).</label>
                                                <input type="number" name="country_price" id="country_price" step="0.01"
                                                    value="{{isset($cargoTypData->country_price) ? $cargoTypData->country_price : ''}}" class="form-control form-control-md" required="">
                                            </div>
                                        </div>

                                        {{-- STATE TO STATE --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state_price" class="control-label">State to State Price (per kg).</label>
                                                <input type="number" name="state_price" id="state_price" step="0.01"
                                                    class="form-control form-control-md rounded-0" value="{{ isset($cargoTypData->state_price) ? $cargoTypData->state_price:'' }}"  required/>
                                            </div>
                                        </div>

                                        {{-- CITY TO CITY --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="city_price" class="control-label">City to City Price (per kg).</label>
                                                <input type="number" name="city_price" id="city_price" step="0.01"
                                                    class="form-control form-control-md rounded-0" value="{{ isset($cargoTypData->city_price) ? $cargoTypData->city_price :''}}"  required/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="status" class="control-label">Status</label>
                                                <select class="form-select form-control-md form-control" name="_status" id="_status" required>
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="1" {{(isset($cargoTypData->status) && $cargoTypData->status == 1) ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{(isset($cargoTypData->status) && $cargoTypData->status == 0) ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Row -->
                                    
                                    <div class="mt-2 text-center mx-auto">
                                        <button class="btn btn-md btn-primary" type="submit" >Save</button>
                                    </div>
                                </form>
                                @elseif($cargoTypData->type == 'F')
                                <form action="{{route('user-store-cargo-type-update')}}"  method="POST">
                                    @csrf
                                    <input type="hidden" name ="type"  value="{{$cargoTypData->type}}" >
                                    <input type="hidden" name ="form_id"  value="{{$cargoTypData->id}}" >
                                    
                                    <div class="row">
                                        <!-- SHIPMENT META INFO -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="status" class="control-label">Countries</label>
                                                <select class="form-select form-control-md form-control" name="country" id="country" required>
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}"{{$country->id == $cargoTypData->country_id ? 'selected=""':'' }}>{{$country->country_name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- NAME --}}
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="name" class="control-label">CBM Cargo Type Name</label>
                                                <input type="text" name="crg_typ_name" class="form-control form-control-md rounded-0" 
                                                value="{{$cargoTypData->name}}"  required/>
                                            </div>
                                        </div>

                                        {{-- DESC --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description" class="control-label">Description</label>
                                                <textarea type="text" name="crg_typ_desc" 
                                                class="form-control form-control-md rounded-0" required>{{$cargoTypData->description}}</textarea>
                                            </div>
                                        </div>

                                        {{-- COUNTRY TO COUNTRY --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="freight_price" class="form-label">Freight Price(volum).</label>
                                                <input type="number" name="freight_price" id="freight_price" step="0.01"
                                                    value="{{$cargoTypData->freight_price}}" class="form-control form-control-md" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="status" class="control-label">Status</label>
                                                <select class="form-select form-control-md form-control" name="_status"  required>
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="1" {{(isset($cargoTypData->status) && $cargoTypData->status == 1) ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{(isset($cargoTypData->status) && $cargoTypData->status == 0) ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- End Row -->
                                    
                                    <div class="mt-2 text-center mx-auto">
                                        <button class="btn btn-md btn-primary" type="submit" >Save</button>
                                    </div>
                                </form>
                                @endif
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>

                @php function format_num($number = '' , $decimal = ''){
                    if(is_numeric($number)){
                        $ex = explode(".",$number);
                        $decLen = isset($ex[1]) ? strlen($ex[1]) : 0;
                        if(is_numeric($decimal)){
                            return number_format($number,$decimal);
                        }else{
                            return number_format($number,$decLen);
                        }
                    }else{
                        return "Invalid Input";
                    }
                } @endphp
            </div>
        </div>
    </div>
    
@endsection





@section('page-script')
    <script type="text/javascript">
        var action = "UPDATE_CARGO_TYPE";
        $(document).ready(function(){
            $('.delete_data').click(function(){
                // _conf("Are you sure to delete this Cargo Type permanently?","delete_cargo_type",[$(this).attr('data-id')])
            })
            $('#create_new').click(function(){
                action = "ADD_CARGO_TYPE";
                loadForm("add_new", '<i class="fa fa-plus"></i> Add New Cargo Type', 0)
            })
            $('#manage_order').click(function(){
                uni_modal("<i class='fa fa-strem'></i> Manage Cargo Type Order","cargo_types/manage_order.php")
            })
            $('.view_data').click(function(){
                // uni_modal("<i class='fa fa-eye'></i> Cargo Type Details","cargo_types/view_cargo_type.php?id="+$(this).attr('data-id'))
                loadForm("view_data", '<i class="fa fa-eye"></i> Cargo Type Details', $(this).attr('data-id'))
            })
            $('.edit_data').click(function(){
                action = "UPDATE_CARGO_TYPE";
                // uni_modal("<i class='fa fa-edit'></i> Update Cargo Type Details","cargo_types/manage_cargo_type.php?id="+$(this).attr('data-id'))
                idval = $(this).attr('data-id')
                // loadForm("edit_data", '<i class="fa fa-edit"></i> Update Cargo Type Details', 1)
                loadForm("edit_data", '<i class="fa fa-edit></i> Update Cargo Type Details', idval)
                // loadOperationForm('<i class="fa fa-edit></i> Update Cargo Type Details', idval)
            })
            // $('.table').dataTable({
            // 	columnDefs: [
            // 			{ orderable: false, targets: [4,5] }
            // 	],
            // 	order:[0,'asc']
            // });
            // $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
        })

        function loadForm(action, title, idVal){
            // start_loader();
            // console.log(action +  idVal)
            $.ajax({
                url:"/admin/cargo/cargotype/loadform/"+action+"/"+idVal,
                method:"GET",
                // dataType:"json",
                error:err=>{
                    console.log(err)
                    // alert_toast("An error occured.",'error');
                    // end_loader();
                },
                success:function(resp){
                    // console.log(resp)
                    // if(resp){

                    // }
                    // if(typeof resp== 'object' && resp.status == 'success'){
                    //     location.reload();
                    // }else{
                    //     alert_toast("An error occured.",'error');
                    //     end_loader();
                    // }
                    uni_modal(title , resp)
                }
            })
        }

        function loadOperationForm(title, idVal){
            // start_loader();
            console.log(action +  idVal)
            $.ajax({
                url:"{{ url('/admin/cargo/cargotype/edit')}}/"+idVal,
                method:"GET",
                dataType:"json",
                error:err=>{
                    console.log(err)
                    // alert_toast("An error occured.",'error');
                    // end_loader();
                },
                success:function(respData){
                    console.log(respData)
                    
                    uni_modal(title , uIForm())
                    if($.isArray(respData) && respData.length > 0){
                        $('#form_id').val(respData[0].id)
                        $('#name').val(respData[0].name)
                        $('#description').val(respData[0].description)
                        $('#city_price').val(respData[0].city_price)
                        $('#state_price').val(respData[0].state_price)
                        $('#country_price').val(respData[0].country_price)
                        
                    }
                }
            })
        }

      


        
    </script>
@endsection