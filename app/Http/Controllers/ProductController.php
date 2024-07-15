<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);         // Store in Storage Folder

        // Public Folder
        // $request->image->move(public_path('images'), $imageName);

        $products = Product::create([
            'title' => $request->title,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'price' => $request->price,
            'image' => $imageName

        ]);

        return redirect()->route('products.index')->withStatus('Data Insert Sucessfully');
    }

    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function allProducts()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);


        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $products->update([
            'title' => $request->title,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'price' => $request->price,
            'image' => $imageName

        ]);




        return redirect()->route('products.index')->withStatus('Data Update Sucessfully');
    }

    public function show()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function destroy($id)
    {
        Product::destroy($id);


        return redirect()->route('products.index')->withStatus('Data Deleted Sucessfully');
    }
}
