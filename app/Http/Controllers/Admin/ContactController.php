<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller {
    public function index() {
        $data = Contact::all();
        return view('back.messages.index', compact('data'));
    }

    public function delete($id) {
        Contact::whereId($id)->delete();
        return redirect()->back();
    }

    public function read($id) {
        $message = Contact::whereId($id)->first();
        return view('back.messages.read', compact('message'));
    }
}
