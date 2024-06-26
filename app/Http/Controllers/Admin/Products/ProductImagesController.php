<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductImagesController extends Controller {
    public function index($id) {
        $data = ProductImages::whereProductId($id)->get();
        return view("back.products.images", compact('data', 'id'));
    }

    public function store(Request $request, $id) {
        if($request->file('images')) {
            $now = now()->format('YmdHis');
            $isFirstImage = true;
            foreach($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $name = $image->getClientOriginalName();
                $slug = Str::slug($name, '-') . '_' . $now . '.' . $extension;
                $path = 'public/products/';
                Storage::putFileAs($path, $image, $slug);
                $featured = $isFirstImage && !ProductImages::whereProductId($id)->whereFeatured(1)->exists();
                ProductImages::create([
                    'product_id' => $id,
                    'image' => $slug,
                    'featured' => $featured
                ]);
                $isFirstImage = false;
            }
        }
        return redirect()->back();
    }

    public function delete($id) {
        $image = ProductImages::findOrFail($id);
        if($image) {
            if(file_exists('storage/products/' . $image->image)) {
                unlink('storage/products/' . $image->image);
            }
            $image->delete();
        }
        return response()->json(['success' => true], 200);
    }

    public function featured($id) {
        $image = ProductImages::findOrFail($id);
        if($image) {
            ProductImages::whereProductId($image->product_id)->update([
                'featured' => 0
            ]);
            $image->featured = 1;
            $image->save();
        }
        return response()->json(['success' => true], 200);
    }
}
