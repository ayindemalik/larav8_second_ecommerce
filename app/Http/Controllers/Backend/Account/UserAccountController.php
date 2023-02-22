<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use App\Models\ROLE;
// use App\Models\Supplier;
// use App\Models\CompanyType;

// use App\Models\Module;
// use App\Models\ModulePermission;
// use App\Models\UserModulePermission;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMails;
use Auth;
use Carbon\Carbon;

class UserAccountController extends Controller
{
    //
    // Prevent access through middleware
    public function __construct(){
        $this->middleware('auth'); // THIS CALL Http/middleware/Authenticate::class to redirect to login
    }
    
    // ACCOUNT FUNCTIONS
    public function userLogout(){
        Auth::logout();
        return Redirect()->route('login');
      }
  
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard.useraccount.profile.user_profile_view', compact('user'));
    }

    public function editUserProfile($id){
        $user = User::findOrFail($id);
        return view('dashboard.useraccount.profile.user_profile_edit', compact('user'));
    }
      
    public function storeUserProfileUpdate(Request $request){
        dd($request);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->phone = $request->phone;d
        
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

        return redirect()->route('user.profile')->with($notification);
    }
  
    public function userChangePassword(){
        $user = User::find(Auth::user()->id);
        return view('dashboard.useraccount.profile.user_change_password', compact('user'));
    }
  
    public function userUpdatePassword(Request $request){
        // dd($request);
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        // dd($request);
        // $hashedPassword = User::find(1)->password;
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success'
            );
            // return redirect()->route('user.logout');
            return redirect()->route('login')->with($notification);
        }
        else {
            dd('exit with eoor');
            $notification = array(
                'message' => 'Error! Sorry your password cound not be updated',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
