<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Carbon\Carbon;
use Image;

class FeatureController extends Controller
{
    public function viewFeature(){
        $features = Feature::latest()->get();
        return view('backend.feature.feature_view', compact('features'));
    }

    public function storeFeature(Request $request){
        // $request->validate([
        //     'category_name_en' => 'required',
        //     'category_name_fr' => 'required',
        //     'category_icon' => 'required',
        // ],[
        //     'category_name_en.required' => 'Please input category english name',
        //     'category_name_fr.required' => 'Please input category french name',
        //     'category_icon.required' => 'Please input category french name',
        // ]);

        $image = $request->file('feature_icon');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/feature_icons/'.$name_gen);
        $save_url = 'uploads/feature_icons/'.$name_gen;

        $featureId = Feature::insertGetId([
            'feature_name_fr' => $request->feature_name_fr,
            'feature_name_en' => $request->feature_name_en,
            'feature_descp_fr' => $request->feature_descp_fr,
            'feature_descp_en' => $request->feature_descp_en,
            'feature_icon' => $save_url,
        ]);

        if($featureId > 0){
            $notification = array(
            'message' => 'Feature saved successfully',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Feature could not be saved',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function editFeature($id){
        $feature = Feature::findOrFail($id);
        return view('backend.feature.feature_edit', compact('feature'));
    }

    public function storeFeatureUpdate(Request $request, $id){
        
        $feature_id = $request->id;
        $oldIcon = $request->oldIcon;

        if($request->file('feature_icon')){
            unlink($oldIcon);
            $image = $request->file('feature_icon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/feature_icons/'.$name_gen);
            $save_url = 'uploads/feature_icons/'.$name_gen;

            Feature::findOrFail($feature_id)->update([
                'feature_name_fr' => $request->feature_name_fr,
                'feature_name_en' => $request->feature_name_en,
                'feature_descp_fr' => $request->feature_descp_fr,
                'feature_descp_en' => $request->feature_descp_en,
                'feature_icon' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Feature and icone updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_feature')->with($notification);
        }
        else {
            // dd($request);
            Feature::findOrFail($feature_id)->update([
                'feature_name_fr' => $request->feature_name_fr,
                'feature_name_en' => $request->feature_name_en,
                'feature_descp_fr' => $request->feature_descp_fr,
                'feature_descp_en' => $request->feature_descp_en,
            ]);
    
            $notification = array(
                'message' => 'Feature updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_feature')->with($notification);
        }
    }

    public function deleteFeature($id){
        $category = Feature::findOrFail($id);
        // Delete the data
        Feature::findOrFail($category->id)->delete();

        $notification = array(
                'message' => 'Feature deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
