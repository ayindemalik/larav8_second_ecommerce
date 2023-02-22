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
                            <h4 class="mb-sm-0">
                                @if($cargoData->ship_process_type == 'W')
                                    EDIT WEIGHT BASED SHIPMENT(KG)
                                @else
                                    EDIT FREIGHT BASED SHIPMENT(CBM)
                                @endif
                            </h4>
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
                @endphp

                <div class="tab-content p-3 text-muted">
                    @if($cargoData->ship_process_type == 'W')
                    {{-- TAB1 PANEL --}}
                        @include('dashboard.admin.cargo_operation.shipment_transactions._edit_weight_based_form')
                    @else

                    {{-- TAB2 PANEL --}}
                        @include('dashboard.admin.cargo_operation.shipment_transactions._edit_freight_based_form')
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection
@php 
    $w_cargo_type = [];
    foreach ($wCargoTypes as $key => $row) {
        $w_cargo_type[$row['id']] = $row;
    }

    $f_cargo_type = [];
    foreach ($fCargoTypes as $key => $row) {
        $f_cargo_type[$row['id']] = $row;
    }
@endphp


@section('page-script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
<script type="text/javascript">
    const cargo_type = {!! json_encode($w_cargo_type, JSON_HEX_TAG) !!};
    const f_cargo_type = {!! json_encode($f_cargo_type, JSON_HEX_TAG) !!};

    function change_price(_this, cargo_type_id){
        var type = $('#shipping_type').val()
        console.log('shipping_type type '+type +" cargo_type_id ->" + cargo_type_id)
        console.log(!!cargo_type[cargo_type_id])

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
            console.log('price '+price)
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
        updateCurrency()
    }

    // FOR FREIGH
    function changeFreightPice(_this, cargo_type_id){
        var type = $('#shipping_type').val()
        console.log('shipping_type type '+type +" cargo_type_id ->" + cargo_type_id)
        console.log(!!f_cargo_type[cargo_type_id])

        if(!!f_cargo_type[cargo_type_id]){
            var price = f_cargo_type[cargo_type_id].freight_price
            if(type == 1){
                var price = f_cargo_type[cargo_type_id].freight_price
            }else if(type == 2){
                var price = f_cargo_type[cargo_type_id].freight_price
            }else if(type == 3){
                var price = f_cargo_type[cargo_type_id].freight_price
            }else{
                var price = 0;
            }
            console.log('price '+price)
            _this.find("input[name='fprice[]']").val(price)
            _this.find(".fprice").text(parseFloat(price).toLocaleString("en-US"))
            freightCalc()
        }
    }

    function freightCalc(){
        var gtotal = 0;
        console.log('freightCalc..')
        $('#freight_cargo-item-list .freight-cargo-item').each(function(){
            console.log('for each..')
            var price = $(this).find('[name="fprice[]"]').val();
            var qty = $(this).find('[name="fQuantity[]"]').val();
            var len = $(this).find('[name="fLength[]"]').val();
            var wd = $(this).find('[name="fWidth[]"]').val();
            var ht = $(this).find('[name="fHeight[]"]').val();
            console.log( price + " - " + qty + " - " + (len/100) +" - " + (wd/100) +" - " + (ht/100) )
            price = price > 0 ? price : 0;
            qty = qty > 0 ? qty : 1;
            len = len > 0 ? len : 1;
            wd = wd > 0 ? wd : 1;
            ht = ht > 0 ? ht : 1;
            var total = parseFloat(price) * parseFloat(qty) * parseFloat(len/100) * parseFloat(wd/100) * parseFloat(ht/100)
            $(this).find('[name="ftotal[]"]').val(total)
            $(this).find('.ftotal').text(parseFloat(total).toLocaleString('en-US'))
            gtotal += parseFloat(total)
        })
        $('[name="ftotal_amount"]').val(gtotal)
        $('#fgtotal').text(parseFloat(gtotal).toLocaleString('en-US'))
        updateCurrency()
    }

    function updateCurrency(){
        let curr_val = String($('#currency').val())
        $('.curr_val').text(curr_val)
    }

$(document).ready(function(){
    var rowIdx = 0;
    var curr_val = String($('#currency').val())
    $('.curr_val').text(curr_val)
    // console.log('curr_val' + curr_val)

    $('#add_item').click(function(){
        console.log('add item line')
        var item = $($('noscript#cargo-item-clone').html()).clone()

        console.log('item : '+ item)

        $('#cargo-item-list').append(item)
        // item.find('.select2').select2({
        //     width:"100%",
        //     placeholder:"Please Select Here"
        // })
        item.find("[name='cargo_type_id[]']").change(function(){
            var id = $(this).val();
            console.log('cargo_type_id changed on add / id-> ' + id)
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
        console.log('cargo_type_id : ' + id)
        console.log('item : ' + item)
        change_price(item, id)
    })

    // IF WEIGHT INPUT VALUE IS CHANGED  
    $('[name="weight[]"]').on('input',function(){
        console.log('test')
        calc()
    })
    $('[name="wdiscount[]"]').on('input',function(){
        // console.log('ht')
        calc()
    })

    $('#shipping_type').change(function(){
        $('#cargo-item-list .cargo-item').each(function(){
            var id = $(this).find('[name="cargo_type_id[]"]').val()
            change_price($(this), id)
        })
    })

    // FOR FREIGHT
    $('#add_freigh_item').click(function(){
        console.log('add freigh item line')
        var item = $($('noscript#freight_crg_item_clone').html()).clone()

        console.log('item : '+ item)

        $('#freight_cargo-item-list').append(item)
        item.find('.select2').select2({
            width:"100%",
            placeholder:"Please Select Here"
        })
        item.find("[name='f_cargo_type_id[]']").change(function(){
            var id = $(this).val();
            console.log('f_cargo_type_id changed on add / id-> ' + id)
            changeFreightPice(item, id)
        })
        // item.find('[name="weight[]"]').on('input',function(){
        //     console.log('test')
        //     calc()
        // })

        $('[name="fQuantity[]"]').on('input',function(){
            console.log('qty')
            freightCalc()
            })
        $('[name="fLength[]"]').on('input',function(){
            console.log('len')
            freightCalc()
        })
        $('[name="fWidth[]"]').on('input',function(){
            console.log('wd')
            freightCalc()
        })

        $('[name="fHeight[]"]').on('input',function(){
            console.log('ht')
            freightCalc()
        })
    })

    $('[name="fQuantity[]"]').on('input',function(){
        // console.log('qty')
        freightCalc()
    })
    $('[name="fLength[]"]').on('input',function(){
        // console.log('len')
        freightCalc()
    })
    $('[name="fWidth[]"]').on('input',function(){
        // console.log('wd')
        freightCalc()
    })

    $('[name="fHeight[]"]').on('input',function(){
        // console.log('ht')
        freightCalc()
    })

    $('[name="fdiscount[]"]').on('input',function(){
        // console.log('ht')
        freightCalc()
    })

    
    $('#currency').on('change', function (e) {
        e.preventDefault()
        updateCurrency()
    });
})
    
 </script>
@endsection