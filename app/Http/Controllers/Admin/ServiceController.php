<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Services\FileUploadService;
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

    public function store(ServiceRequest $request, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $fileUploadService->storeServiceImage($validatedData);
        }

        $notification = ['message' => 'Service Added Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $service = Service::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $service->image;

            $fileUploadService->updateServiceImage($validatedData, $id, $image);
        }

        $notification = ['message' => 'Service Updated Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }

    public function destroy($id, FileUploadService $fileUploadService)
    {
        $service = Service::findOrFail($id);

        $image = $service->image;

        $fileUploadService->destroyServiceImage($image);

        $service->delete();

        $notification = ['message' => 'Service Deleted Successfully', 'type' => 'success'];

        return redirect()->route('index.service')->with($notification);
    }
}
