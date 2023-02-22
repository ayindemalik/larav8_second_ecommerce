<form method="post" action="{{ route('store-shipment-update') }}" id="w_cargo-form">
    @csrf
    <input type="hidden" class="form-control"  id="ship_id" name="ship_id" value="{{$cargoData->id}}">
    <div class="row">
        <!-- SHIPMENT META INFO -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Shipment Information</h3></div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name ="shipType"  value="W">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="ref_code" class="form-label">Shipment Code</label>
                                <div class="input-group">{{$cargoData->ref_code}}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="status" class="control-label">Country</label>
                                <div class="input-group">{{$cargoData->country_id}}</div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="sender_provided_id" class="form-label">Sender Provided Secret Code</label>
                                <div class="input-group">{{$cargoData->sender_provided_code}}</div>
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
                            <div class="input-group">{{$cargoData->sender_name ?? ''}}</div>
                            <div class="input-group">{{$cargoData->sender_name}}</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_contact" class="form-label">Contact : </label>
                            <div class="input-group">{{$cargoData->sender_contact}}</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="sender_address" class="form-label">Address</label>
                            <div class="input-group">{{$cargoData->sender_address}}</div>
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
                            <div class="input-group">{{$cargoData->receiver_name}}</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_contact" class="form-label">Contact #</label>
                            <div class="input-group">{{$cargoData->receiver_contact}}</div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="receiver_address" class="form-label">Address</label>
                            <div class="input-group">{{$cargoData->receiver_address}}</div>
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
                                <label for="content_details_info" class="form-label">Extra Content Details Information (For Custom Requirement)</label>
                                <div class="input-group">{{$cargoData->content_details_info}}</div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="from_location" class="form-label">From Location</label>
                                <div class="input-group">{{$cargoData->from_location}}</div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="to_location" class="form-label">To Location</label>
                                <div class="input-group">{{$cargoData->to_location}}</div>
                                <div class="input-group">{{$cargoData->to_location ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Shipping Type </label>
                                @if($cargoData->shipping_type == 1) City to City @endif
                                @if($cargoData->shipping_type == 2) State to State @endif
                                @if($cargoData->shipping_type == 3 ) Country to Country @endif
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Package Type : </label>
                                @if($cargoData->package_type == 1 ) Single Package @endif
                                @if($cargoData->package_type == 2 ) Grouping @endif
                            </div>
                        </div>

                        <div class="col-xl-2">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency: </label>
                                @if($cargoData->currency == "$" ) USD($) @endif
                                @if($cargoData->currency == "€" ) EURO(€) @endif
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
                        <div class="col-3 border text-center"><strong>Description</strong></div>
                        <div class="col-3 border text-center"><strong>Cargo Type</strong></div>
                        <div class="col-2 border text-center"><strong>Price</strong></div>
                        <div class="col-1 border text-center"><strong>Weight/kg.</strong></div>
                        <div class="col-1 border text-center"><strong>Discount(%)</strong></div>
                        <div class="col-2 border text-center"><strong>Total</strong></div>
                    </div>
                    
                    <div id="cargo-item-list" class="d-table w-100">
                        @php 
                            $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get();
                            $all_total = 0;
                        @endphp
                        {{-- @if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0) --}}
                        @foreach($cargoItems as $item)
                            <div class="d-table-row align-items-center justify-content-center my-0 py-0 cargo-item">
                                <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                                    <div class="col-3 px-1 py-1 border text-center">{{$item->item_desc}}</div>
                                    <div class="col-3 px-2 py-1 border text-center">
                                        @php $cargType = App\Models\CargoTypeList::where('id', $item->cargo_type_id)->get(); @endphp
                                        <b>{{$cargType[0]->name}}</b>
                                    </div>
                                    @php 
                                        $price = $comonFunc->format_num($item->price); 
                                        $total = $comonFunc->format_num($item->total); 
                                        $all_total += $comonFunc->format_num($total) ;
                                    @endphp
                                    {{-- Price  --}}
                                    <div class="col-2 px-2 py-1 border text-center">
                                        <span class="font-weight-bold curr_val text-bold"><b>{{ $cargoData->currency }}</b></span>
                                        <span class="font-weight-bold price">{{$price}}</span>
                                    </div>
                                    {{-- weight  --}}
                                    <div class="col-1 px-2 py-1 border text-center">{{$item->weight}}</div>
                                    {{-- discount  --}}
                                    <div class="col-1 px-2 py-1 border text-center">{{$item->discount}}</div>
                                    {{-- line total  --}}
                                    <div class="col-2 px-2 py-1 border text-center">
                                        <span class="font-weight-bold curr_val text-bold"><b>{{ $cargoData->currency }}</b></span>
                                        <span class="font-weight-bold total">{{$total}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endif --}}
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-0 pb-0">
                        <div class="col-9 border text-center"><b>Total</b></div>
                        <div class="col-3 border text-center">
                            <span class="font-weight-bold curr_val text-bold"><b>{{ $cargoData->currency }}</b></span>
                            <b id="gtotal">{{$all_total}}</b>
                            <input type="hidden" name="total_amount" value="{{$all_total}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>