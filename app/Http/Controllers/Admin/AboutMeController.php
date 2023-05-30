<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutMeController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        return view('admin.About.index', compact('about'));
    }

    public function update(AboutRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/about/'.$image_name;
            Image::make($validatedData['image'])->resize(636, 852)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        About::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'About Updated Successfully', 'type' => 'success');

        return redirect()->back()->with($notification);
    }


}
