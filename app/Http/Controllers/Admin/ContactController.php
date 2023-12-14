<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }



    public function destroy(Contact $contact)
    {
        // Xóa bài đăng khỏi cơ sở dữ liệu
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Xoa thanh cong');
    }
}
