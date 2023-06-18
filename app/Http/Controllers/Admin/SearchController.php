<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\WorkingProcess;

class SearchController extends Controller
{
    public function searchBlog(Request $request)
    {
        $search = $request->search;

        $blog = Blog::where('title', 'LIKE', "%$search%")
                        ->orWhere('tags', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->orWhere('category_name', 'LIKE', "%$search%")
                        ->paginate(10);

        return view('admin.Blog.index', compact('blog'));
    }

    public function searchPortfolio(Request $request)
    {
        $search = $request->search;

        $portfolio = Portfolio::where('name', 'LIKE', "%$search%")
                                ->orWhere('title', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->paginate(10);

        return view('admin.Portfolio.index', compact('portfolio'));
    }

    public function searchService(Request $request)
    {
        $search = $request->search;

        $service = Service::where('title', 'LIKE', "%$search%")
                                ->orWhere('short_description', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->paginate(10);

        return view('admin.Services.index', compact('service'));
    }

    public function searchWorkingProcess(Request $request)
    {
        $search = $request->search;

        $workingProcess = WorkingProcess::where('title', 'LIKE', "%$search%")
                                            ->orWhere('short_description', 'LIKE', "%$search%")
                                            ->get();

        return view('admin.Working-Proccess.index', compact('workingProcess'));
    }

}
