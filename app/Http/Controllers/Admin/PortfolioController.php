<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(10);
        return view('admin.Portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('admin.Portfolio.create');
    }

    public function store(PortfolioRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/portfolio/'.$image_name;
            Image::make($validatedData['image'])->resize(1020, 519)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Portfolio::insert($validatedData);

        $notification = array('message' => 'Portfolio Inserted Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.Portfolio.edit', compact('portfolio'));
    }

    public function update(PortfolioRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/portfolio/'.$image_name;
            Image::make($validatedData['image'])->resize(1020, 519)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Portfolio::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'Portfolio Updated Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $image = $portfolio->image;
        unlink($image);

        Portfolio::findOrFail($id)->delete();

        $notification = array('message' => 'Portfolio Deleted Successfully', 'type' => 'success');

        return redirect()->route('index.portfolios')->with($notification);

    }
}
