<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::findOrFail(1);
        return view('admin.Banner.index', compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/banner/'.$image_name;
            Image::make($validatedData['image'])->resize(636, 852)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Banner::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'Banner Updated Successfully', 'type' => 'success');

        return redirect()->route('banner.index')->with($notification);
    }
}
