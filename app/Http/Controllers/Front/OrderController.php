<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add_to_wishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $wishlist = Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();

        $cart = Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();

        if($wishlist) {
            return redirect()->back()->with('error', 'Product already added in wishlist');
        } else if($cart) {
            return redirect()->back()->with('error', 'Product already added to cart');
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id
            ]);

            return redirect()->back()->with('success', 'Product added to wishlist');
        }
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'product_qty' => 'required|integer|min:1'
        ]);

        $cart = Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();

        if($cart) {
            return redirect()->back()->with('error', 'Product already added to cart');
        } else {
            Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->delete();

            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->product_qty
            ]);

            return redirect()->back()->with('success', 'Product added to cart');
        }
    }

    public function wishlist()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        
        return view('front.wishlist', compact('wishlists'));
    }
}
