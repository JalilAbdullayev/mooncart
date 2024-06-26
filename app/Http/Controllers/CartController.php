<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function index() {
        $data = Cart::whereUserId(Auth::user()->id)->get();
        $total = 0;
        foreach($data as $item) {
            foreach($item->products as $product) {
                $cartProduct = $item->cart_products->where('product_id', $product->id)->first();
                $total += $cartProduct->quantity * ($product->price - (($product->price * $product->discount) / 100));
            }
        }
        return view('back.cart', compact('data', 'total'));
    }

    public function addToCart($id, Request $request) {
        $product = Product::findOrFail($id);
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::user()->id
        ]);
        $cartProduct = $cart->cart_products()->where('product_id', $product->id)->first();
        if($product->quantity == 0) {
            return redirect()->back()->with('error', 'Not enough stock.');
        }

        if($cartProduct) {
            if($product->quantity < $request->demo_vertical2 + $cartProduct->quantity) {
                return redirect()->back()->with('error', 'Not enough stock.');
            }

            $cartProduct->update([
                'quantity' => $cartProduct->quantity + 1
            ]);
        } else {
            if($product->quantity < $request->demo_vertical2) {
                return redirect()->back()->with('error', 'Not enough stock.');
            }

            $cart->products()->attach($product->id, [
                'quantity' => $request->demo_vertical2
            ]);
        }
        return redirect()->back();
    }

    public function changeQuantity($id, Request $request) {
        $product = Product::findOrFail($id);
        $cart = Cart::whereUserId(Auth::user()->id)->first();
        $cartProduct = CartProduct::whereCartId($cart->id)->whereProductId($id)->first();
        if($request->quantity <= $product->quantity) {
            $cartProduct->update([
                'quantity' => $request->quantity
            ]);
        } else {
            return redirect()->back()->with('error', 'Not enough stock.');
        }
        return redirect()->back();
    }

    public function deleteFromCart($id) {
        $cart = Cart::whereUserId(Auth::user()->id)->first();
        $cart->products()->detach($id);
        return redirect()->back();
    }

    public function emptyCart() {
        $cart = Cart::whereUserId(Auth::user()->id)->first();
        $cart->products()->detach();
        return redirect()->back();
    }

    public function submitCart() {
        $cart = Cart::whereUserId(Auth::user()->id)->first();
        $order = Order::create([
            'user_id' => Auth::user()->id
        ]);
        foreach($cart->cart_products as $cartProduct) {
            $product = Product::findOrFail($cartProduct->product_id);
            $product->decrement('quantity', $cartProduct->quantity);
            $order->products()->attach($cartProduct->product_id, [
                'quantity' => $cartProduct->quantity
            ]);
        }
        $cart->products()->detach();
        return redirect()->route('admin.orders.index');
    }
}
