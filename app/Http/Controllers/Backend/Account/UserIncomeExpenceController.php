<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IncomeExpence;
use App\Models\Country;
use Carbon\Carbon;
use App\Http\Controllers\Backend\CommonFunctions;
use PDF;

class UserIncomeExpenceController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth'); // THIS CALL Http/middleware/Authenticate::class to redirect to login
    }

    public function manage_all(){
        $incomes = IncomeExpence::Where('type', 'In')->latest()->get();
        $expences = IncomeExpence::Where('type', 'Ex')->latest()->get();
        return view('dashboard.useraccount.income_expence.manage_all', compact('incomes', 'expences'));
    }

    // New
    public function addNewOperation(){
        $countries = Country::latest()->get();
        return view('dashboard.useraccount.income_expence.add_new_operation', compact('countries'));
    }

    public function storeIncomeOrExpence(Request $request){
        // dd($request);
        $insert_id = 0; 
        // type	item	description	amount	currency	date	created_at	updated_at	
        $insert_id = IncomeExpence::insertGetId([
            'type' => $request->type,
            'item' => $request->item,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'date' => $request->date,
            'created_at' => Carbon::now(),
        ]);
    
        if($insert_id > 0){
            $notification = array(
                'message' => 'Operation saved Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user-manage-income-expences')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error! Operation could not be saved Successfully',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function ediIncomeExpence($id){
        $countries = Country::latest()->get();
        $data = IncomeExpence::findOrFail($id);
        // dd($cargoTypData);
        return view('dashboard.useraccount.income_expence.edit_income_expence', compact('countries', 'data'));
    }
    public function storeIncomeOrExpenceUpdate(Request $request){
        // dd($request);
        $upd = 0;
        $upd = IncomeExpence::findOrFail($request->form_id)->update([
            'type' => $request->type,
            'item' => $request->item,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'date' => $request->date,
            'updated_at' => Carbon::now(),
        ]);
        
        if($upd == true){
            $notification = array(
                'message' => 'Operation updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user-manage-income-expences')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error or no changes! operation was not updated ',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteIncomeOrExpence($id){
        if(!empty(IncomeExpence::where('id',$id)->get())){
            $delOp = IncomeExpence::where('id',$id)->delete();
            if($delOp > 0){
                $notification = array(
                    'message' => 'Operation Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('user-manage-income-expences')->with($notification);
            }
        }
        else {
            $notification = array(
                'message' => 'Operation could not be deleted',
                'alert-type' => 'error'
            );
            return redirect()->route('user-manage-income-expences')->with($notification);
        }
        
    }
}
