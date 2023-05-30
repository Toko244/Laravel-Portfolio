<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::find(1);

        return view('admin.Partners.index', compact('partner'));
    }

    public function update(PartnerRequest $request, $id)
    {
        $validatedData = $request->validated();

        Partner::findOrFail($id)->update($validatedData);

        $notification = array('message' => 'Partner Updated Successfully', 'type' => 'success');

        return redirect()->back()->with($notification);
    }
}
