<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutDetailsController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1);
        $service = Service::latest()->limit(8)->get();
        $blog = Blog::limit(3)->get();
        return view('frontend.components.pages.about_details', compact('about', 'service', 'blog'));
    }
}
