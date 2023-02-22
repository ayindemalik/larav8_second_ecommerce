<form method="post" action="{{ route('user-store-new-shipment') }}" id="f_cargo-form">
    @csrf
    <div class="row">
        <!-- SHIPMENT META INFO -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipment Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name ="shipType"  value="F">
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="ref_code" class="form-label">Shipment Code<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="f_ref_code" name="f_ref_code" value="{{$cargoData->ref_code}}"  required readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="status" class="control-label">Countries</label>
                                <select class="form-select form-control-md form-control" name="f_country" id="f_country" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}"{{$country->id == $cargoData->country_id ? 'selected=""':'' }}>{{$country->country_name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="sender_provided_id" class="form-label">Sender Provided Secret Code<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="f_sender_provided_code"  value="{{$cargoData->sender_provided_code}}" name="f_sender_provided_code">
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
                            <label for="f_sender_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="f_sender_name" name="f_sender_name" 
                                value="{{$cargoData->sender_name ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="f_sender_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="f_sender_contact" name="f_sender_contact" 
                                value="{{$cargoData->sender_contact ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="f_sender_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="f_sender_address" id="f_sender_address" 
                                class="form-control form-control-sm rounded-0" required>{{$cargoData->sender_address ?? ''}}</textarea>
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
                            <label for="f_receiver_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="f_receiver_name" name="f_receiver_name"
                                value="{{$cargoData->receiver_name ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="f_receiver_contact" name="f_receiver_contact"
                                value="{{$cargoData->receiver_contact ?? ''}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="f_receiver_address" id="f_receiver_address" 
                                class="form-control form-control-sm rounded-0" required>{{$cargoData->receiver_address ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">Extra Content Details Information (For Custom Requirement)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="3" name="f_content_details_info" id="f_content_details_info" 
                                    class="form-control form-control-sm rounded-0" required>{{$cargoData->content_details_info ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">From Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="1" name="f_from_location" id="f_from_location" 
                                    class="form-control form-control-sm rounded-0" required>{{$cargoData->from_location ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="to_location" class="form-label">To Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="1" name="f_to_location" id="f_to_location" 
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

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Cargo Items</h3></div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                        <div class="col-3 border text-center"><b>Description</b></div>
                        <div class="col-2 border text-center"><b>CBM Cargo Type</b></div>
                        <div class="col-1 border text-center"><b>Price</b></div>
                        <div class="col-1 border text-center"><b>Quantity</b></div>
                        <div class="col-1 border text-center"><b>Length(cm)</b></div>
                        <div class="col-1 border text-center"><b>Width(cm)</b></div>
                        <div class="col-1 border text-center"><b>Height(cm)</b></div>
                        <div class="col-1 border text-center"><b>Discount(%)</b></div>
                        <div class="col-1 border text-center"><b>Total</b></div>
                    </div>

                    <div id="freight_cargo-item-list" class="d-table w-100">
                        @php 
                            $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get();
                            $all_total = 0;
                        @endphp
                        @foreach($cargoItems as $item)
                            <div class="d-table-row align-items-center justify-content-center my-0 py-0 freight-cargo-item">
                                <div class="d-table-cell col-3 px-1 py-1 border text-center">
                                    <textarea name="item_desc[]" id="item_desc" class="form-control form-control-sm">{{$item->item_desc}}</textarea>
                                </div>
                            
                                <div class="d-table-cell col-2 px-1 py-1 border text-center">
                                    <input type="hidden" name="fprice[]" value="{{$item->price}}">
                                    <input type="hidden" name="ftotal[]" value="{{$item->total}}">
                                    <div class="mb-1">
                                        <select name="f_cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>
                                            <option value="" disabled='' selected =''>Select type</option>
                                            @foreach($fCargoTypes as $row):
                                                <option value="{{$row->id}}" {{$item->cargo_type_id == $row->id ? 'selected':''}}> {{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @php 
                                    $price = $comonFunc->format_num($item->price); 
                                    $total = $comonFunc->format_num($item->total); 
                                    $all_total += $comonFunc->format_num($total) ;
                                @endphp
                                {{-- cbm Price Autom --}}
                                <div class="d-table-cell col-1 px-1 py-1 border text-right">
                                    <span class="font-weight-bold curr_val"></span>
                                    <span class="font-weight-bold fprice">{{$price}}</span></div>
                                {{-- cbm Price --}} 
                                <div class="d-table-cell col-1 px-1 py-1 border text-center">
                                    <input type="number" step="any" min="1" name="fQuantity[]" value="{{$item->fQuantity}}" class="form-control form-control-sm
                                    form-control-border text-right" required></div>
                                {{-- cbm fLength --}}
                                <div class="d-table-cell col-1 px-1 py-1 border text-center">
                                    <input type="number" step="any" min="0" name="fLength[]" value="{{$item->fLength}}" class="form-control form-control-sm
                                    form-control-border text-right" required></div>
                                {{-- cbm fWidth --}}
                                <div class="d-table-cell col-1 px-1 py-1 border text-center">
                                    <input type="number" step="any" min="0" name="fWidth[]" value="{{$item->fWidth}}" class="form-control form-control-sm
                                    form-control-border text-right" required></div>
                                {{-- cbm fHeight --}}
                                <div class="d-table-cell col-1 px-1 py-1 border text-center">
                                    <input type="number" step="any" min="0" name="fHeight[]" value="{{$item->fHeight}}" class="form-control form-control-sm
                                    form-control-border text-right" required></div>
                                {{-- discount  --}}
                                <div class="d-table-cell col-1 px-2 py-1 border text-center"><input type="number" step="0.1" name="discount[]" 
                                    class="form-control form-control-sm form-control-border text-center" value="{{$item->discount}}"></div>

                                <div class="d-table-cell col-1 px-2 py-1 border text-right">
                                    <span class="font-weight-bold curr_val"></span>
                                    <span class="font-weight-bold ftotal">{{$total}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                        <div class="col-9 border text-center"><b>Total</b></div>
                        {{-- <div class="col-3 border text-center"><b id="totalDiscount">0</b> --}}
                        <div class="col-3 border text-center">
                            <span class="font-weight-bold curr_val"></span>
                            <b id="fgtotal">{{$all_total}}</b>
                            <input type="hidden" name="f_total_amount" value="{{$all_total}}">
                        </div>
                    </div>

                    <div class="clear-fix my-2"></div>

                    <div class="text-right">
                        <button class="btn btn-info border btn-md btn-flat" id="add_freigh_item" type="button">
                            <i class="mdi mdi-plus-box-multiple btn-md"></i> Add Item</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-footer text-center">
            <button class="btn btn-lg btn-flat btn-primary" type="submit" >Save</button>
            <a class="btn btn-lg btn-flat btn-default border" href="{{route('admin-view-shipment-list')}}">Cancel</a>
        </div>
     </div>
</form>

@include('dashboard.admin.cargo_operation.shipment_transactions._freight_noscript')