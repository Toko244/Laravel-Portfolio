<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::find(1);
        return view('admin.Footer.index', compact('footer'));
    }

    public function update(FooterRequest $request, $id)
    {
        $validatedData = $request->validated();

        Footer::find($id)->update($validatedData);

        $notification = array('message' => 'Footer Updated Successfully', 'type' => 'success');

        return redirect()->route('footer.index')->with($notification);
    }
}
