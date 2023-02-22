<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use App\Models\Information;
use App\Models\Feature;
use App\Models\About;
use App\Models\Service;
use App\Models\Project;
use App\Models\Team;
use App\Models\MultiImg;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Product;
// 
class IndexController extends Controller
{
    //
    public function index(){
        $sliders = Slider::where('status',1)->orderBy('id','ASC')->get();
        $categories = Category::orderBy('id','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        // $features = Feature::latest()->orderBy('id','ASC')->get();
        $about = About::findOrFail(1);
        $services = Service::latest()->orderBy('id','ASC')->get();
        // $projects = Project::where('view_status',1)->orderBy('id','DESC')->limit(6)->get();
        // $teams = Team::latest()->orderBy('id','ASC')->get();
        // $testimonials = Testimonial::where('status',1)->latest()->orderBy('id','ASC')->get();
        $contacts = Contact::findOrFail(1);
    	return view('frontend.index',compact('sliders', 'about', 'services', 'contacts', 'categories','products'));
    }

    public function about(){
        $info = About::findOrFail(1);
        $features = Feature::latest()->orderBy('id','ASC')->get();
        $services = Service::latest()->orderBy('id','ASC')->get();
        $teams = Team::latest()->orderBy('id','ASC')->get();
    	return view('frontend.about',compact('about', 'services', 'teams', 'features'));
    }

    public function userLogout(){
        Auth::logout();
        return Redirect()->route('login');
      }
  
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function storeUserProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('/uploads/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/uploads/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function userChangePassword(){
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.user_change_password', compact('user'));
    }

    public function userUpdatePassword(Request $request){
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        // $hashedPassword = User::find(1)->password;
        $hashedPassword = auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success'
            );
            // return redirect()->route('user.logout');
            return redirect()->route('user.logout')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error! Sorry your password cound not be updated',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function productDetails($id,$slug){
		$product = Product::findOrFail($id);
        $multiImag = MultiImg::where('product_id', $id)->get();

        $categories = Category::orderBy('id','ASC')->get();

        $color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_fr = $product->product_color_fr;
		$product_color_fr = explode(',', $color_fr);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_fr = $product->product_size_fr;
		$product_size_fr = explode(',', $size_fr);

        $cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_color_fr','product_size_en','product_size_fr','relatedProduct'));

	}
     

    public function services(){
        $about = About::findOrFail(1);
        $features = Feature::latest()->orderBy('id','ASC')->get();
        $services = Service::latest()->orderBy('id','ASC')->get();
        $teams = Team::latest()->orderBy('id','ASC')->get();
        $testimonials = Testimonial::where('status',1)->latest()->orderBy('id','ASC')->get();
        $contacts = Contact::findOrFail(1);
    	return view('frontend.services',compact('about', 'services', 'teams', 'features', 'testimonials', 'contacts'));
    }
    
    public function projects(){
        $projects = Project::where('view_status',1)->orderBy('id','DESC')->get();
        $about = About::findOrFail(1);
        $multiImgs = MultiImg::where('project_id', 1)->get();
        return view('frontend.projects',compact('projects', 'about', 'multiImgs'));
    }

    public function contact(){
        $contacts = Contact::findOrFail(1);
        $services = Service::latest()->orderBy('id','ASC')->get();
        return view('frontend.contact',compact('contacts', 'services'));
    }


    public function catWiseProducts($cat_id,$slug){
		$products = Product::where('status',1)->where('category_id',$cat_id)->orderBy('id','DESC')->paginate(6);
        // dd($products);
		$categories = Category::orderBy('category_name_en','ASC')->get();
        $categoryInfo = Category::findOrFail($cat_id);
		return view('frontend.product.category_wise_products',compact('products','categories', 'categoryInfo'));
	}

    public function subCatWiseProduct($subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();
        $subCategoryInfo = SubCategory::findOrFail($subcat_id);
		return view('frontend.product.subcategory_view',compact('products','categories', 'subCategoryInfo'));
	}

    // Sub-Subcategory wise data
	public function subSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.product.sub_subcategory_view',compact('products','categories'));
	}

    public function productViewAjax($id){
		// $product = Product::findOrFail($id);
        $product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));
	} // end method


}
