<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    //

    public function addProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('dashboard.admin.product.product_add', compact('brands','categories'));
    }

    public function storeProduct(Request $request){
        // dd($request);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
        $save_url = 'uploads/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id !='' ? $request->subcategory_id : 0,
            'subsubcategory_id' => $request->subsubcategory_id !='' ? $request->subsubcategory_id : 0,
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_fr' => strtolower(str_replace(' ', '-', $request->product_name_fr)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,

            'product_tags_en' => $request->product_tags_en,
            'product_tags_fr' => $request->product_tags_fr,
            'product_size_en' => $request->product_size_en,
            'product_size_fr' => $request->product_size_fr,
            // 'product_color_en' => $request->product_color_en,
            // 'product_color_fr' => $request->product_color_fr,

            'bying_price' => $request->bying_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_thambnail' => $save_url,

            'details_info_fr' => $request->details_info_fr,
            'details_info_en' => $request->details_info_en,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_fr' => $request->long_descp_fr,
            // 'hot_deals' => $request->hot_deals,
            // 'featured' => $request->featured,
            // 'special_offer' => $request->special_offer,
            // 'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ///// SAVE MULTI IMAGE
        if($product_id > 0){
            $images = $request->file('multi_img');
            $count = 0;
            if(is_array($images) && count($images)>0){
                foreach($images as $img){
                    $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                    // Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
                    Image::make($img)->save('uploads/products/multi-image/'.$make_name);
                    $uploadPath = 'uploads/products/multi-image/'.$make_name;
    
                    $insertId = MultiImg::insert([
                        'product_id'=> $product_id,
                        'photo_name' => $uploadPath,
                        'created_at' => Carbon::now(), 
                    ]);
                    
                    if($insertId > 0)
                        $count++;
                }
                if($count === count($images)){
                    $notification = array(
                        'message' => 'Produit enregistre avec succes',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('manage_product')->with($notification);
                }
            }
            else{
                $notification = array(
                        'message' => 'Produit enregistre avec succes',
                        'alert-type' => 'success'
                    );
                return redirect()->route('manage_product')->with($notification);
            }
        }
        else {
            $notification = array(
                'message' => 'Produit enregistre Mais sans les multiple images ',
                'alert-type' => 'info'
            );
            return redirect()->route('manage_product')->with($notification);
        }
    }

    public function copyProduct($id){
        $product = Product::findOrFail($id);
        $product_id = Product::insertGetId([
            'brand_id' => $product->brand_id,
            'category_id' => $product->category_id,
            'subcategory_id' => $product->subcategory_id,
            'subsubcategory_id' => $product->subsubcategory_id !='' ? $product->subsubcategory_id : 0,
            'product_name_en' => $product->product_name_en,
            'product_name_fr' => $product->product_name_fr,
            'product_slug_en' => $product->product_name_en,
            'product_slug_fr' => $product->product_name_fr,
            'product_code' => $product->product_code,
            'product_qty' => $product->product_qty,

            'product_tags_en' => $product->product_tags_en,
            'product_tags_fr' => $product->product_tags_fr,
            'product_size_en' => $product->product_size_en,
            'product_size_fr' => $product->product_size_fr,
            'product_color_en' => $product->product_color_en,
            'product_color_fr' => $product->product_color_fr,

            'bying_price' => $product->bying_price,
            'selling_price' => $product->selling_price,
            'discount_price' => $product->discount_price,
            'product_thambnail' => 'null image',

            'details_info_fr' => $product->details_info_fr,
            'details_info_en' => $product->details_info_en,
            'long_descp_en' => $product->long_descp_en,
            'long_descp_fr' => $product->long_descp_fr,
            // 'hot_deals' => $request->hot_deals,
            // 'featured' => $request->featured,
            // 'special_offer' => $request->special_offer,
            // 'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        if($product_id > 0){
            $multiImgs = MultiImg::where('product_id', $id)->get();
            $count = 0;
            foreach($multiImgs as $img){
                $insertId = MultiImg::insert([
                    'product_id'=> $product_id,
                    'photo_name' => $img->photo_name,
                    'created_at' => Carbon::now(), 
                ]);
                
                if($insertId > 0)
                    $count++;
            }
            if($count === count($multiImgs)){
                $notification = array(
                    'message' => 'Sub Category saved successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('manage_product')->with($notification);
            }
        }
        else {
            $notification = array(
                'message' => 'Produit enregistre Mais sans les multiple images ',
                'alert-type' => 'info'
            );
            return redirect()->route('manage_product')->with($notification);
        }
    }

    public function manageProduct(){
        $products = Product::latest()->get();
        return view('dashboard.admin.product.product_view', compact('products'));
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();
        $subsubcategories = SubSubCategory::where('subcategory_id', $product->subcategory_id)->get();

        $multiImgs = MultiImg::where('product_id', $id)->get();
        return view('dashboard.admin.product.product_edit', compact('brands','categories', 'subcategories', 'subsubcategories','product', 'multiImgs'));
    }

    public function storeProductUpdate(Request $request){
        // dd($request);
        $product = Product::findOrFail($request->id);
        Product::findOrFail($product->id)->update(
            [
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id !='' ? $request->subcategory_id : 0,
                'subsubcategory_id' => $request->subsubcategory_id !='' ? $request->subsubcategory_id : 0,
                'product_name_en' => $request->product_name_en,
                'product_name_fr' => $request->product_name_fr,
                'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
                'product_slug_fr' => strtolower(str_replace(' ', '-', $request->product_name_fr)),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
    
                'product_tags_en' => $request->product_tags_en,
                'product_tags_fr' => $request->product_tags_fr,
                'product_size_en' => $request->product_size_en,
                'product_size_fr' => $request->product_size_fr,
                // 'product_color_en' => $request->product_color_en,
                // 'product_color_fr' => $request->product_color_fr,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                
                'details_info_fr' => $request->details_info_fr,
                'details_info_en' => $request->details_info_en,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_fr' => $request->long_descp_fr,
                // 'hot_deals' => $request->hot_deals,
                // 'featured' => $request->featured,
                // 'special_offer' => $request->special_offer,
                // 'special_deals' => $request->special_deals,
                'status' => 1,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage_product')->with($notification);
    }

    public function updateMultiImage(Request $request){
		$imgs = $request->multi_img;
        if(is_array($imgs) && count($imgs)>0){
            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                if(File::exists(public_path($imgDel->photo_name))){
                    unlink($imgDel->photo_name);
                }
                
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                // Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
                Image::make($img)->save('uploads/products/multi-image/'.$make_name);
                $uploadPath = 'uploads/products/multi-image/'.$make_name;
    
                MultiImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            } // end foreach

        }
		
        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
	} // end mehtod 

     /// Product Main Thambnail Update /// 
    public function productThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        if(File::exists(public_path($oldImage))){
            // dd('File is exists.');
            unlink($oldImage);
        }else{
            // dd('File is not exists.');
        }

        $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
            Image::make($image)->save('uploads/products/thambnail/'.$name_gen);
            $save_url = 'uploads/products/thambnail/'.$name_gen;

            Product::findOrFail($pro_id)->update([
                'product_thambnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Product Image Thambnail Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
    }

    public function updateStoreMultiImage(Request $request){
        // dd($request);
        $images = $request->file('upMulti_img');
            $count = 0;
            if(is_array($images) && count($images)>0){
                foreach($images as $img){
                    $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                    // Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
                    Image::make($img)->save('uploads/products/multi-image/'.$make_name);
                    $uploadPath = 'uploads/products/multi-image/'.$make_name;
    
                    $insertId = MultiImg::insert([
                        'product_id'=> $request->prod_id,
                        'photo_name' => $uploadPath,
                        'created_at' => Carbon::now(), 
                    ]);
                    
                    if($insertId > 0)
                        $count++;
                }
                if($count === count($images)){
                    $notification = array(
                        'message' => 'Produit enregistre avec succes',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('manage_product')->with($notification);
                }
            }
            else{
                $notification = array(
                'message' =>'Error ! Please selct the images ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            }
    }

    //// Multi Image Delete ////
    public function multiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        if(File::exists(public_path($oldimg))){
            // unlink($oldImage);
            unlink($oldimg->photo_name);
        }else{
            // dd('File is not exists.');
        }
      
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } 
    
    // end method 
    // Activate product
    public function productInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Product Inactive',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }

    // Activate product
    public function productActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
            $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        if(File::exists(public_path($product->product_thambnail))){
            // dd('File is exists.');
            unlink($product->product_thambnail);
        }
        // unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Product Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }// end method 
     
}
