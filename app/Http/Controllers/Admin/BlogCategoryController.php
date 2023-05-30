<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategory = BlogCategory::latest()->paginate(10);
        return view('admin.BlogCategory.index', compact('blogCategory'));
    }

    public function create()
    {
        return view('admin.BlogCategory.create');
    }

    public function store(BlogCategoryRequest $request)
    {
        $validatedData = $request->validated();

        BlogCategory::insert($validatedData);

        $notification = ['message' => 'Category Added Successfully', 'type' => 'success'];

        return redirect()->route('index.category')->with($notification);
    }

    public function edit($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.BlogCategory.edit', compact('blogCategory'));
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        $validatedData = $request->validated();

        BlogCategory::findOrFail($id)->update($validatedData);

        $notification = ['message' => 'Category Updated Successfully', 'type' => 'success'];

        return redirect()->route('index.category')->with($notification);
    }

    public function destroy($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        $blogCategory->delete();

        $notification = ['message' => 'Category Deleted Successfully', 'type' => 'success'];

        return redirect()->route('index.category')->with($notification);
    }
}
