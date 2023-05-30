<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PartnerMultiImages;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $image = $request->file('image');

        foreach($image as $multi_images) {
            $name_gen = hexdec(uniqid()).'.'.$multi_images->getClientOriginalExtension();
            Image::make($multi_images)->resize(220, 220)->save('uploads/partners/'.$name_gen);
            $save_url = 'uploads/partners/'.$name_gen;
            PartnerMultiImages::insert([
                'images' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array('message' => 'Multiple Partner Images Inserted Successfully', 'type' => 'success');

        return redirect()->route('all.multi.partner.image')->with($notification);
    }

    public function edit($id)
    {
        $image = PartnerMultiImages::findOrFail($id);
        return view('admin.Partners.multi_images.edit', compact('image'));
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $multiImage = PartnerMultiImages::findOrFail($id);
        $image = $multiImage->images;
        unlink($image);

        PartnerMultiImages::findOrFail($id)->delete();

        $notification = array('message' => 'Image Deleted Successfully', 'type' => 'success');

        return redirect()->route('all.multi.partner.image')->with($notification);
    }
}
