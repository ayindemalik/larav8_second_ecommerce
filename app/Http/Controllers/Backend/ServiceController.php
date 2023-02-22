<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
use Image;

class ServiceController extends Controller
{
    //
    
    public function viewService(){
        $services = Service::latest()->get();
        return view('dashboard.admin.service.service_view', compact('services'));
    }

    public function storeService(Request $request){
       
        $image = $request->file('service_icon');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/service_icons/'.$name_gen);
        $save_url = 'uploads/service_icons/'.$name_gen;

        $serviceId = Service::insertGetId([
            'service_name_fr' => $request->service_name_fr,
            'service_name_en' => $request->service_name_en,
            'service_descp_fr' => $request->service_descp_fr,
            'service_descp_en' => $request->service_descp_en,
            'service_icon' => $save_url,
        ]);

        if($serviceId > 0){
            $notification = array(
            'message' => 'Service saved successfully',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Service could not be saved',
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function editService($id){
        $service = Service::findOrFail($id);
        return view('dashboard.admin.service.service_edit', compact('service'));
    }

    public function storeServiceUpdate(Request $request, $id){
        $service_id = $request->id;
        $oldIcon = $request->oldIcon;

        if($request->file('service_icon')){
            unlink($oldIcon);
            $image = $request->file('service_icon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/service_icons/'.$name_gen);
            $save_url = 'uploads/service_icons/'.$name_gen;

            Service::findOrFail($service_id)->update([
                'service_name_fr' => $request->service_name_fr,
                'service_name_en' => $request->service_name_en,
                'service_descp_fr' => $request->service_descp_fr,
                'service_descp_en' => $request->service_descp_en,
                'service_icon' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Service updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_service')->with($notification);
        }
        else {
            Service::findOrFail($service_id)->update([
                'service_name_fr' => $request->service_name_fr,
                'service_name_en' => $request->service_name_en,
                'service_descp_fr' => $request->service_descp_fr,
                'service_descp_en' => $request->service_descp_en,
            ]);
    
            $notification = array(
                'message' => 'Service updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view_all_service')->with($notification);
        }
    }

    public function deleteService($id){
        $category = Service::findOrFail($id);
        // Delete the data
        Service::findOrFail($category->id)->delete();

        $notification = array(
                'message' => 'Service deleted successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function sericeInactive($id){
        Service::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Service activated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 


    public function serviceActive($id){
        Service::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Service Desactivated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method 
}
