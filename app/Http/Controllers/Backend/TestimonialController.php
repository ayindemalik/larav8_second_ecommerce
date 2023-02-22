<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;
use Image;

class TestimonialController extends Controller
{
    //
    public function viewTestimonials(){
        $testims = Testimonial::latest()->get();
        return view('backend.testimonial.testimonial_view', compact('testims'));
    }

    public function storeTestimonial(Request $request){
        $image = $request->file('user_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('uploads/testimonials/'.$name_gen);
        $save_url = 'uploads/testimonials/'.$name_gen;

        $id = Testimonial::insertGetId([
            'user_name' => $request->user_name,
            'profession' => $request->profession,
            'message' => $request->message,
            'status' => 1,
            'user_img' => $save_url,
        ]);

        if($id > 0){
            $notification = array(
            'message' => 'Testimonial saved successfully',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Testimonial could not be saved',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function editTestimonial($id){
        $testim = Testimonial::findOrFail($id);
        return view('backend.testimonial.testimonial_edit', compact('testim'));
    }

    public function storeTestimonialUpdate(Request $request, $id){
        $testim_id = $request->id;
        $oldImage = $request->oldImage;
        
        if($request->file('user_img')){
            unlink($oldImage);
            $image = $request->file('user_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/testimonials/'.$name_gen);
            $save_url = 'uploads/testimonials/'.$name_gen;

            Testimonial::findOrFail($testim_id)->update([
                'user_name' => $request->user_name,
                'profession' => $request->profession,
                'message' => $request->message,
                'user_img' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Testimonial updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_testimonials')->with($notification);
        }
        else {
            Testimonial::findOrFail($testim_id)->update([
                'user_name' => $request->user_name,
                'profession' => $request->profession,
                'message' => $request->message,
            ]);
    
            $notification = array(
                'message' => 'Testimonial updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_testimonials')->with($notification);
        }
    }

    public function deleteTestimonial($id){
        $testim = Team::findOrFail($id);
        Testimonial::findOrFail($testim->id)->delete();

        $notification = array(
                'message' => 'Testimonial deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function testimonialInactive($id){
        Testimonial::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Testimonial Desactivated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 


    public function testimonialActive($id){
        Testimonial::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Testimonial Activated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 
}
