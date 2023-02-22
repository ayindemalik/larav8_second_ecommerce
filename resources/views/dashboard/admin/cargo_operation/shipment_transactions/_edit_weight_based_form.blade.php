<form method="post" action="{{ route('store-shipment-update') }}" id="w_cargo-form">
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
                        <input type="hidden" name ="shipType"  value="W">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ref_code" class="form-label">Shipment Code<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="ref_code" name="ref_code" value="{{$cargoData->ref_code}}" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="status" class="control-label">Countries</label>
                                <select class="form-select form-control-md form-control" name="w_country" id="w_country" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id == $cargoData->country_id ? 'selected=""':'' }}>{{$country->country_name_en}}</option>
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
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="sender_name" name="sender_name"
                                value="{{$cargoData->sender_name ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="sender_contact" name="sender_contact"
                                value="{{$cargoData->sender_contact ?? ''}}"  required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="sender_address" id="sender_address" class="form-control form-control-sm rounded-0"
                                required>{{$cargoData->sender_address ?? ''}}</textarea>
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
                                value="{{$cargoData->receiver_name ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="receiver_contact" name="receiver_contact" 
                                value="{{$cargoData->receiver_contact ?? ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="receiver_address" id="receiver_address" 
                                class="form-control form-control-sm rounded-0" required>{{$cargoData->receiver_address ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- OTHER INFO -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">Extra Content Details Information (For Custom Requirement)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="3" name="content_details_info" id="content_details_info" 
                                    class="form-control form-control-sm rounded-0" required>{{$cargoData->content_details_info ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">From Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="2" name="from_location" id="from_location" 
                                    class="form-control form-control-sm rounded-0" required>{{$cargoData->from_location ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="to_location" class="form-label">To Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="2" name="to_location" id="to_location" 
                                    class="form-control form-control-sm rounded-0" required>{{$cargoData->to_location ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Shipping Type <span class="text-danger">*</span></label>
                                <select name="shipping_type" id="shipping_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                    <option value="3"{{3 == $cargoData->shipping_type ? 'selected=""':'' }}>Country to Country</option>
                                    <option value="2"{{2 == $cargoData->shipping_type ? 'selected=""':'' }}>State to State</option>
                                    <option value="1"{{1 == $cargoData->shipping_type ? 'selected=""':'' }}>City to City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Package Type<span class="text-danger">*</span></label>
                                <select name="package_type" id="package_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                    <option value="1" {{1 == $cargoData->package_type ? 'selected=""':'' }}>Single package</option>
                                    <option value="2" {{2 == $cargoData->package_type ? 'selected=""':'' }}>Grouping</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency<span class="text-danger">*</span></label>
                                <select name="currency" id="currency" class=" form-select form-control form-control-sm  form-control-border" required>
                                    {{-- <option value="USD($)">USD($)</option>
                                    <option value="EURO(€)">EURO(€)</option> --}}
                                    <option value="$" {{"$" == $cargoData->currency ? 'selected=""':'' }}>USD($)</option>
                                    <option value="€" {{"€" == $cargoData->currency ? 'selected=""':'' }}>EURO(€)</option>
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
                        <div class="col-3 border text-center"><b>Description</b></div>
                        <div class="col-3 border text-center"><b>Cargo Type</b></div>
                        <div class="col-2 border text-center"><b>Price</b></div>
                        <div class="col-1 border text-center"><b>Weight/kg.</b></div>
                        <div class="col-1 border text-center"><b>Discount(%)</b></div>
                        <div class="col-2 border text-center"><b>Total</b></div>
                    </div>
                    
                    <div id="cargo-item-list" class="d-table w-100">
                        @php 
                            $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get();
                            $all_total = 0;
                        @endphp
                        {{-- @if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0) --}}
                            @foreach($cargoItems as $item)
                                <div class="d-table-row align-items-center justify-content-center 
                                    my-0 py-0 cargo-item">
                                    <div class="d-table-cell col-3 px-1 py-1 border text-center">
                                        <textarea name="item_desc[]" id="item_desc"  class="form-control form-control-sm">{{$item->item_desc}}</textarea>
                                    </div>
                                    <div class="d-table-cell col-3 px-2 py-1 border text-center">
                                        <input type="hidden" name="price[]" value="{{$item->price}}">
                                        <input type="hidden" name="total[]" value="{{$item->total}}">
                                        <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2">
                                            <option value="" disabled='' selected>Select type</option>
                                            @foreach($cargoTypes as $crow)
                                            <option value="{{$crow->id}}" {{$item->cargo_type_id == $crow->id ? 'selected':''}}> {{$crow->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @php 
                                        $price = $comonFunc->format_num($item->price); 
                                        $total = $comonFunc->format_num($item->total); 
                                        $all_total += $comonFunc->format_num($total) ;
                                    @endphp
                                    {{-- Price  --}}
                                    <div class="d-table-cell col-2 px-2 py-1 border text-center">
                                        <span class="font-weight-bold curr_val text-bold"></span>
                                        <span class="font-weight-bold price">{{$price}}</span></div>
                                    {{-- weight  --}}
                                    <div class="d-table-cell col-1 px-2 py-1 border text-center"><input type="number" step="0.01" name="weight[]" 
                                        class="form-control form-control-sm form-control-border text-center" value="{{$item->weight}}"></div>
                                    {{-- discount  --}}
                                    <div class="d-table-cell col-1 px-2 py-1 border text-center"><input type="number" step="0.1" name="discount[]" 
                                        class="form-control form-control-sm form-control-border text-center" value="{{$item->discount}}"></div>
                                    {{-- line total  --}}
                                    <div class="d-table-cell col-2 px-2 py-1 border text-center">
                                        <span class="font-weight-bold curr_val text-bold"></span>
                                        <span class="font-weight-bold total">{{$total}}</span>
                                    </div>
                                </div>
                            @endforeach
                        {{-- @endif --}}
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                        <div class="col-9 border text-center"><b>Total</b></div>
                        <div class="col-3 border text-center">
                            <span class="font-weight-bold curr_val text-bold"></span>
                            <b id="gtotal">{{$all_total}}</b>
                            <input type="hidden" name="total_amount" value="{{$all_total}}">
                        </div>
                    </div>
                    <div class="clear-fix my-2"></div>

                    <div class="text-right">
                        <button class="btn btn-info border btn-md btn-flat" id="add_item" type="button">
                            <i class="mdi mdi-plus-box-multiple btn-md"></i> Add Item</button>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="row">
        <div class="card-footer text-center">
            <button class="btn btn-lg btn-flat btn-primary" type="submit" >Save</button>
            <a class="btn btn-lg btn-flat btn-default border" href="{{ route('admin-view-shipment-list')}}">Cancel</a>
        </div>
     </div>
</form>


@include('dashboard.admin.cargo_operation.shipment_transactions._weight_noscript')