<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jalla Shipment Details</title>
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style type="text/css">  
            /* table td, table th{  
                border:1px solid black;  
            }   */
        </style> 
    </head>
    <body>
        {{-- <header>
            <img src= "public/frontend/assets/images/logo/Jalla_Logo-356x300.png" class="float-left ml-4" height="80px" width="160px">
            
            <h1 style="text-align: center">Shipment Details </h1> <br>
        </header> --}}
        
        <div class="container">
            @php $comonFunc = new App\Http\Controllers\Backend\CommonFunctions;
            
            @endphp          
            <div class="row">
                <!-- SHIPMENT META INFO -->
                {{-- <div class="col-md-12"> --}}
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    {{-- <img src="data:image/png;base64, 
                                    <?php// echo base64_encode(file_get_contents(base_path('public/frontend/assets/images/logo/Jalla_Logo-356x300.png'))); ?>" 
                                    height="30" class="logo-light mx-auto" alt=""> --}}

                                    <img src="data:image/png;base64, 
                                    <?php echo base64_encode(file_get_contents(base_path('public/frontend/assets/images/logo/jalla_logo.jpeg'))); ?>" 
                                    height="55" width="65" class="logo-light mx-auto" alt="">
                                    
                                </td>
                                <th colspan="3"><h3 style="text-align: center">Shipment Details Information</h3> </th>
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
                                <td>{{$cMetadata[0]->sender_name}}</td>
                                <th>Full Name :</th>
                                <td>{{$cMetadata[0]->receiver_name}}</td>
                            </tr>
                            <tr>
                                <th>Contact :</th>
                                <td>{{$cMetadata[0]->sender_contact}}</td>
                                <th>Contact :</th>
                                <td>{{$cMetadata[0]->receiver_contact}}</td>
                            </tr>
                            <tr>
                                <th>Address :</th>
                                <td>{{$cMetadata[0]->sender_address}}</td>
                                <th>Address :</th>
                                <td>{{$cMetadata[0]->receiver_address}}</td>
                            </tr>
                            <tr>      
                                <td colspan="2">
                                    <strong>From Location:</strong>  {{$cMetadata[0]->from_location}}
                                </td>
                                <td colspan="2">
                                    <strong>To Location: </strong> {{$cMetadata[0]->to_location}}
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
                            <tr><th colspan="4" class="text-center">Cargo Items</th></tr>
                            <tr>
                                <th class="text-center">Cargo Type</th> 
                                <th class="text-center">Price</th> 
                                <th class="text-center">Weight/kg.</th> 
                                <th class="text-center">Total</th>
                            </tr>
                        
                            @php $cargoItems = App\Models\CargoItems::where('cargo_id', $cargoData->id)->get(); @endphp
                                {{-- @if(isset($cargoItems) && is_array($cargoItems) && count($cargoItems)>0) --}}
                                
                            @foreach($cargoItems as $item)
                                <tr>
                                    @php $cargType = App\Models\CargoTypeList::where('id', $item->cargo_type_id)->get(); @endphp
                                    <td class="text-center">{{$cargType[0]->name}}</td>
                                    @php $price = $comonFunc->format_num($item->price); 
                                    $total = $comonFunc->format_num($item->total); @endphp
                                    <td class="text-center">{{$cargoData->currency}} {{$item->price}}</td>
                                    <td class="text-center">{{$item->weight}}</td>
                                    <td class="text-center">{{$cargoData->currency}} {{$total}}</td>
                                </tr>
                            @endforeach

                            <tr>      
                                <td colspan="2" class="text-center">
                                    <strong>TOTAL:</strong> 
                                </td>
                                <td colspan="2" class="text-center">
                                    <b>{{$cargoData->currency}} {{$cargoData->total_amount}}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                {{-- </div> --}}
            </div>
 
        </div>