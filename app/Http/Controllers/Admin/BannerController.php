<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\FileUploadService;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::findOrFail(1);
        return view('admin.Banner.index', compact('banner'));
    }

    public function update(BannerRequest $request, $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $banner->image;
            $fileUploadService->updateBannerImage($validatedData, $id, $image);
        }

        $notification = array('message' => 'Banner Updated Successfully', 'type' => 'success');

        return redirect()->route('banner.index')->with($notification);
    }
}
