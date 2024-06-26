<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingsController extends Controller {
    public function index() {
        return view('back.settings');
    }

    public function update(SettingRequest $request) {
        $settings = Settings::findOrFail(1);
        if($request->file('favicon')) {
            if($request->favicon) {
                Storage::delete('public/' . $settings->favicon);
            }
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/front/images/', $file, $fileOriginalName);
            $settings->favicon = 'front/images/' . $fileOriginalName;
        }
        if($request->file('logo')) {
            if($request->logo) {
                Storage::delete('public/' . $settings->logo);
            }
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/front/images/', $file, $fileOriginalName);
            $settings->logo = 'front/images/' . $fileOriginalName;
        }
        $settings->title = $request->title;
        $settings->description = $request->description;
        $settings->author = $request->author;
        $settings->keywords = $request->keywords;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->address = $request->address;
        $settings->save();
        return redirect()->back();
    }
}
