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
                            <h4 class="mb-sm-0">Cargo Type List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
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
                                    <a href="{{route('user-add-cargo-type')}}" class="btn btn-flat btn-sm btn-primary">Create New</a>
                                    {{-- <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#uni_modal">
                                        <span class="fas fa-plus"></span>  Create New</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Weight(Kg)-based Cargo Type List</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">CBM-based Cargo Type List</span> 
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content p-3 text-muted">
                                    {{-- TAB1 PANEL --}}
                                    <div class="tab-pane active" id="tab1" role="tabpanel">
                                        <table id="key-datatable" class="table dt-responsive  w-100">
                                            <thead>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th>Cargo Type</th>
                                                    <th>Description</th>
                                                    <th>Pricing/Kg.</th>
                                                    <th>Status</th>
                                                    <th>Action</th>						
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($wCargoTypes as $item)
                                                    <tr>
                                                        <td> {{ $item->created_at }} </td>
                                                        <td> {{ $item->name }} </td>
                                                        <td><p class="m-0 truncate-1">{{ $item->description }} </p></td>
                                                        @php 
                                                            $city_price =  format_num($item->city_price);
                                                            $state_price =  format_num($item->state_price);
                                                            $country_price =  format_num($item->country_price); 
                                                        @endphp
                                                        <td class="">
                                                            <small>City: <b> {{ $city_price }} </b></small><br>
                                                            <small>State: <b>{{ $state_price }}</b></small><br>
                                                            <small>Country: <b>{{ $country_price }}</b></small><br>
                                                        </td>
                                                        <td class="text-center">
                                                            @if($item->status == 1)
                                                                <span class="badge badge-pill text-white bg-success"> Active </span>
                                                            @else
                                                                <span class="badge badge-pill text-white bg-danger"> InActive </span>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" 
                                                                        aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                                        {{-- <a class="dropdown-item btn view_data" href="javascript:void(0)" data-id="{{ $item->id }}"
                                                                            data-bs-toggle="modal" data-bs-target="#uni_modal"><span class="fa fa-eye text-dark"></span> View</a>
                                                                        <div class="dropdown-divider"></div> --}}
                                                                        <a class="dropdown-item btn"  href="{{route('user-edit-cargo-type', $item->id)}}" data-id="{{ $item->id }}"
                                                                            ><span class="fa fa-edit text-primary"></span> Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item btn"  href="{{route('user-delete-cargo-type', $item->id)}}" data-id="{{ $item->id }}"
                                                                            ><span class="fa fa-trash text-danger"></span> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       </td>
                                                    </tr>
                                                    @empty
                                                    <p>No Category</p>
                                                @endforelse
                                            </tbody>				  
                                            <tfoot>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th>Cargo Type</th>
                                                    <th>Description</th>
                                                    <th>Pricing/Kg.</th>
                                                    <th>Status</th>
                                                    <th>Action</th>	
                                                </tr>
                                            </tfoot>
                                        </table> 
                                    </div>

                                    {{-- TAB2  PANEL --}}
                                    <div class="tab-pane" id="tab2" role="tabpanel">
                                        <table id="key-datatable" class="table dt-responsive  w-100">
                                            <thead>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th>Cargo Type</th>
                                                    <th>Description</th>
                                                    <th>Pricing/CBM</th>
                                                    <th>Status</th>
                                                    <th>Action</th>						
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($fCargoTypes as $item)
                                                    <tr>
                                                        <td> {{ $item->created_at }} </td>
                                                        <td> {{ $item->name }} </td>
                                                        <td><p class="m-0 truncate-1">{{ $item->description }} </p></td>
                                                        @php 
                                                            $freight_price =  format_num($item->freight_price); 
                                                        @endphp
                                                        <td class="">
                                                            <small>Freight Prive: <b>{{ $freight_price }}</b></small><br>
                                                        </td>
                                                        <td class="text-center">
                                                            @if($item->status == 1)
                                                                <span class="badge badge-pill text-white bg-success"> Active </span>
                                                            @else
                                                                <span class="badge badge-pill text-white bg-danger"> InActive </span>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                                <div class="btn-group" role="group">
                                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" 
                                                                        aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                                        {{-- <a class="dropdown-item btn view_data" href="javascript:void(0)" data-id="{{ $item->id }}"
                                                                            data-bs-toggle="modal" data-bs-target="#uni_modal"><span class="fa fa-eye text-dark"></span> View</a>
                                                                        <div class="dropdown-divider"></div> --}}
                                                                        {{-- <a class="dropdown-item btn edit_data"  href="javascript:void(0)" data-id="{{ $item->id }}"
                                                                            data-bs-toggle="modal" data-bs-target="#uni_modal"><span class="fa fa-edit text-primary"></span> Edit</a> --}}
                                                                            <a class="dropdown-item btn"  href="{{route('user-edit-cargo-type', $item->id)}}" data-id="{{ $item->id }}"
                                                                                ><span class="fa fa-edit text-primary"></span> Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        {{-- <a class="dropdown-item delete_data" href="{{route('delete_cargo_type', $item->id )}}" data-id="{{ $item->id }}"
                                                                            ><span class="fa fa-trash text-danger"></span> Delete</a> --}}
                                                                        <a class="dropdown-item btn"  href="{{route('user-delete-cargo-type', $item->id)}}" data-id="{{ $item->id }}"
                                                                            ><span class="fa fa-trash text-danger"></span> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       </td>
                                                    </tr>
                                                    @empty
                                                    <p>No Category</p>
                                                @endforelse
                                            </tbody>				  
                                            <tfoot>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th>Cargo Type</th>
                                                    <th>Description</th>
                                                    <th>Pricing/Kg.</th>
                                                    <th>Status</th>
                                                    <th>Action</th>	
                                                </tr>
                                            </tfoot>
                                        </table> 
                                    </div>
                                </div>

                                
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->

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

        function uIForm(){
            uf = `
            <div class="container-fluid">
                <form id="type-form">
                    @csrf
                    <input type="text" name ="id" value="" >
                    <div class="mb-3">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-md rounded-0" 
                        value=""  required/>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="control-label">Description</label>
                        <textarea type="text" name="description" id="description"
                            class="form-control form-control-md rounded-0" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="city_price" class="control-label">City to City Price per kg.</label>
                        <input type="number" step="any" name="city_price" id="city_price" 
                            class="form-control form-control-md rounded-0" value=""  required/>
                    </div>

                    <div class="mb-3">
                        <label for="state_price" class="control-label">State to State Price per kg.</label>
                        <input type="number" step="any" name="state_price" id="state_price" 
                            class="form-control form-control-md rounded-0" value=""  required/>
                    </div>

                    <div class="mb-3">
                        <label for="country_price" class="form-label">Country to Country Price per kg.</label>
                        <input type="number" step="any" name="country_price" id="country_price" 
                            value="" class="form-control form-control-md" required="">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="control-label">Status</label>
                        <select class="form-select form-control-md form-control" name="_status" id="_status" required>
                            <option selected="" disabled="" value="">Choose...</option>
                            <option value="1" {{(isset($data->status) && $data->status == 1) ? 'selected' : ''}}>Active</option>
                            <option value="0" {{(isset($data->status) && $data->status == 0) ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>

                    <div class="mt-2 text-center mx-auto">
                        <button class="btn btn-primary" type="button" id="submit_cargo_type_form">Save</button>
                    </div>
                </form>
            </div>
            `
            return uf
        }

        

        // $('#submit_cargo_type_form').click(function(e){
        //     e.preventDefault();
        //     console.log('form submiting..')
        // })
        // $(document).on('click', '#submit_cargo_type_form', function(e){
        //     e.preventDefault();
        //     console.log('form submiting..')
        //     $('#type-form').submit();
        // })

        // $('#type-form').submit(function(e){
        $(document).on('submit', '#type-form', function(e){
            e.preventDefault();
            
            formData = new FormData($(this)[0])
            // formData = new FormData();
            // formData.append("_token", {{ @csrf_token() }});
            formData.append("_action", action);
            formData.append("form_id", $("#form_id").val());
            formData.append("name", $("#name").val());
            formData.append("description", $("#description").val());
            formData.append("city_price", $("#city_price").val());
            formData.append("state_price", $("#state_price").val());
            formData.append("country_price", $("#country_price").val());
            formData.append("_status", $("#_status option:selected").val());
            // var token =  $("#_token").attr('value');
            var token =  $("#_token").val();

            $.ajax({
				url:"/admin/cargo/cargotype/store-or-update",
				data: formData,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                headers: {
                        'X-CSRFToken': token 
                   },
				error:err=>{
					console.log(err)
					// alert("An error occured",'error');
					// end_loader();
				},
				success:function(resp){
                    console.log(resp)
					// if(typeof resp =='object' && resp.status == 'success'){
					// 	// location.reload()
					// }else if(resp.status == 'failed' && !!resp.msg){
                    //     alert(resp.msg);
                    //     var el = $('<div>')
                    //         el.addClass("alert alert-danger err-msg").text(resp.msg)
                    //         _this.prepend(el)
                    //         el.show('slow')
                            
                    //         $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                    //         // end_loader()
                    // }
                    // else{
					// 	alert("An error occured",'error');
					// 	// end_loader();
                    //     console.log(resp)
					// }
				}
			})
        })


        function delete_cargo_type($id){
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=delete_cargo_type",
                method:"POST",
                data:{id: $id},
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured.",'error');
                    end_loader();
                },
                success:function(resp){
                    if(typeof resp== 'object' && resp.status == 'success'){
                        location.reload();
                    }else{
                        alert_toast("An error occured.",'error');
                        end_loader();
                    }
                }
            })
        }
    </script>
@endsection