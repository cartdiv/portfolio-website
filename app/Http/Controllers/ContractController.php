<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
        # code...
    }

    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' => 'Your message sent successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
        # code...
    }
    public function ContactMessage()
    {
        $contact = Contact::all();
        return view('admin.contact.contact_message', compact('contact'));
        # code...
    }
    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();
        
        $notification = array([
            'message' => 'The message as been deleted sucessfully',
            'alert-type' => 'success',
        ]);

        return redirect()->back()->with($notification);
        # code...
    }
    //
}
