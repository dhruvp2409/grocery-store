<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort_order','DESC')->get();

        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            $image = $request->image->store();
        }

        Product::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()->route('admin.products.index')->with('success','New product added!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('sort_order','DESC')->get();

        return view('admin.products.edit',compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'old_image' => 'nullable|string',
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            if(!empty($request->old_image) && Storage::exists($request->old_image)){
                Storage::delete($request->old_image);
            }
            $image = $request->image->store();
            $product->update(['image'=> $image]);
        }

        $product->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect()->route('admin.products.index')->with('success','Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success','Product deleted successfully!');
    }
}
