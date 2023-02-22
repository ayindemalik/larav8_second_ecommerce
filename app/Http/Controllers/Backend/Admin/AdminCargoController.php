<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CargoTypeList;
use App\Models\CargoList;
use App\Models\CargoMetaData;
use App\Models\CargoItems;
use App\Models\Country;
use Carbon\Carbon;
use App\Http\Controllers\Backend\CommonFunctions;
use PDF;

class AdminCargoController extends Controller
{
    //

    // public function __construct(){
    //     $this->middleware('admin'); // THIS CALL Http/middleware/Authenticate::class to redirect to login
    // }

    public function manageCargoTypes(){
        $wCargoTypes = CargoTypeList::Where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::Where('type', 'F')->latest()->get();
        return view('dashboard.admin.cargo_operation.cargo_type.manage_all', compact('wCargoTypes', 'fCargoTypes'));
    }

    // New
    public function addNewCargoType(){
        $countries = Country::latest()->get();
        return view('dashboard.admin.cargo_operation.cargo_type.category_type_add', compact('countries'));
    }

    public function storeCategoryType(Request $request){
        // dd($request);
        // SAVE NEW 
        $insert_id = 0; 
        if($request->type === "W"){
            $existData = CargoTypeList::where('name', $request->crg_typ_name)
                                ->where('country_id', $request->country)
                                ->where('type', 'W');
            if(is_array($existData) && count($existData)>0){ // Alreaddy exist
                $notification = array(
                    'message' => 'Category type with given name already exist for the selected country',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $insert_id = CargoTypeList::insertGetId([
                    'type' => $request->type,
                    'country_id' => $request->country,
                    'name' => $request->crg_typ_name,
                    'description' => $request->crg_typ_desc,
                    'freight_price' => 1,
                    'city_price' => $request->city_price,
                    'state_price' => $request->state_price,
                    'country_price' => $request->country_price,
                    'status' => $request->_status,
                ]);
            }
        }

        if($request->type === "F"){
            $existData = CargoTypeList::where('name', $request->crg_typ_name)
                                ->where('country_id', $request->country)
                                ->where('type', 'F');
            if(is_array($existData) && count($existData)>0){ // Alreaddy exist
                $notification = array(
                    'message' => 'Category type with given name already exist for the selected country',
                    'alert-type' => 'error'
                );
                return redirect()->back('')->with($notification);
            }
            else{
                $insert_id = CargoTypeList::insertGetId([
                    'type' => $request->type,
                    'country_id' => $request->country,
                    'name' => $request->crg_typ_name,
                    'description' => $request->crg_typ_desc,
                    'freight_price' => $request->freight_price,
                    'city_price' => 1,
                    'state_price' => 1,
                    'country_price' => 1,
                    'status' => $request->_status,
                ]);
            }
        }
  
        if($insert_id > 0){
            $notification = array(
                'message' => 'Cargo type saved Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin-manage-cargo-types')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error! Cargo type was not Inserted Successfully',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    // UPDATE 
    // DELETE

    public function loadForm($action, $val){
        if($val != 0){
            $data = CargoTypeList::findOrFail($val);
            // $data['upid'] = ($val != 0) ? $val : 0;
            // dd($data);
            return view('dashboard.admin.cargo_operation.cargo_type.cargo_type_form', compact('data'));
        }
        else
            return view('dashboard.admin.cargo_operation.cargo_type.cargo_type_form');
    }

    public function editCategoryType($id){
        $formData = CargoTypeList::where('id', $id)->get();
        return json_encode($formData);
    }

    // public function storeCategoryType(Request $input){
    //     // dd($input);
    //     // $cargoTypes = CargoTypeList::latest()->get();
    //     // return view('dashboard.admin.cargo_operation.cargo_type.cargo_type_form', compact('cargoTypes'));
    //     // CHECK
    //     $existData = CargoTypeList::findOrFail($input->id);
    //     if(is_array($existData) && count($existData)>0){
    //         // UPDATE
    //         $notification = array(
    //             'message' => 'Category type will be updated ',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->back()->with($notification);
    //     }
    //     else{
    //         // CHECK If Name already exist
    //         $existData = CargoTypeList::where('name', $input->name);
    //         if(is_array($existData) && count($existData)>0){
    //             // Alreaddy exist
    //             $notification = array(
    //                 'message' => 'Category type already exist',
    //                 'alert-type' => 'success'
    //             );
    //             return redirect()->back()->with($notification);
    //         }
    //         else{
    //             // SAVE NEW 
    //             $insert_id = CargoTypeList::insertGetId([
    //                 'name' => $input->name,
    //                 'description' => $input->description,
    //                 'city_price' => $input->city_price,
    //                 'state_price' => $input->state_price,
    //                 'country_price' => $input->country_price,
    //                 'status' => $input->_status,
    //             ]);
    //             if($insert_id > 0){
    //                 $notification = array(
    //                     'message' => 'Category type Inserted Successfully',
    //                     'alert-type' => 'success'
    //                 );
    //                 return redirect()->back()->with($notification);
    //             }
    //             else {
    //                 $notification = array(
    //                     'message' => 'error! Category type was not Inserted Successfully',
    //                     'alert-type' => 'error'
    //                     );
    //                 return redirect()->back()->with($notification);
    //             }
    //         }
    //     }
        
    // }

    public function storeOrUpdateCategoryType(Request $request){
        if($request->form_id == 0 ){
            $existData = CargoTypeList::where('name', $request->name);
            if(is_array($existData) && count($existData)>0){
                // Alreaddy exist
                $notification = array(
                    'message' => 'Category type with given name already exist',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            else{
                // SAVE NEW 
                $insert_id = CargoTypeList::insertGetId([
                    'name' => $request->name,
                    'description' => $request->description,
                    'city_price' => $request->city_price,
                    'state_price' => $request->state_price,
                    'country_price' => $request->country_price,
                    'status' => $request->_status,
                ]);
                if($insert_id > 0){
                    $notification = array(
                        'message' => 'Category type Inserted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('admin-manage-cargo-types')->with($notification);
                }
                else {
                    $notification = array(
                        'message' => 'error! Category type was not Inserted Successfully',
                        'alert-type' => 'error'
                        );
                    return redirect()->back()->with($notification);
                }
            }
        }
        elseif ($request->form_id != 0){
            // dd($request);
            $existData = CargoTypeList::where('id',$request->form_id)->get();
            if(!empty($existData)){
                $updresp = CargoTypeList::where('id',$request->form_id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'city_price' => $request->city_price,
                    'state_price' => $request->state_price,
                    'country_price' => $request->country_price,
                    'status' => $request->_status,
                    'updated_at' => Carbon::now()
                ]);
                if($updresp > 0){
                    $notification = array(
                        'message' => 'Cargo Type Updated Succesfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('manage-cargo-types')->with($notification);
                }
                else{
                    $notification = array(
                        'message' => 'Cargo Type Could Not be Updated',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('manage-cargo-types')->with($notification);
                }
            }
            else{
                $notification = array(
                    'message' => 'No operation executed',
                    'alert-type' => 'error'
                );
                return redirect()->route('manage-cargo-types')->with($notification);
            }
        }
        // if($request->_action == 'ADD_CARGO_TYPE'){
        //     // $existData = CargoTypeList::findOrFail($request->id);
        //     $resp['status'] = 'success';
		// 	$resp['msg'] = $request;
		// 	return json_encode($resp);
		// 	exit;
        // }
        // elseif($request->_action == 'UPDATE_CARGO_TYPE'){
        //     // $resp['status'] = 'failed';
        //     // $resp['msg'] = dd($request);
        //     // return json_encode($resp);
            
        //     // $existData = CargoTypeList::findOrFail($request->id);
        //     // $existData = CargoTypeList::where('id', $request->id);
        //     // $resp['status'] = 'success';
		// 	// $resp['msg'] = $existData;
		// 	// return json_encode($resp);
		// 	// exit;

        //     $existData = CargoTypeList::where('id',$request->form_id)->get();
        //     // return json_encode($request);
        //     // exit;
        //     if(!empty($existData)){
        //         $updresp = CargoTypeList::where('id',$request->form_id)->update([
        //             'name' => $request->name,
        //             'description' => $request->description,
        //             'city_price' => $request->city_price,
        //             'state_price' => $request->state_price,
        //             'country_price' => $request->country_price,
        //             'status' => $request->_status,
        //             'updated_at' => Carbon::now()
        //         ]);
        //         $data = $request->form_id.'-'.$request->name.'-'.
        //                 $request->description.'-'.$request->city_price.'-'
        //                 .$request->state_price.'-'.$request->country_price.'-'.$request->_status;
        //         if($updresp > 0){
        //             $resp['data'] = $data;
        //             $resp['status'] = 'success';
        //             $resp['msg'] = 'Cargo Type Updated Succesfully';
        //             return json_encode($resp);
        //             exit;
        //         }
        //         else{
        //             $resp['data'] = $data;
        //             $resp['status'] = 'failed';
        //             $resp['msg'] = 'Cargo Type Not Updated';
        //             return json_encode($resp);
        //             exit;
        //         }
        //     }
        //     else{
        //         $resp['status'] = 'error';
        //         $resp['msg'] = 'Cargo Type Not found';
        //         return json_encode($resp);
        //         exit;
        //     }
        // }
        // else{
        //     $resp['status'] = 'failed';
        //     $resp['msg'] = 'No action specified';
        //     return json_encode($resp);
        //     exit;
        // }
        
    }
    public function deleteCategoryType($id){
        if(!empty(CargoTypeList::where('id',$id)->get())){
            $delOp = CargoTypeList::where('id',$id)->delete();
            if($delOp > 0){
                $notification = array(
                    'message' => 'Category type Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('manage-cargo-types')->with($notification);
            }
        }
        else {
            $notification = array(
                'message' => 'Category type Not exist',
                'alert-type' => 'error'
            );
            return redirect()->route('manage-cargo-types')->with($notification);
        }
        
    }
    
    // Shippments
    public function viewShipmentList(){
        $cargo_list = CargoList::latest()->get();
        return view('dashboard.admin.cargo_operation.shipment_transactions.trans_index', compact('cargo_list'));
    } 

    public function addNewShipment(){
        $countries = Country::latest()->get();
        $comonFunc = new CommonFunctions;
        $refcode = $comonFunc->generateUniqueRefCode();

        $cargo_list = CargoList::latest()->get();
        // $cargoData = CargoList::where('id', $id)->get();
        $wCargoTypes = CargoTypeList::where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::where('type', 'F')->latest()->get();
        // $data = CargoList::join('cargo_type_lists', 'cargo_type_lists.id', '=', 'cargo_items.cargo_type_id')
        //       		->get(['cargo_items.*', 'cargo_type_lists.name as cargo_type']);

        // return view('dashboard.admin.cargo_operation.shipment_transactions.add_new', compact('cargoData','cargoTypes'));
        return view('dashboard.admin.cargo_operation.shipment_transactions.add_shipment', compact('wCargoTypes', 'fCargoTypes', 'countries', 'refcode'));
    } 

    public function storeNewShipment(Request $request){
        // dd($request);
        // $pref = date("Ym");
        // $code = sprintf("%'.05d",1);
        // while(true){
        //     $check  = CargoList::where('ref_code', $pref.$code)->get();
        //     if(isset($check) && is_array($check))
        //         $code = sprintf("%'.05d",ceil($code) + 1);
        //     else 
        //         break;
        // }
        // $request['ref_code'] = $pref.$code;
        // dd($request);
        $cid = 0;

        $country = 0;
        if($request->shipType == 'W') {
           $country = $request->w_country; 
           $cid = CargoList::insertGetId([
            'ship_process_type' => $request->shipType,
            'ref_code' => $request->ref_code,
            'country_id' => $country,
            'shipping_type' => $request->shipping_type,
            'package_type' => $request->package_type,
            'sender_provided_code' => $request->sender_provided_code,
            'sender_name' => $request->sender_name, 
            'sender_contact'=> $request->sender_contact, 
            'sender_address' => $request->sender_address,  
            'receiver_name' => $request->receiver_name, 
            'receiver_contact' => $request->receiver_contact, 
            'receiver_address' => $request->receiver_address, 
            'content_details_info' => $request->content_details_info, 
            'from_location' => $request->from_location, 
            'to_location' => $request->to_location,
            'total_amount' => $request->total_amount,
            'currency' => $request->currency,
            'created_at' => Carbon::now(),
            ]);
        }

        if($request->shipType == 'F') {
           $country = $request->f_country; 
           $cid = CargoList::insertGetId([
            'ship_process_type' => $request->shipType,
            'ref_code' => $request->f_ref_code,
            'country_id' => $country,
            'shipping_type' => $request->shipping_type,
            'package_type' => $request->package_type,
            'sender_provided_code' => $request->f_sender_provided_code,
            'sender_name' =>$request->f_sender_name, 
            'sender_contact'=> $request->f_sender_contact, 
            'sender_address' =>$request->f_sender_address,  
            'receiver_name' => $request->f_receiver_name, 
            'receiver_contact' => $request->f_receiver_contact, 
            'receiver_address' => $request->f_receiver_address, 
            'content_details_info' => $request->f_content_details_info, 
            'from_location' => $request->f_from_location, 
            'to_location' => $request->f_to_location,
            'total_amount' => $request->f_total_amount,
            'currency' => $request->currency,
            'created_at' => Carbon::now(),
            ]);
        }

        if($cid > 0){
            $resp['status'] = 'success';
            $resp['msg'] = "Cargo saved successfuly";

            $total_items = 0;
            if($request->shipType == 'W'){
                $cargoType = $request->cargo_type_id;
                foreach($cargoType as $key => $val){
                    $sid = CargoItems::insertGetId([
                        'cargo_id' => $cid,
                        'item_desc' => $request->item_desc[$key],
                        'cargo_type_id' => $val,
                        'price' => $request->price[$key],
                        'curr_val' => $request->curr_val[$key] ?? '',
                        'weight' => $request->weight[$key],
                        'total' => $request->total[$key],
                    ]);
                    if($sid>0) $total_items++;
                }
                if($total_items == count($request->cargo_type_id)){
                    $resp['status'] = 'success';
                    $resp['msg'] = "All Shipment information saved successfuly";
                    
                    return redirect()->route('admin-view-shipment-list');
                }
                else{
                    return redirect()->back();
                }
            }
            elseif($request->shipType == 'F'){
                $cargoType = $request->f_cargo_type_id;
                foreach($cargoType as $key => $val){
                    $sid = CargoItems::insertGetId([
                        'cargo_id' => $cid,
                        'item_desc' => $request->item_desc[$key],
                        'price' => $request->fprice[$key],
                        'cargo_type_id' => $val,
                        'curr_val' => $request->curr_val[$key] ?? '',
                        'fQuantity' => $request->fQuantity[$key],
                        'fLength' => $request->fLength[$key],
                        'fWidth' => $request->fWidth[$key],
                        'fHeight' => $request->fHeight[$key],
                        'total' => $request->ftotal[$key],
                    ]);
                    if($sid>0) $total_items++;
                }
                if($total_items == count($request->f_cargo_type_id)){
                    $resp['status'] = 'success';
                    $resp['msg'] = "All Shipment information saved successfuly";
                    
                    return redirect()->route('admin-view-shipment-list');
                }
                else{
                    return redirect()->back();
                }
            }
            

            // $cdata = CargoMetaData::insertGetId([
            //     'cargo_id' => $cid, 
            //     'sender_name' =>$request->sender_name, 
            //     'sender_contact'=> $request->sender_contact, 
            //     'sender_address' =>$request->sender_address, 
            //     'sender_provided_id_type' => 0,
            //     'sender_provided_id' => $request->sender_provided_id, 
            //     'receiver_name' => $request->receiver_name, 
            //     'receiver_contact' => $request->receiver_contact, 
            //     'receiver_address' => $request->receiver_address, 
            //     'content_details_info' => $request->content_details_info, 
            //     'from_location' => $request->from_location, 
            //     'to_location' => $request->to_location,
            // ]);

            // if($cdata> 0){
            //     $resp['status'] = 'success';
            //     $resp['msg'] = "Cargo meta saved successfuly";

            //     $total_items = 0;
            //     $cargoType = $request->cargo_type_id;
            //     foreach($cargoType as $key => $val){
            //         if($request->shipType == 'W'){
            //             $sid = CargoItems::insertGetId([
            //             'cargo_id' => $cid,
            //             'cargo_type_id' => $val,
            //             'price' => $request->price[$key],
            //             'weight' => $request->weight[$key],
            //             'total' => $request->total[$key],
            //             ]);
            //             if($sid>0) $total_items++;
            //         }
            //         elseif($request->shipType == 'F'){
                           
            //             $sid = CargoItems::insertGetId([
            //                 'cargo_id' => $cid,
            //                 'price' => $request->price[$key],
            //                 'cargo_type_id' => $val,
            //                 'price' => $request->price[$key],
            //                 'fQuantity' => $request->fQuantity[$key],
            //                 'fLength' => $request->fLength[$key],
            //                 'fWidth' => $request->fWidth[$key],
            //                 'fHeight' => $request->fHeight[$key],
                            
            //                 'total' => $request->total[$key],
            //                 ]);
            //             if($sid>0) $total_items++;
            //         }
            //     }
            //     if($total_items == count($request->cargo_type_id)){
            //         $resp['status'] = 'success';
            //         $resp['msg'] = "All Shipment information saved successfuly";
                    
            //         return redirect()->route('admin-view-shipment-list');
            //     }
            //     else{
            //         return redirect()->back();
            //     }
            // }
            // else{
            //     $resp['status'] = 'failed';
            //     $resp['msg'] = "Error Cargo meta could not be saved";
            // }
        }
        else {
            $resp['status'] = 'failed';
            $resp['msg'] = "Shipment saving failed.";
            return redirect()->route('admin-view-shipment-list');
        }
    }

    public function editShipment($id){
        $countries = Country::latest()->get();
        $comonFunc = new CommonFunctions;
        $cargoData = CargoList::findOrFail($id);
        // dd($cargoData);
        $cMetadata = CargoMetaData::where('cargo_id', $id)->get();
        // dd($cMetadata);
        // $cargoData = CargoList::where('id', $id)->get();
        $cargoTypes = CargoTypeList::latest()->get();
        $wCargoTypes = CargoTypeList::where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::where('type', 'F')->latest()->get();
        return view('dashboard.admin.cargo_operation.shipment_transactions.edit_shipment', 
                    compact('cargoTypes', 'cargoData', 'cMetadata', 'wCargoTypes', 'fCargoTypes', 'countries',));
    } 

    public function storeShipmentUpdate(Request $request){
        // dd($request);
        if($request->shipType == 'W') {
            $country = $request->w_country; 
            $cid = CargoList::findOrFail($request->ship_id)->update([
                'ship_process_type' => $request->shipType,
                'ref_code' => $request->ref_code,
                'country_id' => $country,
                'shipping_type' => $request->shipping_type,
                'package_type' => $request->package_type,
                'sender_provided_code' => $request->sender_provided_code,
                'sender_name' => $request->sender_name, 
                'sender_contact'=> $request->sender_contact, 
                'sender_address' => $request->sender_address,  
                'receiver_name' => $request->receiver_name, 
                'receiver_contact' => $request->receiver_contact, 
                'receiver_address' => $request->receiver_address, 
                'content_details_info' => $request->content_details_info, 
                'from_location' => $request->from_location, 
                'to_location' => $request->to_location,
                'total_amount' => $request->total_amount,
                'currency' => $request->currency,
                'updated_at' => Carbon::now(),
            ]);
        }

        if($request->shipType == 'F') {
            $country = $request->f_country;
            $cid = CargoList::findOrFail($request->ship_id)->update([
                'ship_process_type' => $request->shipType,
                'ref_code' => $request->f_ref_code,
                'country_id' => $country,
                'shipping_type' => $request->shipping_type,
                'package_type' => $request->package_type,
                'sender_provided_code' => $request->f_sender_provided_code,
                'sender_name' =>$request->f_sender_name, 
                'sender_contact'=> $request->f_sender_contact, 
                'sender_address' =>$request->f_sender_address,  
                'receiver_name' => $request->f_receiver_name, 
                'receiver_contact' => $request->f_receiver_contact, 
                'receiver_address' => $request->f_receiver_address, 
                'content_details_info' => $request->f_content_details_info, 
                'from_location' => $request->f_from_location, 
                'to_location' => $request->f_to_location,
                'total_amount' => $request->ftotal_amount,
                'currency' => $request->currency,
                'updated_at' => Carbon::now(),
            ]);
        }
        

        // CargoMetaData::where('cargo_id',$request->ship_id)->update([
        //     'sender_name' =>$request->sender_name, 
        //     'sender_contact'=> $request->sender_contact, 
        //     'sender_address' =>$request->sender_address, 
        //     'sender_provided_id_type' => 0,
        //     'sender_provided_id' => $request->sender_provided_id, 
        //     'receiver_name' => $request->receiver_name, 
        //     'receiver_contact' => $request->receiver_contact, 
        //     'receiver_address' => $request->receiver_address, 
        //     'from_location' => $request->from_location, 
        //     'to_location' => $request->to_location,
        // ]);

        // DELTE AND RESAVE CARGO ITEMS       
        CargoItems::where('cargo_id',$request->ship_id)->delete();

        $total_items = 0;
        if($request->shipType == 'W'){
            $cargoType = $request->cargo_type_id;
            // dd($cargoType);
            if(is_array($cargoType) && count($cargoType)>0){
                foreach($cargoType as $key => $val){
                    $sid = CargoItems::insertGetId([
                        'cargo_id' => $request->ship_id,
                        'item_desc' => $request->item_desc[$key],
                        'cargo_type_id' => $val,
                        'price' => $request->price[$key],
                        'curr_val' => $request->curr_val[$key] ?? '',
                        'weight' => $request->weight[$key],
                        'discount' => $request->wdiscount[$key] ?? 0,
                        'total' => $request->total[$key],
                    ]);
                    if($sid>0) $total_items++;
                }
                if($total_items == count($request->cargo_type_id)){
                    $resp['status'] = 'success';
                    $resp['msg'] = "Shipment updated successfuly";
                    $notification = array(
                        'message' => 'Shipment updated successfuly',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('admin-view-shipment-list');
                }
                else{
                    $notification = array(
                        'message' => 'Shipment could not be updated',
                        'alert-type' => 'error'
                    );
                    return redirect()->back();
                }
            }
        }
        elseif($request->shipType == 'F'){
            $cargoType = $request->f_cargo_type_id;
            foreach($cargoType as $key => $val){
                $sid = CargoItems::insertGetId([
                    'cargo_id' => $request->ship_id,
                    'item_desc' => $request->item_desc[$key],
                    'price' => $request->fprice[$key],
                    'cargo_type_id' => $val,
                    'curr_val' => $request->curr_val[$key] ?? '',
                    'fQuantity' => $request->fQuantity[$key],
                    'fLength' => $request->fLength[$key],
                    'fWidth' => $request->fWidth[$key],
                    'fHeight' => $request->fHeight[$key],
                    'discount' => $request->fdiscount[$key] ?? 0,
                    'total' => $request->ftotal[$key],
                ]);
                if($sid>0) $total_items++;
            }
            if($total_items == count($request->cargo_type_id)){
                $resp['status'] = 'success';
                $resp['msg'] = "Shipment updated successfuly";
                $notification = array(
                    'message' => 'Shipment updated successfuly',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin-view-shipment-list');
            }
            else{
                $notification = array(
                    'message' => 'Shipment could not be updated',
                    'alert-type' => 'error'
                );
                return redirect()->back();
            }
        }
    }

    public function viewShipmentDetails($id,$ref_code){
        // $cargo_list = CargoList::latest()->get();
        // $cargoData = CargoList::findOrFail($id);
        // // dd($cargoData);
        // $cMetadata = CargoMetaData::where('cargo_id', $id)->get();
        // // dd($cMetadata);
        // // $cargoData = CargoList::where('id', $id)->get();
        // $cargoTypes = CargoTypeList::latest()->get();
        // return view('dashboard.admin.cargo_operation.shipment_transactions.trans_view_details', 
        //     compact('cargoData', 'cMetadata', 'cargoTypes'));

        $countries = Country::latest()->get();
        $comonFunc = new CommonFunctions;
        $cargoData = CargoList::findOrFail($id);
       
        // $cargoData = CargoList::where('id', $id)->get();
        $cargoTypes = CargoTypeList::latest()->get();
        $wCargoTypes = CargoTypeList::where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::where('type', 'F')->latest()->get();
        return view('dashboard.admin.cargo_operation.shipment_transactions.trans_view_details', 
                    compact('cargoTypes', 'cargoData', 'wCargoTypes', 'fCargoTypes', 'countries',));
    } 

    public function deleteShipment($cargo_id){
        // DELETE SHIPMENT DETAILS
        if(!empty(CargoItems::where('cargo_id',$cargo_id)->get())){
            CargoItems::where('cargo_id',$cargo_id)->delete();
        }
        if(!empty(CargoMetaData::where('cargo_id',$cargo_id)->get())){
            CargoMetaData::where('cargo_id',$cargo_id)->delete();
        }

        if(!empty(CargoList::where('id',$cargo_id)->get())){
            $delOp = CargoList::where('id',$cargo_id)->delete();
            if($delOp > 0){
                $notification = array(
                    'message' => 'Shipment Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin-view-shipment-list')->with($notification);
            }
        }
    }

    public function updateShipmentStatus($id, $val){
        $up = CargoList::where('id',$id)->update(
            ['status' => $val]
        );

        if($up>0){
            $notification = array(
                'message' => 'Shipment status Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function printShipmentPdf($id, $code){
        $cargoData = CargoList::findOrFail($id);
        $cMetadata = CargoMetaData::where('cargo_id', $id)->get();
        $cargoTypes = CargoTypeList::latest()->get();
        $wCargoTypes = CargoTypeList::where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::where('type', 'F')->latest()->get();

        // view()->share('dashboard.admin.cargo_operation.shipment_transactions.print_shipment_pdf', compact('cargoData', 'cMetadata', 'cargoTypes'));
        // $pdf = PDF::loadView('dashboard.admin.cargo_operation.shipment_transactions.print_shipment_pdf', compact('cargoData', 'cMetadata', 'cargoTypes'));
        // return $pdf->download('shipment-'.$code.'.pdf');

        $pdf = PDF::setOptions(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true])
                    ->loadView('dashboard.admin.cargo_operation.shipment_transactions.print_shipment_pdf', 
                        array('cargoData' => $cargoData, 'cMetadata' => $cMetadata, 'cargoTypes' => $cargoTypes,
                                'wCargoTypes'=>$wCargoTypes, 'fCargoTypes'=>$fCargoTypes ))
                    ->setOption('margin-top', '4mm')
                    ->setOption('margin-bottom', '3mm')
                    ->setOption('footer-font-size', '70px')
                    ->setPaper('shipment-'.$code, 'portrait');
        return $pdf->stream();
    }

    public function downloadShipmentPdf($id, $code){
        $cargoData = CargoList::findOrFail($id);
        $cMetadata = CargoMetaData::where('cargo_id', $id)->get();
        $cargoTypes = CargoTypeList::latest()->get();
        $wCargoTypes = CargoTypeList::where('type', 'W')->latest()->get();
        $fCargoTypes = CargoTypeList::where('type', 'F')->latest()->get();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled'=>false,'isRemoteEnabled'=>true])
                    ->loadView('dashboard.admin.cargo_operation.shipment_transactions.print_shipment_pdf', 
                        array('cargoData' => $cargoData, 'cMetadata' => $cMetadata, 'cargoTypes' => $cargoTypes, 
                        'wCargoTypes'=>$wCargoTypes, 'fCargoTypes'=>$fCargoTypes))
                    ->setPaper('shipment-'.$code, 'portrait');
        return $pdf->download('shipment-'.$code.'.pdf');
    }
    

}
