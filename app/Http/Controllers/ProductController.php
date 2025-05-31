<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name'      => 'required|string|max:255',
            'description'       => 'required|string|max:1000',
            'price'             => 'required|numeric',
            'types'             => 'required|string',
            'availability'      => 'required|string',
            'qty'               => 'required|integer|min:0',
            'brand'             => 'nullable|string|max:255',
            'watch_color'       => 'nullable|string|max:255',
            'img_url'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category'          => 'required|in:Watch,Perfume',
        ]);

        $price = (float) $request->input('price');
        $qty = (int) $request->input('qty');

        if (Product::where('product_name', $request->product_name)->exists()) {
            return redirect('/addproduct')->with('error', 'Product already exists!');
        }

        $imagePath = $request->file('img_url')->store('products', 's3_gcs');


        try {
            Product::create([
                'product_name'     => $request->input('product_name'),
                'description'      => $request->input('description'),
                'price'            => $price,
                'types'            => $request->input('types'),
                'availability'     => $request->input('availability'),
                'qty'              => $qty,
                'brand'            => $request->input('brand'),
                'watch_color'      => $request->input('watch_color'),
                'img_url'          => $imagePath,
                'category'         => $request->input('category'),
            ]);

            return redirect('/admindashboard')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect('/addproduct')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // public function index()
    // {
    //     $watches = Product::where('category', 'Watch')->get();
    //     $perfumes = Product::where('category', 'Perfume')->get();

    //     // Check if data is being fetched
    //     Log::info('Watches:', $watches->toArray());
    //     Log::info('Perfumes:', $perfumes->toArray());

    //     // Pass the fetched data to the view
    //     return view('index', compact('watches', 'perfumes'));
    // }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.single-product', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('editproduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'product_name'      => 'required|string|max:255',
            'description'       => 'required|string|max:1000',
            'price'             => 'required|numeric',
            'types'             => 'required|string',
            'availability'      => 'required|string',
            'qty'               => 'required|integer|min:0',
            'brand'             => 'nullable|string|max:255',
            'watch_color'       => 'nullable|string|max:255',
            'img_url'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category'          => 'required|in:Watch,Perfume',
        ]);

        $product = Product::findOrFail($id);
        $qty = (int) $request->input('qty');
        $price = (float) $request->input('price');

        // Update the product with new data
        $product->update([
            'product_name'     => $request->input('product_name'),
            'description'      => $request->input('description'),
            'price'            => $price,
            'types'            => $request->input('types'),
            'availability'     => $request->input('availability'),
            'qty'              => $qty,
            'brand'            => $request->input('brand'),
            'watch_color'      => $request->input('watch_color'),
            'category'         => $request->input('category'),
        ]);



        if ($request->hasFile('img_url')) {
            $imagePath = $request->file('img_url')->store('products', 's3_gcs');
            $product->img_url = $imagePath;
            $product->save();
        }


        // Redirect to the product list or show the updated product
        return redirect()->route('product.view', $product->_id)->with('success', 'Product updated successfully');
    }
}
