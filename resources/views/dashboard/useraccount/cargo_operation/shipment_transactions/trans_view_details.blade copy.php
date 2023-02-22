@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.header')
    </div>
@endsection

@section('dash_main_content')
    @include('dashboard.admin.admin_sidebar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit SHIPMENT's DETAILS </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">View Sipment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @php 
                    $comonFunc = new App\Http\Controllers\Backend\CommonFunctions;
                    // dd($cMetadata);
                @endphp
                {{-- <form method="post" action="{{ route('store-shipment-update') }}" id="cargo-form">
                    @csrf --}}
                    <input type="hidden" class="form-control"  id="ship_id" name="ship_id" value="{{$cargoData->id}}">
                                                
                    <div class="row">
                        <!-- SHIPMENT META INFO -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Shipment Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!--  -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ref_code" class="form-label">Shipment Code</label>
                                                <div class="input-group">{{$cargoData->ref_code}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sender_provided_id_type" class="form-label">Provided ID Type</label>
                                                <div class="input-group">{{$cargoData->sender_provided_id_type}}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sender_provided_id" class="form-label">Provided ID #/Code</label>
                                                <div class="input-group">{{$cargoData->sender_provided_id}}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <label for="sender_provided_id" class="form-label">Status</label>
                                                @if($cargoData->status == 1) <span class="badge badge-pill text-white bg-info"> In-Transit </span>
                                                @elseif($cargoData->status == 2) <span class="badge badge-pill text-white bg-warning"> Arrived at Station </span>
                                                @elseif($cargoData->status == 3) <span class="badge badge-pill text-white bg-primary"> Ready for Delivery </span>
                                                @elseif($cargoData->status == 4) <span class="badge badge-pill text-white bg-success"> Delivered</span>
                                                @else
                                                    <span class="badge badge-pill text-white bg-dark"> Pending </span>
                                                @endif

                                            </div>

                                            <div class="dropdown mt-4 mt-sm-0">
                                                <a href="#" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Update Status<i class="mdi mdi-chevron-down"></i>
                                                </a>
    
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('change-shipment-status', ['id'=>$cargoData->id, 'val'=> 1])}}">In-Transit</a>
                                                    <a class="dropdown-item" href="{{ route('change-shipment-status', ['id'=>$cargoData->id, 'val'=> 2])}}">Arrived at Station</a>
                                                    <a class="dropdown-item" href="{{ route('change-shipment-status', ['id'=>$cargoData->id, 'val'=> 3])}}">Ready for Delivery</a>
                                                    <a class="dropdown-item" href="{{ route('change-shipment-status', ['id'=>$cargoData->id, 'val'=> 4])}}">Delivered</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{ route('print-shipment',['id'=>$cargoData->id,'code'=>$cargoData->ref_code] )}}" 
                                                class="btn btn-secondary btn-rounded waves-effect waves-light" target="_blanc"> 
                                                <i class="ri-file-pdf-fill"></i> View PDF</a>
                                            <a href="{{ route('download-shipment',['id'=>$cargoData->id,'code'=>$cargoData->ref_code] )}}" 
                                                class="btn btn-secondary btn-rounded waves-effect waves-light"> 
                                                <i class="ri-download-line"></i> Download</a>
                                                
                                                {{-- <button type="button" 
                                            class="btn btn-secondary btn-rounded waves-effect waves-light">Secondary</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SENDER INFO -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header"><h3 class="card-title">Sender Information</h3></div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_name" class="form-label">Full Name</label>
                                            <div class="input-group">{{$cMetadata[0]->sender_name ?? ''}}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_contact" class="form-label">Contact #</label>
                                            <div class="input-group">{{$cMetadata[0]->sender_contact ?? ''}}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_address" class="form-label">Address</label>
                                            <div class="input-group">{{$cMetadata[0]->sender_address ?? ''}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RECEIVER INFO -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header"><h3 class="card-title">Receiver Information</h3></div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_name" class="form-label">Full Name</label>
                                            <div class="input-group">{{$cMetadata[0]->receiver_name}}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_contact" class="form-label">Contact</label>
                                            <div class="input-group">{{$cMetadata[0]->receiver_contact}}</div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_address" class="form-label">Address</label>
                                            <div class="input-group">{{$cMetadata[0]->receiver_address}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FROM - TO - SHIPING TYPE - PACKAGE TYPE -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label for="from_location" class="form-label">From Location</label>
                                                <div class="input-group">{{$cMetadata[0]->from_location ?? ''}}</div>
                                            </div>
                                        </div>
                
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label for="to_location" class="form-label">To Location</label>
                                                <div class="input-group">{{$cMetadata[0]->to_location ?? ''}} </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Shipping Type : </label>
                                                @if($cargoData->shipping_type == 1) City to City @endif
                                                @if($cargoData->shipping_type == 2) State to State @endif
                                                @if($cargoData->shipping_type == 3 ) Country to Country @endif
                                            </div>
                                        </div>
                
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Package Type: </label>
                                                @if($cargoData->package_type == 1 ) Single Package @endif
                                                @if($cargoData->package_type == 2 ) Grouping @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARGO ITEMS -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header"><h3 class="card-title">Cargo Items</h3></div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                                        <div class="col-3 border text-center"><b>Cargo Type</b></div>
                                        <div class="col-3 border text-center"><b>Price</b></div>
                                        <div class="col-3 border text-center"><b>Weight/kg.</b></div>
                                        <div class="col-3 border text-center"><b>Total</b></div>
                                    </div>
                                    

                                    <div id="cargo-item-list" class="d-table w-100">
                                        @php 
                                            $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get();
                                        @endphp
                                        {{-- @if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0) --}}
                                        
                                            @foreach($cargoItems as $item)
                                                <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                                                    @php $cargType = App\Models\CargoTypeList::where('id', $item->cargo_type_id)->get(); @endphp
                                                    <div class="col-3 border text-center"><b>{{$cargType[0]->name}}</b></div>
                                                    @php $price = $comonFunc->format_num($item->price); 
                                                    $total = $comonFunc->format_num($item->total); @endphp
                                                    <div class="col-3 border text-center"><b>{{ $cargoData->currency }} {{$item->price}}</b></div>
                                                    <div class="col-3 border text-center"><b>{{$item->weight}}</b></div>
                                                    <div class="col-3 border text-center"><b>{{ $cargoData->currency }}{{$total}}</b></div>
                                                </div>
                                            @endforeach
                                        {{-- @endif --}}
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                                        <div class="col-9 border text-center"><b>Total</b></div>
                                        <div class="col-3 border text-center"><b id="gtotal"> {{ $cargoData->currency }} {{$cargoData->total_amount}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

 


@section('page-script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
<script type="text/javascript">
    var cargo_type = {!! json_encode($cargoTypes, JSON_HEX_TAG) !!};
    console.log(cargo_type)

    function change_price(_this, cargo_type_id){
        var type= $('#shipping_type').val()
        console.log('type '+type)

        if(!!cargo_type[cargo_type_id]){
            if(type == 1){
                var price = cargo_type[cargo_type_id].city_price
            }else if(type == 2){
                var price = cargo_type[cargo_type_id].state_price
            }else if(type == 3){
                var price = cargo_type[cargo_type_id].country_price
            }else{
                var price = 0;
            }
            _this.find("input[name='price[]']").val(price)
            _this.find(".price").text(parseFloat(price).toLocaleString("en-US"))
            calc()
        }
    }

    function calc(){
        var gtotal = 0;
        $('#cargo-item-list .cargo-item').each(function(){
            var price = $(this).find('[name="price[]"]').val();
            var weight = $(this).find('[name="weight[]"]').val();
            price = price > 0 ? price : 0;
            weight = weight > 0 ? weight : 0;
            var total = parseFloat(price) * parseFloat(weight)
            $(this).find('[name="total[]"]').val(total)
            $(this).find('.total').text(parseFloat(total).toLocaleString('en-US'))
            gtotal += parseFloat(total)

        })
        $('[name="total_amount"]').val(gtotal)
        $('#gtotal').text(parseFloat(gtotal).toLocaleString('en-US'))
    }

$(document).ready(function(){
    $('.select2').select2({
        width:"100%",
        placeholder:"Please Select Here"
    })

    $('#add_item').click(function(){
        console.log('add item line')
        var item = $($('noscript#cargo-item-clone').html()).clone()
        $('#cargo-item-list').append(item)
        item.find('.select2').select2({
            width:"100%",
            placeholder:"Please Select Here"
        })
        item.find("[name='cargo_type_id[]']").change(function(){
            var id = $(this).val();
            change_price(item, id)
        })
        item.find('[name="weight[]"]').on('input',function(){
            console.log('test')
            calc()
        })
    })
    
    // IF EACH CARGO TYPE IS SELECTED 
    $("[name='cargo_type_id[]']").change(function(){
        var id = $(this).val();
        change_price(item, id)
    })

    // IF WEIGHT INPUT VALUE IS CHANGED  
    $('[name="weight[]"]').on('input',function(){
        console.log('test')
        calc()
    })

    $('#shipping_type').change(function(){
        $('#cargo-item-list .cargo-item').each(function(){
            var id = $(this).find('[name="cargo_type_id[]"]').val()
            change_price($(this), id)
        })
    })

    // $('#cargo-form').submit(function(e){
    //     e.preventDefault();
    //     var _this = $(this)
    //     $('.err-msg').remove();
    //     start_loader();
    //     $.ajax({
    //         url:"{{url('/admin/cargo/cargotype/store-or-update')}}",
    //         data: new FormData($(this)[0]),
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         method: 'POST',
    //         type: 'POST',
    //         dataType: 'json',
    //         error:err=>{
    //             console.log(err)
    //             alert_toast("An error occured",'error');
    //             end_loader();
    //         },
    //         success:function(resp){
    //             if(typeof resp =='object' && resp.status == 'success'){
    //                 location.replace("./?page=transactions/view_transaction&id="+resp.cid);
    //             }else if(resp.status == 'failed' && !!resp.msg){
    //                 var el = $('<div>')
    //                     el.addClass("alert alert-danger err-msg").text(resp.msg)
    //                     _this.prepend(el)
    //                     el.show('slow')
    //                     $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
    //             }else{
    //                 alert_toast("An error occured",'error');
    //                 console.log(resp)
    //             }
    //             end_loader();
    //         }
    //     })
    // })

    // $('#cargo-form').on('submit',function(e){
    //     e.preventDefault();
})
    
    
 </script>
@endsection