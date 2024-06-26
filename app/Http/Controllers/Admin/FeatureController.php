<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FeatureController extends Controller {
    public function index() {
        $data = Feature::all();
        return view('back.features.index', compact('data'));
    }

    public function create() {
        return view('back.features.create');
    }

    public function store(FeatureRequest $request, Feature $feature) {
        $feature->title = $request->title;
        $feature->text = $request->text;
        if($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/features', $file, $fileOriginalName);
            $feature->image = 'images/features/' . $fileOriginalName;
        }
        $feature->save();
        return redirect()->route('admin.features.index');
    }

    public function edit($id) {
        $feature = Feature::findOrFail($id);
        return view('back.features.edit', compact('feature'));
    }

    public function update($id, FeatureRequest $request) {
        $feature = Feature::findOrFail($id);
        $feature->title = $request->title;
        $feature->text = $request->text;
        if($request->file('image')) {
            if($feature->image) {
                Storage::delete($feature->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/features', $file, $fileOriginalName);
            $feature->image = 'images/features/' . $fileOriginalName;
        }
        $feature->save();
        return redirect()->route('admin.features.index');
    }

    public function delete($id) {
        if(Feature::findOrFail($id)->image) {
            Storage::delete(Feature::findOrFail($id)->image);
            Feature::whereId($id)->delete();
        } else {
            Feature::whereId($id)->delete();
        }
        return redirect()->route('admin.features.index');
    }

    public function deleteImage($id) {
        $feature = Feature::findOrFail($id);
        Storage::delete('public/' . $feature->image);
        $feature->image = null;
        $feature->save();
        return redirect()->back();
    }
}
