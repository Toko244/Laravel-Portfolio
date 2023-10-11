<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WorkingProcess;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\WorkingProcessRequest;
use App\Services\FileUploadService;

class WorkingProccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workingProcess = WorkingProcess::all();
        return view('admin.Working-Proccess.index', compact('workingProcess'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Working-Proccess.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkingProcessRequest $request, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $fileUploadService->storeWorkingProcessImage($validatedData);
        }

        $notification = array('message' => 'Working Process Inserted Successfully', 'type' => 'success');

        return redirect()->route('index.working.process')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workingProcess = WorkingProcess::findOrFail($id);
        return view('admin.Working-Proccess.edit', compact('workingProcess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkingProcessRequest $request, string $id, FileUploadService $fileUploadService)
    {
        $validatedData = $request->validated();

        $workingProcess = WorkingProcess::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $workingProcess->image;

            $fileUploadService->updateWorkingProcessImage($validatedData, $id, $image);
        }

        $notification = array('message' => 'Working Process Updated Successfully', 'type' => 'success');

        return redirect()->route('index.working.process')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, FileUploadService $fileUploadService)
    {
        $workingProcess = WorkingProcess::findOrFail($id);

        $image = $workingProcess->image;

        $fileUploadService->destroyWorkingProcessImage($image);

        $workingProcess->delete();

        $notification = array('message' => 'Working Process Deleted Successfully', 'type' => 'success');

        return redirect()->route('index.working.process')->with($notification);
    }
}
