<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Services\FileUploadService;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(10);
        return view('admin.Portfolio.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $fileUploadService->storePortfolioImage($validatedData);
        };

        $notification = array('message' => 'Portfolio Inserted Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);
    }

    /**
     * Display the specified resource.
     */

     ////////////////

    /**
     * Show the form for editing the specified resource.6
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.Portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $portfolio = Portfolio::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $portfolio->image;

            $fileUploadService->updatePortfolioImage($validatedData, $id, $image);
        }


        $notification = array('message' => 'Portfolio Updated Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, FileUploadService $fileUploadService)
    {
        $portfolio = Portfolio::findOrFail($id);

        $image = $portfolio->image;

        $fileUploadService->destroyPortfolioImage($image);

        $portfolio->delete();

        $notification = array('message' => 'Portfolio Deleted Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);
    }
}
