<?php

// namespace App\Http\Controllers;

// use App\Models\Product;

// use Illuminate\Http\Request;
// use App\Models\Cart;

// class CartController extends Controller
// {
//     public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id'      => 'required|integer|max:255',
    //         'description'       => 'required|string|max:1000',
    //         'price'             => 'required|numeric',
    //         'discounted_price'  => 'nullable|numeric',
    //         'types'             => 'required|string',
    //         'availability'      => 'required|string',
    //         'qty'               => 'required|integer|min:0',
    //         'brand'             => 'nullable|string|max:255',
    //         'watch_color'       => 'nullable|string|max:255',
    //         'img_url'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'category'          => 'required|in:Watch,Perfume',
    //     ]);

    //     // Optional: Prevent duplicates
    //     if (Product::where('product_name', $request->product_name)->exists()) {
    //         return redirect('/addproduct')->with('error', 'Product already exists!');
    //     }

    //     $imagePath = $request->hasFile('img_url')
    //         ? $request->file('img_url')->store('images', 'public')
    //         : null;

    //     try {
    //         Product::create([
    //             'product_name'     => $request->input('product_name'),
    //             'description'      => $request->input('description'),
    //             'price'            => $request->input('price'),
    //             'discounted_price' => $request->input('discounted_price'),
    //             'types'            => $request->input('types'),
    //             'availability'     => $request->input('availability'),
    //             'qty'              => $request->input('qty'),
    //             'brand'            => $request->input('brand'),
    //             'watch_color'      => $request->input('watch_color'),
    //             'img_url'          => $imagePath,
    //             'category'         => $request->input('category'),
    //         ]);

    //         return redirect('/admindashboard')->with('success', 'Product added successfully');
    //     } catch (\Exception $e) {
    //         return redirect('/addproduct')->with('error', 'An error occurred: ' . $e->getMessage());
    //     }
    // }
// } -->