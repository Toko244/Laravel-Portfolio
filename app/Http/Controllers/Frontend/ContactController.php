<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Footer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Footer::findOrFail(1);
        return view('frontend.components.pages.contact', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $validatedData = $request->validated();

        Contact::insert($validatedData + ['created_at' => Carbon::now()]);

        $notification = array(
            'message' => 'Your Message Submitted Successfully',
            'type' => 'success');

        return redirect()->back()->with($notification);
    }

}
