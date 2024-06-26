<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller {
    public function index() {
        $data = Tag::all();
        return view('back.tags.index', compact('data'));
    }

    public function store(TagRequest $request, Tag $tag) {
        $tag->title = $request->title;
        $tag->slug = Str::slug($request->title);
        $tag->save();
        return redirect()->route('admin.tags.index');
    }

    public function edit($id) {
        $tag = Tag::whereId($id)->first();
        return view('back.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag) {
        $tag->title = $request->title;
        $tag->slug = Str::slug($request->title);
        $tag->save();
        return redirect()->route('admin.tags.index');
    }

    public function delete($id) {
        Tag::whereId($id)->first()->delete();
        return response()->json('200');
    }
}
