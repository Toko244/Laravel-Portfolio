<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
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

    public function store(BlogRequest $request, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $fileUploadService->storeBlogImage($validatedData);
        }

        $notification = ['message' => 'Blog Added Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $category = BlogCategory::orderBy('name', 'ASC')->get();

        return view('admin.Blog.edit', compact('blog', 'category'));
    }

    public function update(BlogRequest $request, $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $blog->image;

            $fileUploadService->updateBlogImage($validatedData, $id, $image);
        }

        $notification = ['message' => 'Blog Updated Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

    public function destroy($id, FileUploadService $fileUploadService)
    {
        $blog = Blog::findOrFail($id);

        $image = $blog->image;

        $fileUploadService->destroyBlogImage($image);

        $blog->delete();

        $notification = ['message' => 'Blog Deleted Successfully', 'type' => 'success'];

        return redirect()->route('index.blog')->with($notification);
    }

}
