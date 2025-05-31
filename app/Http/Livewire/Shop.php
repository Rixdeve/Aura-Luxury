<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\Product;

class Shop extends Component
{
    public $category = "";
    public $price;
    public $availability;
    public $types;
    public $brand;


    public function mount()
    {
        // $this->category = request()->query('category', '');
        // $this->price = request()->query('price', '');
        // $this->availability = request()->query('availability', '');
        // $this->types = request()->query('types', '');   
    }

    public function render()
    {
        $products = Product::query();
        if ($this->category) {
            $products->where('category', $this->category);
        }
        if ($this->category == "Watch") {
            $products->where('types', '!=', 'Perfume');
        } elseif ($this->category == "Perfume") {
            $products->where('types', '!=', 'Watch');
        }
        if ($this->category == "All") {
            $products->where('types', '!=', 'Watch');
            $products->where('types', '!=', 'Perfume');
        }

        if ($this->price && is_numeric($this->price)) {
            $products->where('price', '<=', (float) $this->price);
        }

        if ($this->availability) {
            $products->where('availability', $this->availability);
        }

        if ($this->types) {
            $products->where('types', $this->types);
        }

        if ($this->brand) {
            $products->where('brand', $this->brand);
        }



        return view('livewire.shop', [
            'products' => $products->get(),
        ])->layout('layouts.livewire');
    }
}
