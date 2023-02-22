<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProjectController extends Controller
{
    public function addProject(){
        return view('backend.project.project_add');
    }

    public function storeProject(Request $request){
        // dd($request);

        $image = $request->file('project_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,600)->save('uploads/projects/thambnail/'.$name_gen);
        $save_url = 'uploads/projects/thambnail/'.$name_gen;

        $project_id = Project::insertGetId([
            'project_name_fr' => $request->project_name_fr,
            'project_name_en' => $request->project_name_en,
            'project_owner' => $request->project_owner,
            'project_price' => $request->project_price,
            'project_thambnail' => $save_url,
            'short_descp_fr' => $request->short_descp_fr,
            'short_descp_en' => $request->short_descp_en,
            'long_descp_fr' => $request->long_descp_fr,
            'long_descp_en' => $request->long_descp_en,
            'project_exec_time_fr' => $request->project_exec_time_fr,
            'project_exec_time_en' => $request->project_exec_time_en,
            'execution_status_fr' => $request->execution_status_fr,
            'execution_status_en' => $request->execution_status_en,
            'view_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ///// SAVE MULTI IMAGE
        if($project_id > 0){
            $images = $request->file('multi_img');
            $count = 0;
            foreach($images as $img){
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(500,600)->save('uploads/projects/multi-image/'.$make_name);
                $uploadPath = 'uploads/projects/multi-image/'.$make_name;

                $insertId = MultiImg::insert([
                    'project_id'=> $project_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(), 
                ]);
                
                if($insertId > 0)
                    $count++;
            }
            if($count === count($images)){
                $notification = array(
                    'message' => 'Project saved successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('manage_project')->with($notification);
            }
        }
    }

    public function manageProject(){
        $projects = Project::latest()->get();
        return view('backend.project.project_view', compact('projects'));
    }

    public function editProject($id){
        $project = Project::findOrFail($id);
        $multiImgs = MultiImg::where('project_id', $id)->get();
        return view('backend.project.project_edit', compact('project', 'multiImgs'));
    }
    public function storeProjectUpdate(Request $request){
        $project = Project::findOrFail($request->id);
        Project::findOrFail($project->id)->update(
            [
                'project_name_fr' => $request->project_name_fr,
                'project_name_en' => $request->project_name_en,
                'project_owner' => $request->project_owner,
                'project_price' => $request->project_price,
                'short_descp_fr' => $request->short_descp_fr,
                'short_descp_en' => $request->short_descp_en,
                'long_descp_fr' => $request->long_descp_fr,
                'long_descp_en' => $request->long_descp_en,
                'project_exec_time_fr' => $request->project_exec_time_fr,
                'project_exec_time_en' => $request->project_exec_time_en,
                'execution_status_fr' => $request->execution_status_fr,
                'execution_status_en' => $request->execution_status_en,
                'view_status' => 1,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Project updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage_project')->with($notification);
    }

    public function updateMultiImage(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,600)->save('uploads/projects/multi-image/'.$make_name);
            $uploadPath = 'uploads/projects/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        } // end foreach

        $notification = array(
            'message' => 'Project Image Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
	} // end mehtod 

     /// Project Main Thambnail Update /// 
    public function projectThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('project_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,600)->save('uploads/projects/thambnail/'.$name_gen);
            $save_url = 'uploads/projects/thambnail/'.$name_gen;

            Project::findOrFail($pro_id)->update([
                'project_thambnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'project Image Thambnail Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
    }

    //// Multi Image Delete ////
    public function multiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
        'message' => 'project Image Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    } // end method 
    // Activate project
    public function projectInactive($id){
        Project::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'project Inactive',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }

    // Activate project
    public function projectActive($id){
        Project::findOrFail($id)->update(['status' => 1]);
            $notification = array(
            'message' => 'project Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteProject($id){
        $project = project::findOrFail($id);
        unlink($project->project_thambnail);
        Project::findOrFail($id)->delete();

        $images = MultiImg::where('project_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('project_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Project Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }// end method 
}
