<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\CargoList;
use Illuminate\Support\Str;


class CommonFunctions extends Controller
{
    //
    public function generateUniqueRefCode(){
        $date = str_replace("-", "", Carbon::now()->format('Y-m-d'));
        $random = strtoupper(Str::random(5));
        $cargoList = CargoList::latest()->get();
        $code = 'JLI'.$cargoList->count().$random.'-'.$date;
        
        // do {
        //     $code = random_int(1000, 9999);
        //     $code = $date.$code;
        // } while (Supplier::where("refcode", "=", $code)->first());

        // return $code.Str::random(20);;
        return $code;
    }

    function format_num($number = '' , $decimal = ''){
        if(is_numeric($number)){
            $ex = explode(".",$number);
            $decLen = isset($ex[1]) ? strlen($ex[1]) : 0;
            if(is_numeric($decimal)){
                return number_format($number,$decimal);
            }else{
                return number_format($number,$decLen);
            }
        }else{
            return "Invalid Input";
        }
    }
}
