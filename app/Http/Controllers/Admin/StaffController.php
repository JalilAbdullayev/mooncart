<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffController extends Controller {
    public function index() {
        $data = Staff::all();
        return view('back.staff.index', compact('data'));
    }

    public function create() {
        return view('back.staff.create');
    }

    public function store(StaffRequest $request) {
        $staff = new Staff;
        $staff->name = $request->name;
        $staff->position = $request->position;
        if($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/staff', $file, $fileOriginalName);
            $staff->image = 'images/staff/' . $fileOriginalName;
        }
        $staff->save();
        return redirect()->route('admin.staff.index');
    }

    public function edit($id) {
        $staff = Staff::whereId($id)->first();
        return view('back.staff.edit', compact('staff'));
    }

    public function update($id, StaffRequest $request) {
        $staff = Staff::whereId($id)->first();
        $staff->name = $request->name;
        $staff->position = $request->position;
        if($request->file('image')) {
            Storage::delete(Staff::whereId($id)->first()->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/staff', $file, $fileOriginalName);
            $staff->image = 'images/staff/' . $fileOriginalName;
        }
        $staff->save();
        return redirect()->route('admin.staff.index');
    }

    public function delete($id) {
        Storage::delete(Staff::whereId($id)->first()->image);
        Staff::whereId($id)->delete();
        return redirect()->back();
    }
}
