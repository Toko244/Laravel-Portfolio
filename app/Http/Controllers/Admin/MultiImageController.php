<?php

namespace App\Http\Controllers\Admin;

use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class MultiImageController extends Controller
{
    public function index()
    {
        $multiImage = MultiImage::all();
        return view('admin.About.multi_images.index', compact('multiImage'));
    }

    public function create()
    {
        return view('admin.About.multi_images.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        foreach($image as $multi_images) {
            $name_gen = hexdec(uniqid()).'.'.$multi_images->getClientOriginalExtension();
            Image::make($multi_images)->resize(220, 220)->save('uploads/multi_images/'.$name_gen);
            $save_url = 'uploads/multi_images/'.$name_gen;
            MultiImage::insert(['images' => $save_url,
                                'created_at' => Carbon::now()
            ]);
        }

        $notification = array('message' => 'Multiple Images Inserted Successfully', 'type' => 'success');

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $image = MultiImage::findOrFail($id);
        return view('admin.About.multi_images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        if($request->hasFile('image')) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('uploads/multi_images/'.$name_gen);
            $save_url = 'uploads/multi_images/'.$name_gen;
            MultiImage::findOrFail($id)->update(['images' => $save_url]);
        }

        $notification = array('message' => 'Image Updated Successfully', 'type' => 'success');

        return redirect()->route('all.multi.image')->with($notification);
    }

    public function destroy($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        $image = $multiImage->images;
        unlink($image);

        MultiImage::findOrFail($id)->delete();

        $notification = array('message' => 'Image Deleted Successfully', 'type' => 'success');

        return redirect()->route('all.multi.image')->with($notification);
    }
}
