<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WorkingProcess;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\WorkingProcessRequest;

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
    public function store(WorkingProcessRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/working_process/'.$image_name;
            Image::make($validatedData['image'])->resize(56, 56)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        WorkingProcess::insert($validatedData);

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
    public function update(WorkingProcessRequest $request, string $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $validatedData['image']->getClientOriginalExtension();
            $image_path = 'uploads/working_process/'.$image_name;
            Image::make($validatedData['image'])->resize(56, 56)->save(public_path($image_path));
            $validatedData['image'] = $image_path;
        }

        WorkingProcess::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'Working Process Updated Successfully', 'type' => 'success');

        return redirect()->route('index.working.process')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workingProcess = WorkingProcess::findOrFail($id);

        $image = $workingProcess->image;
        unlink($image);

        WorkingProcess::findOrFail($id)->delete();

        $notification = array('message' => 'Working Process Deleted Successfully', 'type' => 'success');

        return redirect()->route('index.working.process')->with($notification);
    }
}
