<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function index()
    {
        $message = Contact::all();
        return view('admin.Contact.index', compact('message'));
    }

    public function send_email($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.Contact.email_info', compact('contact'));
    }

    public function send_user_email(MessageRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $details = $request->validated();

        Notification::send($contact , new SendEmailNotification($details));

        $contact->delete();

        $notification = array('message' => 'Email Sent Successfully', 'type' => 'success');

        return redirect()->route('admin.contact.index')->with($notification);
    }

    public function viewDetails($id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.Contact.details', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        $notification = array('type' => 'success', 'message' => 'Message Deleted Successfully');

        return redirect()->route('admin.contact.index')->with($notification);
    }

}
