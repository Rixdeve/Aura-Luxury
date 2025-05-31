<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class AdminProducts extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.admin-products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            $this->products = Product::all(); // Refresh list
            session()->flash('success', 'Product deleted successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }
}
