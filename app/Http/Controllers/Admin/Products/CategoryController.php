<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller {
    public function index() {
        $data = Category::all();
        return view('back.categories.index', compact('data'));
    }

    public function create() {
        return view('back.categories.create');
    }

    public function store(CategoryRequest $request) {
        $category = new Category;
        if($request->file('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/categories', $file, $fileOriginalName);
            $category->image = 'images/categories/' . $fileOriginalName;
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function edit($id) {
        $category = Category::whereId($id)->first();
        return view('back.categories.edit', compact('category'));
    }

    public function update($id, CategoryRequest $request) {
        $category = Category::whereId($id)->first();
        if($request->file('image')) {
            if($category->image) {
                Storage::delete('public/' . $category->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y-H-i-s') . '.' . $extension;
            Storage::putFileAs('public/images/categories', $file, $fileOriginalName);
            $category->image = 'images/categories/' . $fileOriginalName;
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function deleteImage($id) {
        $category = Category::whereId($id)->first();
        Storage::delete('public/' . $category->image);
        $category->image = null;
        $category->save();
        return redirect()->back();
    }

    public function delete($id) {
        $category = Category::whereId($id)->first();
        if($category->image) {
            Storage::delete('public/' . $category->image);
        }
        Category::whereId($id)->delete();
        return redirect()->back();
    }
}
