<form method="post" action="{{ route('store-new-shipment') }}" id="w_cargo-form">
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
                        <input type="hidden" name ="shipType"  value="W">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ref_code" class="form-label">Shipment Code<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="ref_code" name="ref_code" value="{{$refcode}}" required readonly>
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
                                    <input type="text" class="form-control"  id="sender_provided_code"  value="" name="sender_provided_code">
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
                                <input type="text" class="form-control"  id="sender_name" name="sender_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="sender_contact" name="sender_contact" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="sender_address" id="sender_address" class="form-control form-control-sm rounded-0" required></textarea>
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
                                <input type="text" class="form-control"  id="receiver_name" name="receiver_name">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_contact" class="form-label">Contact #<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="receiver_contact" name="receiver_contact">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <textarea rows="3" name="receiver_address" id="receiver_address" class="form-control form-control-sm rounded-0" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Sender Information</h3>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">Extra Content Details Information (For Custom Requirement)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="3" name="content_details_info" id="content_details_info" class="form-control form-control-sm rounded-0" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">From Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="2" name="from_location" id="from_location" class="form-control form-control-sm rounded-0" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="to_location" class="form-label">To Location<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea rows="2" name="to_location" id="to_location" class="form-control form-control-sm rounded-0" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Shipping Type <span class="text-danger">*</span></label>
                                <select name="shipping_type" id="shipping_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                    <option value="3">Country to Country</option>
                                    <option value="2">State to State</option>
                                    <option value="1">City to City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Package Type<span class="text-danger">*</span></label>
                                <select name="package_type" id="package_type" class=" form-select form-control form-control-sm  form-control-border" required>
                                    <option value="1">Single package</option>
                                    <option value="2">Grouping</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency<span class="text-danger">*</span></label>
                                <select name="currency" id="currency" class=" form-select form-control form-control-sm  form-control-border" required>
                                    <option value="USD($)">USD($)</option>
                                    <option value="EURO(€)">EURO(€)</option>
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
                        <div class="col-3 border text-center"><b>Cargo Type</b></div>
                        <div class="col-2 border text-center"><b>Price</b></div>
                        <div class="col-2 border text-center"><b>Weight/kg.</b></div>
                        <div class="col-2 border text-center"><b>Total</b></div>
                    </div>

                    <div id="cargo-item-list" class="d-table w-100">
                        <div class="d-table-row align-items-center justify-content-center 
                            my-0 py-0 cargo-item">
                        </div>
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
            <button class="btn btn-lg btn-flat btn-primary" type="submit" >Save</button>
            <a class="btn btn-lg btn-flat btn-default border" href="{{ route('admin-view-shipment-list')}}">Cancel</a>
        </div>
     </div>
</form>

<noscript id="cargo-item-clone">
    <div class="d-table-row align-items-center justify-content-center my-0 py-0 cargo-item">
        <div class="d-table-cell col-3 px-1 py-1 border text-center">
            <textarea name="item_desc[]" id="item_desc"  class="form-control form-control-sm"></textarea>
        </div>
        <div class="d-table-cell col-3 px-2 py-1 border text-center">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
            <div class="mb-3">
                {{-- <label class="form-label">Single Select</label> --}}
                <select name="cargo_type_id[]" class="form-control form-control-sm form-control-border select2" required>
                    <option value="" disabled='' selected =''>Select type</option>
                    @foreach($wCargoTypes as $row):
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-table-cell col-2 px-2 py-1 border text-right"><span class="font-weight-bold price">0.00</span></div>
        <div class="d-table-cell col-2 px-2 py-1 border text-center">
            <input type="number" step="any" name="weight[]" class="form-control form-control-sm
             form-control-border text-right" required></div>
        <div class="d-table-cell col-2 px-2 py-1 border text-right"><span class="font-weight-bold total">0.00</span></div>
    </div>
</noscript>