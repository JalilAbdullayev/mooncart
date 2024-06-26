<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $data = User::all();
        return view('back.users.index', compact('data'));
    }

    public function create() {
        return view('back.users.create');
    }

    public function edit($id) {
        $user = User::whereId($id)->first();
        return view('back.users.edit', compact('user'));
    }

    public function update($id, Request $request) {
        User::whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);
        return redirect()->route('admin.users.index');
    }

    public function delete($id) {
        User::whereId($id)->delete();
        return redirect()->back();
    }
}
