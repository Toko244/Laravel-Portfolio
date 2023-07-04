<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);

        return view('admin.components.profile', compact('profileData'));
    }

    public function update(ProfileRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            @unlink(public_path('uploads/profile/'.$validatedData['photo']));
            $image_name = uniqid() . '.' . $validatedData['photo']->getClientOriginalName();
            $image_path = 'uploads/profile/'.$image_name;
            Image::make($validatedData['photo'])->save(public_path($image_path));
            $validatedData['photo'] = $image_path;
        }

        User::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'Admin Profile Updated Successfully', 'type' => 'success');

        return redirect()->back()->with($notification);
    }

    public function changePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);

        return view('admin.components.change_password', compact('profileData'));
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        // validation

        $request->validated();

        // match the old password

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array('message' => 'Old Password Does Not Match', 'type' => 'error');

            return back()->with($notification);
        }

        // update password

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array('message' => 'Password Changed Successfully', 'type' => 'success');

        return back()->with($notification);
    }
}
