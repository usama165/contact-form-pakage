<?php

namespace bestower\contact\Http\Controllers;

use App\Http\Controllers\Controller;
use bestower\contact\Mail\ContactMailable;
use bestower\contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }
    public function send(Request $request)
    {
        // Mail::to('usamasheikh833@gmail.com')->send(new ContactMailable($request->message, $request->name));
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));

        Contact::create($request->all());
        return redirect(route('contact'));

    }
}