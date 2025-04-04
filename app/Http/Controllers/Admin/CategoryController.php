<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);

        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'sort_order' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            $image = $request->image->store();
        }

        Category::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
            'sort_order' => $request->sort_order,
            'image' => $image
        ]);

        return redirect()->route('admin.categories.index')->with('success','New category added!');

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'old_image' => 'nullable|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'sort_order' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            if(!empty($request->old_image) && Storage::exists($request->old_image)){
                Storage::delete($request->old_image);
            }
            $image = $request->image->store();
            $category->update(['image'=> $image]);
        }

        $category->update([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
            'sort_order' => $request->sort_order
        ]);

        return redirect()->route('admin.categories.index')->with('success','Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if(Storage::exists($category->image)){
            Storage::delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success','Category deleted successfully!');
    }
}
