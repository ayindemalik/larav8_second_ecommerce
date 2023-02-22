<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jalla Shipment Details</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style type="text/css">  
        </style> 
        <style>
            @page { 
                margin:5px; font-size: 0.8em; 
            }
        </style>
    </head>
    <body>
        <div class="container">
            @php $comonFunc = new App\Http\Controllers\Backend\CommonFunctions; @endphp          
            <div class="row">
                <!-- SHIPMENT META INFO -->
                    <table class="table table-bordered table-sm ">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="data:image/png;base64, 
                                    <?php echo base64_encode(file_get_contents(base_path('public/frontend/assets/images/logo/jalla_logo.jpeg'))); ?>" 
                                    height="55" width="65" class="logo-light mx-auto" alt="">
                                </td>
                                @if($cargoData->ship_process_type == 'W')
                                    <th colspan="3"><h3 style="text-align: center">Weight Shipment Details Information</h3> </th>
                                @elseif($cargoData->ship_process_type == 'F')
                                <th colspan="3"><h3 style="text-align: center">Freight Shipment Details Information</h3> </th>
                                @endif
                            </tr>
                            <tr>
                                <th>Shipment Code:</th> 
                                <td colspan="2"><strong>{{$cargoData->ref_code}}</strong></td> 
                                <th>Status:
                                    @if($cargoData->status == 1) <span class="badge badge-pill text-white bg-info"> In-Transit </span>
                                    @elseif($cargoData->status == 2) <span class="badge badge-pill text-white bg-warning"> Arrived at Station </span>
                                    @elseif($cargoData->status == 3) <span class="badge badge-pill text-white bg-primary"> Ready for Delivery </span>
                                    @elseif($cargoData->status == 4) <span class="badge badge-pill text-white bg-success"> Delivered</span>
                                    @else <span class="badge badge-pill text-white bg-dark"> Pending </span>@endif
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">Sender Information</th>
                                <th colspan="2">Receiver Information</th>
                            </tr>
                            <tr>      
                                <th>Full Name :</th>
                                <td>{{$cargoData->sender_name}}</td>
                                <th>Full Name :</th>
                                <td>{{$cargoData->receiver_name}}</td>
                            </tr>
                            <tr>
                                <th>Contact :</th>
                                <td>{{$cargoData->sender_contact}}</td>
                                <th>Contact :</th>
                                <td>{{$cargoData->receiver_contact}}</td>
                            </tr>
                            <tr>
                                <th>Address :</th>
                                <td>{{$cargoData->sender_address}}</td>
                                <th>Address :</th>
                                <td>{{$cargoData->receiver_address}}</td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Extra Content Details Information (For Custom Requirement)</strong><br>
                                {{$cargoData->content_details_info}} </td>
                                
                            </tr>
                            
                            <tr>      
                                <td colspan="2">
                                    <strong>From Location:</strong>  {{$cargoData->from_location}}
                                </td>
                                <td colspan="2">
                                    <strong>To Location: </strong> {{$cargoData->to_location}}
                                </td>
                            </tr>
                            <tr>      
                                <td colspan="2">
                                    <strong>Shipping Type: </strong> 
                                    @if($cargoData->shipping_type == 1 ) City to City @endif
                                    @if($cargoData->shipping_type == 2 ) State to State @endif
                                    @if($cargoData->shipping_type == 3 ) Country to Country @endif
                                </td>
                                <td colspan="2">
                                    <strong>Packages Type :</strong>
                                    @if($cargoData->package_type == 1 ) Single Package @endif
                                    @if($cargoData->package_type == 2 ) Grouping @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-sm">
                        <tbody>
                            @php 
                                $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get(); 
                                $all_total = 0;
                            @endphp
                            @if($cargoData->ship_process_type == 'W')
                            <tr><th colspan="6" class="text-center">Cargo Items</th></tr>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Cargo Type</th> 
                                <th class="text-center">Price</th> 
                                <th class="text-center">Weight/kg.</th> 
                                <th class="text-center">Discount(%)</th> 
                                <th class="text-center">Total</th>
                            </tr>
                        
                            @foreach($cargoItems as $item)
                                <tr>
                                    <td class="text-start">{{$item->item_desc}}</td>
                                    @php $cargType = App\Models\CargoTypeList::where('id', $item->cargo_type_id)->get(); @endphp
                                    <td class="text-start">{{$cargType[0]->name}}</td>
                                    @php 
                                        $price = $comonFunc->format_num($item->price); 
                                        $total = $comonFunc->format_num($item->total); 
                                        $all_total += $comonFunc->format_num($total) ;
                                    @endphp
                                    <td class="text-start">{{$cargoData->currency}} {{$item->price}}</td>
                                    <td class="text-start">{{$item->weight}}</td>
                                    <td class="text-start">{{$item->discount}}</td>
                                    <td class="text-start">{{$cargoData->currency}} {{$total}}</td>
                                </tr>
                            @endforeach
                            <tr>      
                                <td colspan="3" class="text-left">
                                    <strong>TOTAL:</strong> 
                                </td>
                                <td colspan="3" class="text-start">
                                    <b>{{$cargoData->currency}} {{$cargoData->total_amount}}</b>
                                </td>
                            </tr>

                            @elseif($cargoData->ship_process_type == 'F')
                                <tr><th colspan="9" class="text-center">Cargo Items</th></tr>
                                <tr>
                                    <th class="text-start">Description</th>
                                    <th class="text-start">Cargo Type</th> 
                                    <th class="text-start">Price</th> 
                                    <th class="text-start">Quantity</th>
                                    <th class="text-start">Length(cm)</th>
                                    <th class="text-start">Width(cm)</th>
                                    <th class="text-start">Height(cm)</th> 
                                    <th class="text-start">Discount(%)</th> 
                                    <th class="text-start">Total</th>
                                </tr>
                                @foreach($cargoItems as $item)
                                    <tr>
                                        <td class="text-center">{{$item->item_desc}}</td>
                                        @php $cargType = App\Models\CargoTypeList::where('id', $item->cargo_type_id)->get(); @endphp
                                        <td class="text-center">{{$cargType[0]->name}}</td>
                                        @php 
                                            $price = $comonFunc->format_num($item->price); 
                                            $total = $comonFunc->format_num($item->total); 
                                            $all_total += $comonFunc->format_num($total) ;
                                        @endphp
                                        <td class="text-center">{{$cargoData->currency}} {{$item->price}}</td>
                                        <td class="text-center">{{$item->fQuantity}}</td>
                                        <td class="text-center">{{$item->fLength}}</td>
                                        <td class="text-center">{{$item->fWidth}}</td>
                                        <td class="text-center">{{$item->fHeight}}</td>
                                        <td class="text-center">{{$item->discount}}</td>
                                        <td class="text-center">{{$cargoData->currency}} {{$total}}</td>
                                    </tr>
                                @endforeach
                                <tr>      
                                    <td colspan="6" class="text-left">
                                        <strong>TOTAL:</strong> 
                                    </td>
                                    <td colspan="3" class="text-start">
                                        <b>{{$cargoData->currency}} {{$cargoData->total_amount}}</b>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
            </div>
 
        </div>