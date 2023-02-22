<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    
    public function viewAbout(){
        $about = About::findOrFail(1);
        return view('dashboard.admin.about.about_view', compact('about'));
    }

    public function storeAbout(Request $request){
        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/about/'.$name_gen);
        $save_url = 'uploads/about/'.$name_gen;

        About::insert([
            'about_title_en' => $request->about_title_en,
            'about_title_fr' => $request->about_title_fr,
            'about_shortdescp_en' => $request->about_shortdescp_en,
            'about_shortdescp_fr' => $request->about_shortdescp_fr,
            'about_longdescp_en' => $request->about_longdescp_en,
            'about_longdescp_fr' => $request->about_longdescp_fr,
            'main_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'About saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editAbout($id){
        $about = About::findOrFail($id);
        return view('dashboard.admin.about.about_edit', compact('about'));
    }

    public function storeAboutUpdate(Request $request){
        // dd($request);
        $about_id = $request->id;
        $oldImage = $request->oldImage;
        if($request->file('about_image')){
            if($oldImage != Null)
                unlink($oldImage);
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,700)->save('uploads/about/'.$name_gen);
            $save_url = 'uploads/about/'.$name_gen;
    
            About::findOrFail($about_id)->update([
                'about_title_en' => $request->about_title_en,
                'about_title_fr' => $request->about_title_fr,
                'about_shortdescp_en' => $request->about_shortdescp_en,
                'about_shortdescp_fr' => $request->about_shortdescp_fr,
                'about_longdescp_en' => $request->about_longdescp_en,
                'about_longdescp_fr' => $request->about_longdescp_fr,
                'main_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_about')->with($notification);
        }
        else {
            About::findOrFail($about_id)->update([
                'about_title_en' => $request->about_title_en,
                'about_title_fr' => $request->about_title_fr,
                'about_shortdescp_en' => $request->about_shortdescp_en,
                'about_shortdescp_fr' => $request->about_shortdescp_fr,
                'about_longdescp_en' => $request->about_longdescp_en,
                'about_longdescp_fr' => $request->about_longdescp_fr,
            ]);
            $notification = array(
                'message' => 'about updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_about')->with($notification);
        }
    }

    public function deleteAbout($id){
        $about = About::findOrFail($id);
        if(File::exists(public_path($about->about_image))){
            unlink($about->about_image);
        }
        
        About::findOrFail($id)->delete();

        $notification = array(
            'message' => 'about deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
