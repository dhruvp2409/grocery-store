<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order','DESC')->get();

        $latest_products = Product::orderBy('id','DESC')->limit(6)->get();

        return view('front.home',compact('categories','latest_products'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function inquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'message' => 'required|string'
        ]);

        $inquiry = Inquiry::where('name', $request->name)
            ->where('email', $request->email)
            ->where('phone', $request->phone)
            ->where('message', $request->message)
            ->first();

        if ($inquiry) {
            return redirect()->back()->with('success', 'Inquiry already submitted');
        } else {
            Inquiry::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message
            ]);

            return redirect()->back()->with('success', 'Inquiry submitted successfully');
        }
    }

    public function orders()
    {
        return view('front.orders');
    }

    public function category($slug)
    {
        if(empty($slug)) {
            abort(404);
        }

        $category = Category::where('slug', $slug)->first();

        if(!$category) {
            abort(404);
        }
        return view('front.category',compact('category'));
    }
}
