<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //
    public function viewBrand(){
        $brands = Brand::latest()->get();
        return view('dashboard.admin.brand.brand_view', compact('brands'));
    }

    public function storeBrand(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_fr' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Please input brand english name',
            'brand_name_fr.required' => 'Please input brand french name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/brands/'.$name_gen);
        $save_url = 'uploads/brands/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_fr' => strtolower(str_replace(' ', '-', $request->brand_name_fr)),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // $brands = Brand::latest()->get();
        // return view('backend.brand.brand_view', compact('brands'));
    }

    public function editBrand($id){
        $brand = Brand::findOrFail($id);
        return view('dashboard.admin.brand.brand_edit', compact('brand'));
    }

    public function storeBrandUpdate(Request $request){
        $brand_id = $request->id;
        $oldImage = $request->oldImage;
        if($request->file('brand_image')){
            unlink($oldImage);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/brands/'.$name_gen);
            $save_url = 'uploads/brands/'.$name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fr' => strtolower(str_replace(' ', '-', $request->brand_name_fr)),
                'brand_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_brand')->with($notification);
        }
        else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fr' => strtolower(str_replace(' ', '-', $request->brand_name_fr)),
            ]);
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_brand')->with($notification);
        }
    }

    public function deleteBrand($id){
        $brand = Brand::findOrFail($id);
        // $img = $brand->brand_image;
        // Remode the image from directory
        if($brand->brand_image != Null)
            unlink($brand->brand_image);
        
        // Delete the data
        Brand::findOrFail($id)->delete();

        $notification = array(
                'message' => 'Brand deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
