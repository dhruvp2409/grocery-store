<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list()
    {
        $categories = Category::orderBy('sort_order','DESC')->get();

        $products = Product::orderBy('id','DESC')->paginate(6);

        return view('front.products.list',compact('categories','products'));
    }

    public function product_details($slug)
    {
        if(empty($slug)) {
            abort(404);
        }

        $product = Product::where('slug', $slug)->first();

        if(!$product) {
            abort(404);
        }
        return view('front.products.details',compact('product'));
    }

    public function search_page()
    {
        return view('front.search');
    }

    public function search_products(Request $request)
    {
        $request->validate([
            'search_box' => 'required|string|max:255',
        ]);

        $searchTerm = trim($request->input('search_box'));

        $products = Product::where('name', 'LIKE', "%{$searchTerm}%")
            ->orWhereHas('category',function($query ) use ($searchTerm) {
                $query->where('title', 'LIKE', "%{$searchTerm}%");
            })->get();

        return view('front.search', compact('products', 'searchTerm'));
    }

}
