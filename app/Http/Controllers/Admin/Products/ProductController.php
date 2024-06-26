<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller {
    public function index() {
        $data = Product::all();
        return view('back.products.index', compact('data'));
    }

    public function create() {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('back.products.create', compact('categories', 'tags'));
    }

    public function store(ProductRequest $request) {
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'about' => $request->about,
        ]);
        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);
        if($request->file('images')) {
            $now = now()->format('YmdHis');
            $productId = $product->id;

            $imagesData = array_map(static function($image, $index) use ($now, $productId) {
                $extension = $image->getClientOriginalExtension();
                $name = $image->getClientOriginalName();
                $slug = Str::slug($name, '-') . '_' . $now . '.' . $extension;
                Storage::putFileAs('public/products/', $image, $slug);
                return [
                    'product_id' => $productId,
                    'image' => $slug,
                    'featured' => $index === 0 ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }, $request->file('images'), array_keys($request->file('images')));

            ProductImages::insert($imagesData);
        }
        return redirect()->route('admin.products.index');
    }

    public function edit($id) {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        $product = Product::whereId($id)->first();
        return view('back.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update($id, ProductRequest $request) {
        $product = Product::whereId($id)->first();
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'about' => $request->about,
        ]);
        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);
        return redirect()->route('admin.products.index');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $fileNames = [];
        if($product->images->isNotEmpty()) {
            $fileNames = array_column($product->images->toArray(), 'image');
        }
        if($product->featuredImage) {
            $fileNames[] = $product->featuredImage->image;
        }
        foreach($fileNames as $fileName) {
            if(Storage::exists('public/products/' . basename($fileName))) {
                Storage::delete('public/products/' . basename($fileName));
            }
        }
        ProductImages::whereProductId($id)->delete();
        $product->delete();
        return response()->json(200);
    }
}
