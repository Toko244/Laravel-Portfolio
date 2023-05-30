<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->paginate(10);
        return view('admin.Blog.index', compact('blog'));
    }

    public function create()
    {
        $category = BlogCategory::orderBy('name', 'ASC')->get();
        return view('admin.Blog.create', compact('category'));
    }

    public function store(BlogRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/blogs/'.$image_name;
            Image::make($validatedData['image'])->resize(430, 327)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Blog::insert($validatedData + ['created_at' => Carbon::now()]);

        $notification = ['message' => 'Blog Added Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $category = BlogCategory::orderBy('name', 'ASC')->get();

        return view('admin.Blog.edit', compact('blog', 'category'));
    }

    public function update(BlogRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/blogs/'.$image_name;
            Image::make($validatedData['image'])->resize(430, 327)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Blog::findOrFail($id)->update($validatedData);

        $notification = ['message' => 'Blog Updated Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;
        unlink($image);

        Blog::findOrFail($id)->delete();

        $notification = ['message' => 'Blog Deleted Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

}
