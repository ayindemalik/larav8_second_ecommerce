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
                            <h4 class="mb-sm-0">Edit Operation</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Incomes & Expences</a></li>
                                    <li class="breadcrumb-item active">Update</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{route('user-store-income-expence-update')}}"  class="btn btn-flat btn-sm btn-primary" >
                                        <span class="fas fa-plus"></span>  Go to all list</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-3 text-muted">
                                    {{-- TAB1 PANEL --}}
                                    <div class="tab-pane active" id="tab1" role="tabpanel">
                                        <form action="{{route('user-store-income-expence-update')}}"  method="POST">
                                            @csrf
                                            <input type="hidden" name="form_id" value="{{$data->id}}">
                                            <div class="row">
                                                <!-- SHIPMENT META INFO -->
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="date" class="control-label">Date</label>
                                                        @php $date  = date('d-m-Y') @endphp
                                                        <input type="date" name="date" id="date" value="{{$data->date}}" class="form-control form-control-md rounded-0" 
                                                         required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="type" class="control-label">Operation</label>
                                                        <select class="form-select form-control-md form-control" name="type" id="type" required>
                                                            <option selected="" disabled="" value="">Choose...</option>
                                                            <option value="IN" {{$data->type==='IN'?'selected':''}}>Income</option>
                                                            <option value="Ex" {{$data->type==='EX'?'selected':''}}>Expence</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                {{-- NAME --}}
                                                <div class="col-md-8">
                                                    <div class="mb-3">
                                                        <label for="name" class="control-label">Item Designation</label>
                                                        <input type="text" name="item" id="item" class="form-control form-control-md rounded-0" 
                                                        value="{{$data->item}}" required/>
                                                    </div>
                                                </div>
    
                                                {{-- DESC --}}
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description" class="control-label">Description</label>
                                                        <textarea type="text" name="description" id="description"
                                                            class="form-control form-control-md rounded-0" required>{{$data->description}}</textarea>
                                                    </div>
                                                </div>
    
                                                {{-- COUNTRY TO COUNTRY --}}
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="number" name="amount" id="amount" step="0.01"
                                                        value="{{$data->amount}}" step="0.001" class="form-control form-control-md" required="">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="status" class="control-label">Status</label>
                                                        <select name="currency" id="fcurrency" class=" form-select form-control form-control-sm  form-control-border" required>
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="$" {{$data->currency==="$"?'selected':''}}>USD($)</option>
                                                            <option value="€" {{$data->currency==="€"?'selected':''}}>EURO(€)</option>
                                                            <option value="TL" {{$data->currency==="TL"?'selected':''}}>TL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Row -->
                                            
                                            <div class="mt-2 text-center mx-auto">
                                                <button class="btn btn-md btn-primary" type="submit" >Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
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