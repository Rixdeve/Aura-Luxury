<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class AdminProducts extends Component
{
    public $search = '';

    public function render()
    {
        $products = Product::where('product_name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.admin-products', [
            'products' => $products
        ])->extends('layouts.admin');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('success', 'Product deleted successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }
}
