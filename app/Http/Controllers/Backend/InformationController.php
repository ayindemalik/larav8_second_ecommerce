<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
// use App\Models\MultiImg;
use Carbon\Carbon;
use Image;
class InformationController extends Controller
{
    public function addInformation(){
        return view('backend.information.information_add');
    }

    public function storeInformation(Request $request){
        //  dd($request);

        $image = $request->file('info_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1024,768)->save('uploads/information/'.$name_gen);
        $save_url = 'uploads/information/'.$name_gen;

        $_id = Information::insertGetId([
            'info_title_en' => $request->info_title_en,
            'info_title_fr' => $request->info_title_fr,
            'info_title_ar' => $request->info_title_ar,

            'info_tags_en' => $request->info_tags_en,
            'info_tags_fr' => $request->info_tags_fr, 
            'info_tags_ar' => $request->info_tags_ar, 

            'info_body_fr' => $request->info_body_fr,
            'info_body_en' => $request->info_body_en,
            'info_body_ar' => $request->info_body_ar,

            'info_image' => $save_url,
            'category' => 0,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        ///// SAVE MULTI IMAGE
        if($_id > 0){
            $notification = array(
                'message' => 'Information saved successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage_information')->with($notification);
        }
        else{
            return redirect()->back()->with($notification);
        }
    }

    public function manageInformation(){
        $infos = Information::latest()->get();
        return view('backend.information.information_view', compact('infos'));
    }

    public function editInformation($id){
        $info = Information::findOrFail($id);
        return view('backend.information.information_edit', compact('info'));
    }
    public function storeInformationUpdate(Request $request){
        $info_id = $request->id;
        $oldImage = $request->oldImage;

        if($request->file('info_image')){
            unlink($oldImage);
            $image = $request->file('info_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1024,768)->save('uploads/information/'.$name_gen);
            $save_url = 'uploads/information/'.$name_gen;

            Information::findOrFail($info_id)->update([
                'info_title_en' => $request->info_title_en,
                'info_title_fr' => $request->info_title_fr,
                'info_title_ar' => $request->info_title_ar,

                'info_tags_en' => $request->info_tags_en,
                'info_tags_fr' => $request->info_tags_fr, 
                'info_tags_ar' => $request->info_tags_ar, 

                'info_body_fr' => $request->info_body_fr,
                'info_body_en' => $request->info_body_en,
                'info_body_ar' => $request->info_body_ar,

                'info_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);
    
            $notification = array(
                'message' => 'Information updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage_information')->with($notification);
        }
        else {
            Information::findOrFail($info_id)->update([
                'info_title_en' => $request->info_title_en,
                'info_title_fr' => $request->info_title_fr,
                'info_title_ar' => $request->info_title_ar,

                'info_tags_en' => $request->info_tags_en,
                'info_tags_fr' => $request->info_tags_fr, 
                'info_tags_ar' => $request->info_tags_ar, 

                'info_body_fr' => $request->info_body_fr,
                'info_body_en' => $request->info_body_en,
                'info_body_ar' => $request->info_body_ar,
                'updated_at' => Carbon::now()
            ]);
    
            $notification = array(
                'message' => 'Information updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage_information')->with($notification);
        }
    }

    
    // Activate project
    public function informationInactive($id){
        Information::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Information Inactive',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }

    // Activate project
    public function informationActive($id){
        Information::findOrFail($id)->update(['status' => 1]);
            $notification = array(
            'message' => 'Information Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteInformation($id){
        $info = Information::findOrFail($id);
        unlink($info->info_image);
        Information::findOrFail($id)->delete();

        
        $notification = array(
           'message' => 'Information Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
    // end method 
}
