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
                                    <li class="breadcrumb-item active">Edit Sipment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @php 
                    $comonFunc = new App\Http\Controllers\Backend\CommonFunctions;
                    // dd($cMetadata);
                @endphp
                <form method="post" action="{{ route('store-shipment-update') }}" id="cargo-form">
                    @csrf
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
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ref_code" class="form-label">Shipment Code<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  id="ref_code" name="ref_code" value="{{$cargoData->ref_code}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="status" class="control-label">Countries</label>
                                                <select class="form-select form-control-md form-control" name="w_country" id="w_country" required>
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->country_name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label for="sender_provided_id" class="form-label">Sender Provided Secret Code<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  id="sender_provided_code"  value="{{$cargoData->sender_provided_code}}" name="sender_provided_code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SENDER INFO -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sender Information</h3>
                                </div>
                                <div class="card-body">
                                    <!--  -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="sender_name" name="sender_name"
                                                value="{{$cMetadata[0]->sender_name ?? ''}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="sender_contact" name="sender_contact"
                                                value="{{$cMetadata[0]->sender_contact ?? ''}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sender_address" class="form-label">Address<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <textarea rows="3" name="sender_address" id="sender_address" class="form-control 
                                                form-control-sm rounded-0" required>{{$cMetadata[0]->sender_address ?? ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- RECEIVER INFO -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Receiver Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="receiver_name" name="receiver_name"
                                                value="{{$cMetadata[0]->receiver_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="receiver_contact" name="receiver_contact"
                                                value="{{$cMetadata[0]->receiver_contact}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="receiver_address" class="form-label">Address<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <textarea rows="3" name="receiver_address" id="receiver_address" class="form-control 
                                                form-control-sm rounded-0" required>{{$cMetadata[0]->receiver_address}}</textarea>
                                            </div>
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
                                                <label for="from_location" class="form-label">From Location<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea rows="2" name="from_location" id="from_location" 
                                                    class="form-control form-control-sm rounded-0" required>{{$cMetadata[0]->from_location ?? ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label for="to_location" class="form-label">To Location<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <textarea rows="2" name="to_location" id="to_location" 
                                                    class="form-control form-control-sm rounded-0" required>{{$cMetadata[0]->to_location ?? ''}} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Shipping Type <span class="text-danger">*</span></label>
                                                <select name="shipping_type" id="shipping_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                                    @if(isset($cMetadata[0]->shipping_type))
                                                    <option value="3" {{$cMetadata[0]->shipping_type == 3 ? 'selected':''}}>Country to Country</option>
                                                    <option value="2" {{$cMetadata[0]->shipping_type == 2 ? 'selected':''}}>State to State</option>
                                                    <option value="1" {{$cMetadata[0]->shipping_type == 1 ? 'selected':''}}>City to City</option>
                                                    @else
                                                    <option value="3">Country to Country</option>
                                                    <option value="2">State to State</option>
                                                    <option value="1">City to City</option>
                                                    @endif                                                    
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="col-xl-5">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Package Type<span class="text-danger">*</span></label>
                                                <select name="package_type" id="package_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                                    @if(isset($cMetadata[0]->package_type))
                                                    <option value="1" {{$cMetadata[0]->shipping_type == 1 ? 'selected':''}}>Single package</option>
                                                    <option value="2" {{$cMetadata[0]->shipping_type == 2 ? 'selected':''}} >Grouping</option>
                                                    @else
                                                    <option value="1" selected>Single package</option>
                                                    <option value="2" >Grouping</option>
                                                    @endif 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-2">
                                            <div class="mb-3">
                                                <label for="currency" class="form-label">Currency<span class="text-danger">*</span></label>
                                                <select name="currency" id="currency" class=" form-select form-control form-control-sm  form-control-border" required>
                                                    <option value="USD($)">Dollar($)</option>
                                                    <option value="EURO(€)">Euro(€)</option>
                                                </select>
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
                                            // dd($cargoItems);
                                            // if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0):
                                        @endphp
                                        {{-- @if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0) --}}
                                            @foreach($cargoItems as $item)
                                                <div class="d-table-row align-items-center justify-content-center 
                                                    my-0 py-0 cargo-item">
                                                    <div class="d-table-cell col-3 px-2 py-1 border text-center">
                                                        <input type="hidden" name="price[]" value="{{$item->price}} ">
                                                        <input type="hidden" name="total[]" value="{{$item->total}}">
                                                        <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2">
                                                            <option value="" disabled='' selected>Select type</option>
                                                            @foreach($cargoTypes as $crow)
                                                            <option value="{{$crow->id}}" {{$item->cargo_type_id == $crow->id ? 'selected':''}}> {{$crow->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @php $price = $comonFunc->format_num($item->price); $total = $comonFunc->format_num($item->total); @endphp
                                                    <div class="d-table-cell col-3 px-2 py-1 border text-right"><span class="font-weight-bold price">{{$price}} </span></div>
                                                    <div class="d-table-cell col-3 px-2 py-1 border text-center"><input type="number" step="any" name="weight[]" 
                                                        class="form-control form-control-sm form-control-border text-right" value="{{$item->weight}}"></div>
                                                    <div class="d-table-cell col-3 px-2 py-1 border text-right">
                                                        <span class="font-weight-bold total">{{$total}}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        {{-- @endif --}}
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                                        <div class="col-9 border text-center"><b>Total</b></div>
                                        <div class="col-3 border text-center"><b id="gtotal">0000</b>
                                        <input type="hidden" name="total_amount" value="0000"></div>
                                    </div>
                                    <div class="clear-fix my-2"></div>
                                    <div class="text-right">
                                        <button class="btn btn-default border btn-sm btn-flat" id="add_item" type="button"><i class="fa fa-plus"></i> Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-footer text-center">
                            <button class="btn btn-lg btn-flat btn-primary" type="submit" form="cargo-form">Save</button>
                            <a class="btn btn-lg btn-flat btn-default border" href="./?page=transactions">Cancel</a>
                        </div>
                     </div>

                </form>
            </div>
        </div>
    </div>
    <noscript id="cargo-item-clone">
        <div class="d-table-row align-items-center justify-content-center my-0 py-0 cargo-item">
            <div class="d-table-cell col-3 px-2 py-1 border text-center">
                <input type="hidden" name="price[]">
                <input type="hidden" name="total[]">
                <div class="mb-3">
                    <select name="cargo_type_id[]" class="form-control select2" required>
                        <option value="" disabled='' selected>Select</option>
                        @foreach($cargoTypes as $row):
                            <option value="{{$row->id}}" {{ $cargoData->shipping_type === $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-table-cell col-3 px-2 py-1 border text-right"><span class="font-weight-bold price">0.00</span></div>
            <div class="d-table-cell col-3 px-2 py-1 border text-center">
                <input type="number" step="any" name="weight[]" class="form-control form-control-sm 
                form-control-border text-right" required></div>
            <div class="d-table-cell col-3 px-2 py-1 border text-right"><span class="font-weight-bold total">0.00</span></div>
        </div>
    </noscript>
@endsection
@php 
    $cargo_type = [];
    foreach ($cargoTypes as $key => $row) {
        $cargo_type[$row['id']] = $row;
    }
@endphp
 


@section('page-script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
<script type="text/javascript">
    var cargo_type = {!! json_encode($cargo_type, JSON_HEX_TAG) !!};
    console.log(cargo_type)

    function change_price(_this, cargo_type_id){
        var type = $('#shipping_type').val()
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
        console.log('type id ' + id)
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