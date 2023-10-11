<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PartnerMultiImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\MultiImageRequest;
use App\Models\MultiImage;
use App\Models\Partner;
use App\Services\FilesUploadService;
use Faker\Core\File;
use Intervention\Image\Facades\Image;

class PartnerMultiImageController extends Controller
{
    public function index()
    {
        $images = PartnerMultiImages::all();
        return view('admin.Partners.MultiImages.index', compact('images'));
    }

    public function create()
    {
        return view('admin.Partners.MultiImages.create');
    }

    public function store(Request $request, FilesUploadService $filesUploadService)
    {
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $filesUploadService->storeMultiImages($image);
        }

        $notification = array('message' => 'Multiple Partner Images Inserted Successfully', 'type' => 'success');

        return redirect()->route('all.multi.partner.image')->with($notification);
    }

    public function edit($id)
    {
        $image = PartnerMultiImages::findOrFail($id);
        return view('admin.Partners.multiImages.edit', compact('image'));
    }

    public function update(Request $request, $id, FilesUploadService $filesUploadService)
    {
        $image = $request->file('image');

        if($request->hasFile('image')) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('uploads/partners/'.$name_gen);
            $save_url = 'uploads/partners/'.$name_gen;
            PartnerMultiImages::findOrFail($id)->update(['images' => $save_url]);
        }

        $notification = array('message' => 'Partner Image Updated Successfully', 'type' => 'success');

        return redirect()->route('all.multi.partner.image')->with($notification);
    }

    public function destroy($id, FilesUploadService $filesUploadService)
    {
        $multiImage = PartnerMultiImages::findOrFail($id);

        $image = $multiImage->images;

        $filesUploadService->destroyMultiImage($image, $multiImage);

        $multiImage->delete();

        $notification = array('message' => 'Image Deleted Successfully', 'type' => 'success');

        return redirect()->route('all.multi.partner.image')->with($notification);
    }
}
