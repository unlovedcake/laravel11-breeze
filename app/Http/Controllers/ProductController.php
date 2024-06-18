<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Product::get();
        return view('product.index', compact('categories'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes'
        ]);

        $filename = NULL;
        $path = NULL;

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path . $filename,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return redirect('product/create')->with('status', 'Product Created');
    }

    public function edit(int $id)
    {
        $category = Product::findOrFail($id);
        return view('product.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes'
        ]);

        $user = Auth::user();

        $category = Product::findOrFail($id);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/category/';
            $file->move($path, $filename);

            if (File::exists($category->image)) {
                File::delete($category->image);
            }
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->has('image') ? $path . $filename : $category->image,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return redirect()->back()->with('status', 'Category Update');
    }

    public function destroy(int $id)
    {
        $category = Product::findOrFail($id);
        if (File::exists($category->image)) {
            File::delete($category->image);
        }

        $category->delete();

        return redirect()->back()->with('status', 'Category Deleted');
    }
}
