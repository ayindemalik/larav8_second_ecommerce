<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    //
    public function sliderView(){
		$sliders = Slider::latest()->get();
		return view('dashboard.admin.slider.slider_view',compact('sliders'));
	}
    public function sliderStore(Request $request){
        // dd($request);
    	$request->validate([
    		'slider_img' => 'required',
    	],[
    		'slider_img.required' => 'Plz Select One Image',
    	]);

    	$image = $request->file('slider_img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(1650,630)->save('uploads/slider/'.$name_gen);
    	$save_url = 'uploads/slider/'.$name_gen;

        $slider_id = Slider::insertGetId([
                'title_en' => $request->title_en,
                'title_fr' => $request->title_fr,
                'description_en' => $request->description_en,
                'description_fr' => $request->description_fr,
                'slider_img' => $save_url,
            ]);
            if($slider_id > 0){
                $notification = array(
                'message' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else {
                $notification = array(
                    'message' => 'error! Slider was not Inserted Successfully',
                    'alert-type' => 'error'
                    );
                return redirect()->back()->with($notification);
            }

            
        }
     // end method 
    
    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
            return view('dashboard.admin.slider.slider_edit',compact('slider'));
    }
    
    public function sliderUpdate(Request $request){
    
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1650,630)->save('uploads/slider/'.$name_gen);
            $save_url = 'uploads/slider/'.$name_gen;
        
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_fr' => $request->title_fr,
                'description_en' => $request->description_en,
                'description_fr' => $request->description_fr,
                'slider_img' => $save_url,
                ]);
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-slider')->with($notification);
        }
        else{
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_fr' => $request->title_fr,
                'description_en' => $request->description_en,
                'description_fr' => $request->description_fr,
            ]);
    
            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);
            } // end else 
        } // end method

    public function sliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        if(File::exists(public_path($img))){
            unlink($img);
        }
        
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Delectd Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } 

    public function sliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 


    public function sliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 

}
