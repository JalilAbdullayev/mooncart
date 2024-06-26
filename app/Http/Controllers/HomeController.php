<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
use App\Models\Category;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Subscribers;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {
    public function index() {
        $campaigns = Campaigns::all();
        $products = Product::limit(12)->get();
        return view('front.index', compact('campaigns', 'products'));
    }

    public function contact() {
        return view('front.contact');
    }

    public function contactForm() {
        Contact::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'text' => request('text'),
        ]);
        return redirect()->back();
    }

    public function faq() {
        $faq = FAQ::paginate(10);
        return view('front.faq', compact('faq'));
    }

    public function searchFaq() {
        $faq = FAQ::where('question', 'like', '%' . request('search') . '%')->orWhere('answer', 'like', '%' . request('search') . '%')->get();
        return view('front.faq', compact('faq'));
    }

    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers',
        ], [
            'email.unique' => 'You are already our subscriber',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Subscribers::create([
            'email' => $request->email,
        ]);
        return redirect()->back();
    }

    public function staff() {
        $staff = Staff::all();
        return view('front.staff', compact('staff'));
    }

    public function shop() {
        $products = Product::paginate(12);
        $tags = Tag::has('products')->get();
        return view('front.shop', compact('products', 'tags'));
    }

    public function searchShop() {
        $tags = Tag::has('products')->get();
        $products = Product::where('name', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('about', 'like', '%' . request('search') . '%')->paginate(12);
        return view('front.shop', compact('products', 'tags'));
    }

    public function product($slug) {
        $product = Product::whereSlug($slug)->first();
        $priceWithDiscount = $product->price - (($product->price * $product->discount) / 100);
        $tags = Product::whereSlug($slug)->first()->tags()->get();
        $category = Product::whereSlug($slug)->first()->categories()->get();
        $products = Product::where('id', '!=', $product->id)->get();
        return view('front.product', compact('product', 'priceWithDiscount', 'tags', 'category', 'products'));
    }

    public function category($slug) {
        $category = Category::whereSlug($slug)->first();
        $tags = Tag::has('products')->get();
        $products = $category->products()->paginate(12);
        return view('front.shop', compact('products', 'tags', 'category'));
    }

    public function tag($slug) {
        $tag = Tag::whereSlug($slug)->first();
        $products = $tag->products()->paginate(12);
        return view('front.shop', compact('products', 'tag'));
    }

    public function signUp() {
        return view('auth.register');
    }
}
