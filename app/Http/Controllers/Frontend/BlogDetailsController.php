<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Footer;
use App\Models\Service;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogDetailsController extends Controller
{
    public function index($id)
    {
        $allBlogs = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('name', 'ASC')->get();

        return view('frontend.components.pages.blogDetails', compact('blog', 'allBlogs', 'category'));
    }

    public function categoryBlogs($id)
    {
        $blog = Blog::where('category_name', $id)->orderBy('id', 'DESC')->paginate(3);
        $allBlogs = Blog::latest()->limit(5)->get();
        $category = BlogCategory::orderBy('name', 'ASC')->get();
        $categoryName = BlogCategory::findOrFail($id);

        return view('frontend.components.pages.category_blog_details', compact('blog', 'allBlogs', 'category', 'categoryName'));
    }

    public function allBlogs()
    {
        $blog = Blog::latest()->paginate(3);
        $category = BlogCategory::orderBy('name', 'ASC')->get();
        $services = Service::limit(5)->get();
        $contactInfo = Footer::find(1);

        return view('frontend.components.pages.blogs', compact('blog', 'category', 'services', 'contactInfo'));
    }
}
