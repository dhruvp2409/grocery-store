<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $grandTotal = $carts->sum(function ($item) {
            return $item->product->stock > 0 ? $item->product->price * $item->quantity : 0;
        });

        return view('front.cart', compact('carts', 'grandTotal'));
    }

    public function delete($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->route('cart');
    }

    public function deleteAll()
    {
        Cart::where('user_id', auth()->id())->delete();
        return redirect()->route('cart');
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer|exists:cart,id',
            'p_qty' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id', $request->cart_id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {
            if ($cartItem->product->stock < $request->p_qty) {
                return redirect()->route('cart')->with('error', "Only {$cartItem->product->stock} unit(s) available in stock.");
            } else {
                $cartItem->update(['quantity' => $request->p_qty]);
            }
        }

        return redirect()->route('cart')->with('success', 'Cart quantity updated');
    }
}
