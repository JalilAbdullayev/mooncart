<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;

class SubscribersController extends Controller {
    public function index() {
        $data = Subscribers::all();
        return view('back.subscribers', compact('data'));
    }

    public function delete($id) {
        Subscribers::whereId($id)->delete();
        return redirect()->back();
    }
}
