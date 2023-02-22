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
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">ADD NEW SHIPMENT's DETAILS </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Add New Sipment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">WEIGHT BASED SHIPMENT(KG)</span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">FREIGHT BASED SHIPMENT(CBM)</span> 
                        </a>
                    </li>
                </ul>

                <div class="tab-content p-3 text-muted">
                    <input type="hidden" id="curr_val" value="">
                    {{-- TAB1 PANEL --}}
                    <div class="tab-pane active" id="tab1" role="tabpanel">
                        @include('dashboard.admin.cargo_operation.shipment_transactions._weight_based_form')
                    </div>

                    {{-- TAB2 PANEL --}}
                    <div class="tab-pane" id="tab2" role="tabpanel">
                        @include('dashboard.admin.cargo_operation.shipment_transactions._freight_based_form')
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @php //dd($cargoTypes) 
    @endphp
    
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
<script>
    const cargo_type = {!! json_encode($w_cargo_type, JSON_HEX_TAG) !!};
    const f_cargo_type = {!! json_encode($f_cargo_type, JSON_HEX_TAG) !!};
    // console.log(cargo_type)
    // console.log(f_cargo_type)

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

        // var type = $('#shipping_type').val()
        // console.log('shipping_type type '+type +" cargo_type_id ->" + cargo_type_id)
        // console.log(!!cargo_type[cargo_type_id])

        // if(!!cargo_type[cargo_type_id]){
        //     if(type == 1){
        //         var price = cargo_type[cargo_type_id].city_price
        //     }else if(type == 2){
        //         var price = cargo_type[cargo_type_id].state_price
        //     }else if(type == 3){
        //         var price = cargo_type[cargo_type_id].country_price
        //     }else{
        //         var price = 0;
        //     }
        //     console.log('price '+price)
        //     _this.find("input[name='price[]']").val(price)
        //     _this.find(".price").text(parseFloat(price).toLocaleString("en-US"))
        //     calc()
        // }
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
        // curr_val
        let curr_val = String($('#curr_val').val())
        $('.curr_val').text(curr_val) 
    }

    $(document).ready(function(){
        var rowIdx = 0;
        var shipType = 'W'
        var curr_val = String($('#currency').val())
        $('.curr_val').text(curr_val)

        updateCurrency()

        $('.select2').select2({
            width:"100%",
            placeholder:"Please Select Here"
        })

        // WHEN Package change
        
        $('#package_type').change(function(){
            
        })

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

        
        $('#currency').on('change', function (e) {
            e.preventDefault()
            $('#curr_val').val($(this).val())
            // shipType = 'W'
            console.log($('#curr_val').val($(this).val()))
            updateCurrency()
        });
        $('#fcurrency').on('change', function (e) {
            e.preventDefault()
            // shipType = 'F'
            // console.log(shipType)
            $('#curr_val').val($(this).val())
            // shipType = 'W'
            console.log($('#curr_val').val($(this).val()))
            updateCurrency()
        });

        $('#addBtn').on('click', function (e) {
            e.preventDefault()
            // rowIdx = rowIdx+1
            ++rowIdx
            console.log('rowIdx -- '+rowIdx + 'curVal '+ curVal)

            var item = $($('noscript#cargo-item-line-clone').html()).clone()
            // console.log('item : '+ item)
            // $('#tbody').append(item)

            // $('#tbody .rowLine').each(function(){
            //     console.log('row Id : '+this.id)
            //     // this.id = 'R'+rowIdx
            //     // console.log(this.id)
            //     // $(this).find('.rowLineNo').text(this.id)

            //     // Getting <tr> id.
            //     var id = $(this).attr('id');
            //     console.log('old id :' + id)
                
            //     this.id = 'R'+rowIdx

            //     var nid = $(this).attr('id');
            //     console.log('new id :' + nid)

            //     rowVal =  nid.substr(1)
            //     console.log('rowVal :' + rowVal)
            //     // $('#'+id+' .rowLineNo').text(rowVal)
            //     // $(this).find('#'+nid).children('.row-index').children('span').text(rowVal)
            //     var idx = $(this).children(nid + ' .row-index').children('span').text();
            //     console.log('idx : '+ idx)
            //     console.log('spanVal = ' +
            //     $(this).find(this.id).children('.row-index').children('span').text()
            //     // $(this).find('#'+nid +' .rowLineNo').text()
            //     )
            //     // $(this).find('#'+id).children('.row-index').children('span').text(rowVal)
            //     // $(this).attr('id').children('.row-index').children('span').text(rowVal)
                
            //     // Getting the <span> inside the .row-index class.
            //     // $(this).children('.row-index').children('span').text()
            //     // var idx = $(this).children('.row-index').children('span');
            //     // console.log('span' + idx)

            //     // // Gets the row number from <tr> id.
            //     // var dig = parseInt(id.substring(1));

            //     // // Modifying row index.
            //     // idx.html(`${dig - 1}`);

            //     // // Modifying row id.
            //     // $(this).attr('id', `R${dig - 1}`);
            // })

            // Adding a row inside the tbody.
            html = ''
            // html = '<noscript id="cargo-item-line-clone">'
            html += '<tr id="R'+rowIdx+'">'
            html += '<td class="row-index text-center" width="5%"><span>'+rowIdx+'</span></td>'
            html += '<td><textarea name="item_desc[]" id="item_desc" class="form-control form-control-sm"></textarea></td>'
            html += '<td><input type="hidden" name="price[]"><input type="hidden" name="total[]">'
            html += '    <div class="mb-3">'
            html += ' <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>'
            html += '     <option value="" disabled selected >Select type</option>'
            // cargo_type.each()
            $.each(cargo_type, function( index, value ) {
                // console.log(index + " v : " +value.name)
                html += ' <option value="'+index+'">'+value.name+'</option>'
            })
            html += '</select> </div> </td>'
            html += '<td><input type="text" name="curr_val[]" class="form-control curr_val" value="'+curVal+'" readonly></td>'
            html += '<td><span class="font-weight-bold price">0.00</span></td>'
            html += '<td><input type="number" step="0.01" name="weight[]" class="form-control form-control-sm" required></td>'
            html += '<td><span class="font-weight-bold total">0.00</span></td>'
            html += '<td width="5%" class="text-center">'
            html += '<button class="btn btn-danger remove" type="button">x</button></td>'
            html += '</tr>'
            // html += '</noscript>'

            // var item = $($('noscript#cargo-item-line-clone').html()).clone()
            
            
            $('noscript#wcargo-tobe-clone').html(html)
            var item = $($('noscript#wcargo-tobe-clone').html()).clone()
            $('#tbody').append(html)
            // $('#tbody').append(`
            //     <tr id="R${++rowIdx}">
            //         <td class="row-index text-center" width="5%"><span>01</span></td>
            //         <td>
            //             <textarea name="item_desc[]" id="item_desc" class="form-control form-control-sm"></textarea>
            //         </td>
            //         <td><input type="hidden" name="price[]">
            //             <input type="hidden" name="total[]">
            //             <input type="number" name="quantity[]" class="form-control" required>
            //             <div class="mb-3">
            //                 <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>
            //                     <option value="" disabled='' selected =''>Select type</option>
            //                     @foreach($wCargoTypes as $row):
            //                         <option value="{{$row->id}}">{{$row->name}}</option>
            //                     @endforeach
            //                 </select>
            //             </div>
            //         </td>
            //         <td><input type="text" name="curr_val[]" class="form-control curr_val" value="${curVal}" readonly></td>
            //         <td><span class="font-weight-bold price">0.00</span></td>
                    
            //         <td><input type="number" step="0.01" name="weight[]" class="form-control form-control-sm" required></td>
            //         <td><span class="font-weight-bold total">0.00</span></td>
            //         <td width="5%" class="text-center">
            //             <button class="btn btn-danger remove" type="button">x</button>
            //         </td>
            //     </tr>    
            // `);
            // var item = $($('noscript#cargo-item-clone').html()).clone()
           
            console.log('item : '+ item)
            item.find("[name='cargo_type_id[]']").change(function(){
                var id = $(this).val();
                console.log('cargo_type_id changed on add / id-> ' + id)
                change_price(item, id)
            })
            item.find('[name="weight[]"]').on('input',function(){
                console.log('test')
                calc()
            })
            
        });

        function cloneWeightBasedLineItem($rowIdx){

        }

        $('#currency').on('change', function (e) {
            e.preventDefault()
            updateCurrency(shipType)
        });

        // fcurrency

        

        // $('#cargo-form').submit(function(e){
        //     e.preventDefault();
        //     var _this = $(this)
        //         $('.err-msg').remove();
        //     start_loader();
        //     $.ajax({
        //         url:"/admin/cargo/cargotype/store-or-update",
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
    })
    

 </script>
@endsection