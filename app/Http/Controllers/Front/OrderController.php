<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $cartTotal = $carts->sum(fn($item) => $item->product->price * $item->quantity);

        return view('front.checkout', compact('carts', 'cartTotal'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'payment_method' => 'required|string',
            'flat' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'pin_code' => 'required|numeric',
        ]);

        // dd($request->all());

        $carts = Cart::where('user_id', auth()->id())->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        $address = "Flat No. {$request->flat}, {$request->street}, {$request->city}, {$request->state}, {$request->country} - {$request->pin_code}";

        $cartProducts = $carts->map(fn($item) => "{$item->product->name} ({$item->quantity})")->implode(', ');

        $cartTotal = $carts->sum(fn($item) => $item->product->price * $item->quantity);

        // Check if order already exists
        if (Order::where([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'payment_method' => $request->payment_method,
            'address' => $address,
            'total_products' => $cartProducts,
            'total_price' => $cartTotal
        ])->exists()) {
            return redirect()->back()->with('error', 'Order has already been placed!');
        }

        // Insert Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'payment_method' => $request->payment_method,
            'address' => $address,
            'total_products' => $cartProducts,
            'total_price' => $cartTotal,
            'placed_on' => now(),
            'payment_status' => $request->payment_method==1 ? 'pending' : 'completed'
        ]);

        // Reduce stock
        /* foreach ($carts as $item) {
            $product = Product::where('name', $item->name)->first();
            if ($product) {
                $product->decrement('stock', $item->quantity);
            }
        } */

        // Clear cart
        Cart::where('user_id', auth()->id())->delete();
        // dd('Order placed successfully!');
        // Send Order Confirmation Email
        Mail::to(['idhruvpatel24@gmail.com', $request->email])->send(new OrderMail($order));

        return redirect()->route('billing');
    }

    public function billing()
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return view('front.billing', compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);

        return view('front.invoice', compact('order'));
    }
}
