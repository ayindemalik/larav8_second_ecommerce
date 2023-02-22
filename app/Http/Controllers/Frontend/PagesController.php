<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;
use App\Models\Service;
use App\Models\contact;

class PagesController extends Controller
{
    //
    public function aboutPage(){
        $about = About::findOrFail(1);
        $services = Service::latest()->get();
        return view('frontend.about_page', compact('about', 'services'));
    }

    public function servicePage(){
        $services = Service::latest()->get();
        return view('frontend.services_page', compact( 'services'));
    }

    public function contactPage(){
        $about = About::findOrFail(1);
        $services = Service::latest()->get();
        $contacts = Contact::findOrFail(1);
        return view('frontend.contact_page', compact('about', 'services', 'contacts'));
    }

    public function referencesPage(){
        $about = About::findOrFail(1);
        $services = Service::latest()->get();
        return view('frontend.references', compact('about', 'services'));
    }

    
}
