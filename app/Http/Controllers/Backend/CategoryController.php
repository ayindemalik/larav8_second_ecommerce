<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;


class CategoryController extends Controller
{
    //
    public function viewCategory(){
        $categories = Category::latest()->get();
        return view('dashboard.admin.category.category_view', compact('categories'));
    }

    public function storeCategory(Request $request){
        //dd($request);
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
            'category_image' => 'required',
        ],[
            'category_name_en.required' => 'Please input category english name',
            'category_name_fr.required' => 'Please input category french name',
            'category_image.required' => 'Please input category image',
        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/categories/'.$name_gen);
        $save_url = 'uploads/categories/'.$name_gen;

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_fr' => strtolower(str_replace(' ', '-', $request->category_name_fr)),
            'category_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('dashboard.admin.category.category_edit', compact('category'));
    }

    public function storeCategoryUpdate(Request $request, $id){
        // $category_id = $request->id;
        //dd($request);

        $id = $request->id;
        $oldImage = $request->oldImage;
        if($request->file('category_image')){
            
            if(File::exists(public_path($oldImage))){
                unlink($oldImage);
            }
                
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/categories/'.$name_gen);
            $path_url = 'uploads/categories/'.$name_gen;

            
            Category::findOrFail($id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_fr' => $request->category_name_fr,
                'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                'category_slug_fr' => strtolower(str_replace(' ', '-', $request->category_name_fr)),
                'category_image'   => $path_url ,
            ]);

            // dd($path_url);
            $notification = array(
                'message' => 'Category updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_category')->with($notification);
        }
        else {
            Category::findOrFail($id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_fr' => $request->category_name_fr,
                'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                'category_slug_fr' => strtolower(str_replace(' ', '-', $request->category_name_fr)),
            ]);
            $notification = array(
                'message' => 'Category updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_category')->with($notification);
        }
       
        
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        // Delete the data
        if($category->category_image != Null)
            unlink($category->category_image);

        Category::findOrFail($category->id)->delete();

        $notification = array(
                'message' => 'Category deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
