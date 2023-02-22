<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Contact;

use App\Mail\ContactMail;


class ContactController extends Controller
{
    //
    public function viewContact(){
        $contact = Contact::findOrFail(1);
        return view('dashboard.admin.contact.contact_view', compact('contact'));
    }

    public function storeContact(Request $request){
        
        Contact::insert([
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email, 
        ]);

        $notification = array(
            'message' => 'Contact saved successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editContact($id){
        $contact = Contact::findOrFail($id);
        return view('dashboard.admin.contact.contact_edit', compact('contact'));
    }

    public function storeContactUpdate(Request $request){
        $_id = $request->id;
        
        Contact::findOrFail($_id)->update([
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email, 
        ]);
        $notification = array(
            'message' => 'Contact updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view_contact')->with($notification);
        
    }

    // SEND MAIL
    public function sendEmail(Request $request){
        //  dd($request);
        $action = 'sendMal';
        $data = [
            'action'=>$action,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        // Receiver mail adress
        Mail::to('compengmalik@gmail.com')->send(new ContactMail($data));
        // return '';

        $notification = array(
            'message' => 'Thans for reaching out! Your mail has been sent successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function sendAppointment(Request $request){
        // dd($request);
        $action = 'sendAppointment';
        $data = [
            'action'=>$action,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'service'=>$request->service,
            'date'=>$request->date,
            'time'=>$request->time,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        // Receiver mail adress
        Mail::to('compengmalik@gmail.com')->send(new ContactMail($data));
        
        // Save the appointmment
        $notification = array(
            'message' => 'Thans for reaching out! Your mail has been sent successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
