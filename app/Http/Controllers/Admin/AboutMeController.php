<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Services\FileUploadService;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutMeController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        return view('admin.About.index', compact('about'));
    }

    public function update(AboutRequest $request, $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $about = About::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $about->image;
            $fileUploadService->updateAboutImage($validatedData, $id, $image);
        };

        $notification = array('message' => 'About Updated Successfully', 'type' => 'success');

        return redirect()->back()->with($notification);
    }


}
