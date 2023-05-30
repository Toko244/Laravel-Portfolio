<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::latest()->paginate(10);
        return view('admin.Services.index', compact('service'));
    }

    public function create()
    {
        return view('admin.Services.create');
    }

    public function store(ServiceRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/services/'.$image_name;
            Image::make($validatedData['image'])->resize(323, 240)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Service::insert($validatedData + ['created_at' => Carbon::now()]);

        $notification = ['message' => 'Service Added Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/services/'.$image_name;
            Image::make($validatedData['image'])->resize(323, 240)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        Service::findOrFail($id)->update($validatedData);

        $notification = ['message' => 'Service Updated Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $image = $service->image;
        unlink($image);

        Service::findOrFail($id)->delete();

        $notification = ['message' => 'Service Deleted Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }
}
