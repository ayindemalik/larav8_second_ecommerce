<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
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


}
