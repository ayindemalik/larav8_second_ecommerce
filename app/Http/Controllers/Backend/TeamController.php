<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Carbon\Carbon;
use Image;

class TeamController extends Controller
{
    //
    public function viewTeam(){
        $teams = Team::latest()->get();
        return view('backend.team.team_view', compact('teams'));
    }

    public function storeTeam(Request $request){
       
        $image = $request->file('member_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,600)->save('uploads/team/'.$name_gen);
        $save_url = 'uploads/team/'.$name_gen;

        $serviceId = Team::insertGetId([
            'member_name' => $request->member_name,
            'member_title_fr' => $request->member_title_fr,
            'member_title_en' => $request->member_title_en,
            'facebook_link' => $request->facebook_link,
            'twiter_link' => $request->twiter_link,
            'instagram_link' => $request->instagram_link,
            'linkedin_link' => $request->linkedin_link,
            'member_image' => $save_url,
        ]);

        if($serviceId > 0){
            $notification = array(
            'message' => 'Member saved successfully',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Member could not be saved',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function editTeam($id){
        $team = Team::findOrFail($id);
        return view('backend.team.team_edit', compact('team'));
    }

    public function storeTeamUpdate(Request $request, $id){
        $team_id = $request->id;
        $oldImage = $request->oldImage;
        
        if($request->file('member_image')){
            unlink($oldImage);
            $image = $request->file('member_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,600)->save('uploads/team/'.$name_gen);
            $save_url = 'uploads/team/'.$name_gen;

            Team::findOrFail($team_id)->update([
                'member_name' => $request->member_name,
                'member_title_fr' => $request->member_title_fr,
                'member_title_en' => $request->member_title_en,
                'facebook_link' => $request->facebook_link,
                'twiter_link' => $request->twiter_link,
                'instagram_link' => $request->instagram_link,
                'linkedin_link' => $request->linkedin_link,
                'member_image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Team updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_team')->with($notification);
        }
        else {
            Team::findOrFail($team_id)->update([
                'member_name' => $request->member_name,
                'member_title_fr' => $request->member_title_fr,
                'member_title_en' => $request->member_title_en,
                'facebook_link' => $request->facebook_link,
                'twiter_link' => $request->twiter_link,
                'instagram_link' => $request->instagram_link,
                'linkedin_link' => $request->linkedin_link,
            ]);
    
            $notification = array(
                'message' => 'Team updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_team')->with($notification);
        }
    }

    public function deleteTeam($id){
        $category = Team::findOrFail($id);
        // Delete the data
        Service::findOrFail($category->id)->delete();

        $notification = array(
                'message' => 'Service deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
}
