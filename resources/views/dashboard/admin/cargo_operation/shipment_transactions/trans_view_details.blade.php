@extends('dashboard.dashboard_master')

@section('main_header')
    <div id="layout-wrapper">
        @include('dashboard.body_layout.admin_header')
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
                            <h4 class="mb-sm-0">
                            @if($cargoData->ship_process_type == 'W')
                                WEIGHT BASED SHIPMENT(KG) SHIPMENT's DETAILS
                            @else
                                FREIGHT BASED SHIPMENT(CBM) SHIPMENT's DETAILS
                            @endif
                            </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">View Sipment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @php $comonFunc = new App\Http\Controllers\Backend\CommonFunctions; @endphp
                <div class="tab-content p-3 text-muted">
                    @if($cargoData->ship_process_type == 'W')
                        @include('dashboard.admin.cargo_operation.shipment_transactions._view_weight_based_form')
                    @else
                        @include('dashboard.admin.cargo_operation.shipment_transactions._view_freight_based_form')
                    @endif
                </div>
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