<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    //
    public function viewSubCategory(){
        $categories = Category::orderby('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('dashboard.admin.category.subcategory_view', compact('categories','subcategories'));
    }

    public function storeSubCategory(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_fr' => 'required',
            
        ],[
            'category_id.required' => 'Please select category ',
            'subcategory_name_en.required' => 'Please input sub category english name',
            'subcategory_name_fr.required' => 'Please input sub category french name',
            
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_fr' => strtolower(str_replace(' ', '-', $request->subcategory_name_fr)),
        ]);

        $notification = array(
            'message' => 'Sub Category saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editSubCategory($id){
        $categories = Category::orderby('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('dashboard.admin.category.subcategory_edit', compact('categories','subcategory'));
    }

    public function storeSubCategoryUpdate(Request $request){
        // dd($request);
        $subcategory_id = $request->id;
       
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_fr' => strtolower(str_replace(' ', '-', $request->subcategory_name_fr)),
        ]);
        $notification = array(
            'message' => 'Sub Category updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view_all_subcategory')->with($notification);
    }

    public function deleteSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        // Delete the data
        SubCategory::findOrFail($subcategory->id)->delete();

        $notification = array(
                'message' => 'Sub Category deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }


    /*   SUB SUB CATEGORY  */
    public function viewSubSubCategory(){
        $categories = Category::orderby('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()
                                    ->orderBy('category_id', 'ASC')
                                    ->orderBy('subcategory_id', 'ASC')
                                    ->get();
        return view('dashboard.admin.category.subsubcategory_view', compact('categories','subsubcategories'));
    }

    public function getSubCategory($category_id){   
        // echo $category_id;
        $subCat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        // dd($subCat);
        return json_encode($subCat);
    }

    public function getSubSubCategory($subcategory_id){   
        $subsubCat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_fr', 'ASC')->get();
        return json_encode($subsubCat);
    }


    public function storeSubSubCategory(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_fr' => 'required',
            
        ],[
            'category_id.required' => 'Please select category ',
            'subcategory_id.required' => 'Please select sub category ',
            'subsubcategory_name_en.required' => 'Please input sub sub category english name',
            'subsubcategory_name_fr.required' => 'Please input sub sub category french name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_fr' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_fr)),
        ]);

        $notification = array(
            'message' => 'Sub Sub Category saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editSubSubCategory($id){
        $categories = Category::orderby('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderby('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('dashboard.admin.category.subsubcategory_edit', compact('categories','subcategories', 'subsubcategory'));
    }

    public function storeSubSubCategoryUpdate(Request $request){
        $subsubcategory_id = $request->id;
       
        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_fr' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_fr)),
        ]);

        $notification = array(
            'message' => 'Sub Sub Category updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view_all_subsubcategory')->with($notification);
    }

    public function deleteSubSubCategory($id){
        $subsubcategory = SubSubCategory::findOrFail($id);
        // Delete the data
        SubSubCategory::findOrFail($subsubcategory->id)->delete();

        $notification = array(
            'message' => 'Sub Sub Category deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
