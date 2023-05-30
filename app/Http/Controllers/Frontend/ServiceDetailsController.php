<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Footer;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceDetailsController extends Controller
{
    public function index()
    {
        $service = Service::latest()->paginate(3);
        $allBlogs = Blog::limit(7)->get();
        $contactInfo = Footer::find(1);
        return view('frontend.components.pages.services', compact('service', 'allBlogs', 'contactInfo'));
    }

    public function serviceDetails($id)
    {
        $service = Service::findOrFail($id);
        $services = Service::limit(5)->get();
        return view('frontend.components.pages.service_details', compact('service', 'services'));
    }
}
