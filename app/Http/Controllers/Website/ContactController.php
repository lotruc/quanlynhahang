<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('website.contact.index');
    }

    public function createContact($request)
    {

        $contacts = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $data = Contact::create($contacts);
        return $data;
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect()->back()->with('success', 'ban da gui yeu cau');
    }
}
