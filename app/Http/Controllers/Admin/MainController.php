<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index() {
        $messages = Contact::count();
        $subscribers = Subscribers::count();
        $orders = Order::whereUserId(Auth::user()->id)->count();
        $products = Product::count();
        $noProducts = $products - Product::whereQuantity(0)->count();
        $productsInCart = Cart::whereUserId(Auth::user()->id)->first();
        $total = 0;
        if($productsInCart) {
            foreach($productsInCart->products as $product) {
                $total++;
            }
        }
        return view('back.index', compact('orders', 'messages', 'subscribers', 'products', 'noProducts', 'total'));
    }
}
